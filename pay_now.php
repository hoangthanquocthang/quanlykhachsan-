<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require('admin/inc/db_config.php');
  ob_start();
  require('admin/inc/essentials.php');
  ob_end_clean();

  session_start();

  if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');
  }

  $settings_q = select("SELECT `shutdown` FROM `settings` WHERE `sr_no`=? LIMIT 1",[1],'i');
  $settings_r = mysqli_fetch_assoc($settings_q);

  if($settings_r && $settings_r['shutdown']){
    redirect('rooms.php');
  }

  if(isset($_POST['pay_now']))
  {
    if(!isset($_SESSION['room']) || !isset($_SESSION['room']['available']) || $_SESSION['room']['available']!=true){
      redirect('rooms.php');
    }

    $frm_data = filteration($_POST);
    $CUST_ID = $_SESSION['uId'];
    $room_id = (int)$_SESSION['room']['id'];

    if(empty($frm_data['checkin']) || empty($frm_data['checkout'])){
      $_SESSION['room']['available'] = false;
      redirect("confirm_booking.php?id=$room_id");
    }

    try{
      $today_date = new DateTime(date("Y-m-d"));
      $checkin_date = new DateTime($frm_data['checkin']);
      $checkout_date = new DateTime($frm_data['checkout']);
    }
    catch(Exception $e){
      $_SESSION['room']['available'] = false;
      redirect("confirm_booking.php?id=$room_id");
    }

    if($checkin_date == $checkout_date || $checkout_date < $checkin_date || $checkin_date < $today_date){
      $_SESSION['room']['available'] = false;
      redirect("confirm_booking.php?id=$room_id");
    }

    $room_res = select("SELECT `name`, `price`, `quantity` FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=? LIMIT 1",[$room_id,1,0],'iii');

    if(mysqli_num_rows($room_res)==0){
      $_SESSION['room']['available'] = false;
      redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    $room_no = !empty($frm_data['room_no']) ? trim($frm_data['room_no']) : '';

    // Bắt đầu transaction để tránh 2 người đặt cùng lúc
    mysqli_begin_transaction($con);

    if(!empty($room_no)) {
      // Có room_no cụ thể: kiểm tra đúng số phòng đó
      $rno_escaped = mysqli_real_escape_string($con, $room_no);

      // Kiểm tra đang dọn
      $clean_q = mysqli_fetch_assoc(mysqli_query($con,
        "SELECT `status` FROM `room_numbers`
         WHERE `room_id`=$room_id AND `room_no`='$rno_escaped' LIMIT 1 FOR UPDATE"
      ));
      if($clean_q && intval($clean_q['status']) == 2) {
        mysqli_rollback($con);
        $_SESSION['room']['available'] = false;
        redirect("confirm_booking.php?id=$room_id&room_no=".urlencode($room_no));
      }

      // Kiểm tra phòng đó đã bị đặt trùng ngày chưa
      $rno_check = mysqli_fetch_assoc(mysqli_query($con,
        "SELECT COUNT(*) AS cnt FROM booking_order bo
         JOIN booking_details bd ON bo.booking_id = bd.booking_id
         WHERE bo.booking_status = 'booked'
           AND bo.room_id = $room_id
           AND bd.room_no = '$rno_escaped'
           AND bo.check_out > '{$frm_data['checkin']}'
           AND bo.check_in  < '{$frm_data['checkout']}'"
      ));
      if($rno_check['cnt'] > 0) {
        mysqli_rollback($con);
        $_SESSION['room']['available'] = false;
        redirect("confirm_booking.php?id=$room_id&room_no=".urlencode($room_no));
      }
    } else {
      // Không có room_no: kiểm tra số lượng phòng còn trống
      $tb_query = "SELECT COUNT(*) AS `total_bookings` FROM `booking_order`
        WHERE booking_status=? AND room_id=?
        AND check_out > ? AND check_in < ?";
      $tb_fetch = mysqli_fetch_assoc(select($tb_query,['booked',$room_id,$frm_data['checkin'],$frm_data['checkout']],'siss'));

      if(($room_data['quantity']-$tb_fetch['total_bookings'])<=0){
        mysqli_rollback($con);
        $_SESSION['room']['available'] = false;
        redirect("confirm_booking.php?id=$room_id");
      }
    }

    $count_days = date_diff($checkin_date,$checkout_date)->days;
    $TXN_AMOUNT = $room_data['price'] * $count_days;

    // ── Xử lý điểm tích lũy ──────────────────────────────────
    $use_points     = 0;
    $points_discount = 0;
    $frm_use_pts    = intval($frm_data['use_points'] ?? 0);
    if ($frm_use_pts > 0) {
        // Kiểm tra điểm thực tế của user
        $loy_res = select("SELECT `loyalty_points` FROM `user_cred` WHERE `id`=? LIMIT 1", [$CUST_ID], 'i');
        $loy_row = mysqli_fetch_assoc($loy_res);
        $avail_pts = (int)($loy_row['loyalty_points'] ?? 0);
        // Không cho dùng quá điểm hiện có và không giảm quá tổng tiền
        $use_points     = min($frm_use_pts, $avail_pts, intval($TXN_AMOUNT / 1000));
        $points_discount = $use_points * 1000;
    }
    $TXN_FINAL = max(0, $TXN_AMOUNT - $points_discount);
    // ──────────────────────────────────────────────────────────

    // Lay ty le dat coc tu settings (mac dinh 20% neu chua co)
    $settings_deposit_q = select("SELECT `deposit_rate` FROM `settings` WHERE `sr_no`=? LIMIT 1",[1],'i');
    $settings_deposit_r = mysqli_fetch_assoc($settings_deposit_q);
    $deposit_rate = (isset($settings_deposit_r['deposit_rate']) && $settings_deposit_r['deposit_rate'] > 0)
      ? floatval($settings_deposit_r['deposit_rate'])
      : 20.0;

    // Tinh so tien dat coc = deposit_rate% cua tong tien THỰC TẾ (sau giảm điểm)
    $DEPOSIT_AMOUNT = round($TXN_FINAL * $deposit_rate / 100);

    $_SESSION['room']['name']    = $room_data['name'];
    $_SESSION['room']['price']   = $room_data['price'];
    $_SESSION['room']['payment'] = $TXN_FINAL;
    $_SESSION['room']['deposit'] = $DEPOSIT_AMOUNT;

    $ORDER_ID = 'ORD_'.date('dmY').random_int(100,999);

    $query1 = "INSERT INTO `booking_order`
      (`user_id`, `room_id`, `check_in`, `check_out`, `booking_status`,
      `order_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `arrival`, `deposit`, `payment_status`, `redeemed_points`, `points_discount`)
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    insert($query1,[$CUST_ID,$room_id,$frm_data['checkin'],
      $frm_data['checkout'],'booked',$ORDER_ID,$TXN_FINAL,'TXN_SUCCESS',
      'Payment successful', 0, $DEPOSIT_AMOUNT, 'unpaid', $use_points, $points_discount],'iisssssissidii');

    $booking_id = mysqli_insert_id($con);

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`,
        `room_no`, `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?,?)";

    insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],
        $TXN_FINAL,$room_no,$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'isssssss');

    // ── Trừ điểm đã dùng + ghi lịch sử ──────────────────────
    if ($use_points > 0) {
        update("UPDATE `user_cred` SET `loyalty_points` = `loyalty_points` - ? WHERE `id`=?",
               [$use_points, $CUST_ID], 'ii');
        insert("INSERT INTO `loyalty_transactions` (`user_id`,`booking_id`,`type`,`points`,`note`) VALUES (?,?,?,?,?)",
               [$CUST_ID, $booking_id, 'redeem', -$use_points,
                'Dùng điểm giảm ' . number_format($points_discount,0,',','.') . 'đ cho đơn #'.$ORDER_ID], 'iiiss');
    }
    // ──────────────────────────────────────────────────────────

    mysqli_commit($con);
  }

  if(isset($booking_id) && $booking_id) {
    redirect('bookings.php?pay_deposit='.$booking_id);
  } else {
    redirect('bookings.php');
  }
?>