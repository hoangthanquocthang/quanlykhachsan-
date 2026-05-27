<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Lịch sử đặt phòng</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
    :root {
        --gold-main: #B88B4A;
        --green-dark: #9a7035;
        --green-light: #fdf6e9;
        --gold: #c8a96e;
        --text: #1a1a1a;
        --muted: #6b7280;
        --border: #e8e8e8;
        --bg: #f7f5f2;
        --white: #ffffff;
        --danger: #dc2626;
        --success: #16a34a;
        --warning-bg: #fef3c7;
        --warning-txt: #92400e;
        --radius-lg: 16px;
        --radius-md: 10px;
        --shadow-card: 0 4px 24px rgba(0, 0, 0, .08);
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background: var(--bg);
        color: var(--text);
        font-family: 'DM Sans', sans-serif;
    }

    /* ── Page wrapper ── */
    .bookings-wrap {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 24px 60px;
    }

    /* ── Header ── */
    .bookings-header {
        padding: 36px 0 28px;
        border-bottom: 1px solid var(--border);
        margin-bottom: 36px;
    }

    .bookings-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(24px, 3.5vw, 36px);
        font-weight: 700;
        color: var(--text);
        margin-bottom: 10px;
    }

    .breadcrumb-row {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .bc-link {
        font-size: 14px;
        color: var(--muted);
        text-decoration: none;
        transition: color .2s;
    }

    .bc-link:hover {
        color: var(--gold-main);
    }

    .bc-sep {
        color: var(--muted);
        font-size: 11px;
    }

    .bc-current {
        font-size: 14px;
        color: var(--gold-main);
        font-weight: 500;
    }

    /* ── Grid ── */
    .bookings-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    /* ── Card ── */
    .booking-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform .2s, box-shadow .2s;
    }

    .booking-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, .12);
    }

    /* Card header stripe */
    .booking-card-header {
        background: linear-gradient(135deg, var(--gold-main) 0%, var(--green-dark) 100%);
        padding: 16px 20px;
        color: #fff;
    }

    .booking-card-header h5 {
        font-family: 'Playfair Display', serif;
        font-size: 17px;
        font-weight: 700;
        margin: 0 0 3px;
    }

    .booking-card-header .price {
        font-size: 13px;
        opacity: .85;
    }

    /* Card body */
    .booking-card-body {
        padding: 18px 20px;
        flex: 1;
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .info-row i {
        color: var(--gold-main);
        font-size: 13px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .info-row .info-label {
        color: var(--muted);
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .04em;
        min-width: 68px;
    }

    .info-row .info-val {
        color: var(--text);
        font-weight: 500;
    }

    .divider {
        height: 1px;
        background: var(--border);
        margin: 14px 0;
    }

    /* Status badges */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .02em;
    }

    .status-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        opacity: .7;
    }

    .status-badge.success {
        background: rgba(45,138,78,0.12);
        color: var(--success);
    }

    .status-badge.danger {
        background: rgba(220,38,38,0.10);
        color: var(--danger);
    }

    .status-badge.warning {
        background: var(--warning-bg);
        color: var(--warning-txt);
    }

    /* Card footer */
    .booking-card-footer {
        padding: 14px 20px 18px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        border-top: 1px solid var(--border);
        background: #fafaf9;
    }

    .review-btn,
    .deposit-btn,
    .cancel-btn,
    .compensation-btn {
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: opacity .2s, transform .15s;
    }

    .review-btn:hover,
    .deposit-btn:hover,
    .cancel-btn:hover,
    .compensation-btn:hover {
        opacity: .88;
        transform: translateY(-1px);
    }

    .review-btn {
        background: var(--text);
        color: #fff;
    }

    .deposit-btn {
        background: var(--gold-main);
        color: #fff;
    }

    .cancel-btn {
        background: var(--danger);
        color: #fff;
    }

    .compensation-btn {
        background: #ea580c;
        color: #fff;
    }

    .change-date-btn {
        background: linear-gradient(135deg,#B88B4A,#9a7035);
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: opacity .2s, transform .15s;
    }

    .change-date-btn:hover {
        opacity: .88;
        transform: translateY(-1px);
    }

    .early-checkout-btn {
        background: #0891b2;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: opacity .2s, transform .15s;
    }

    .early-checkout-btn:hover {
        opacity: .88;
        transform: translateY(-1px);
    }

    /* ── Modals ── */
    .review-modal {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        backdrop-filter: blur(2px);
    }

    .review-modal.active {
        display: flex;
    }

    .review-box {
        width: 420px;
        max-width: 95%;
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
    }

    .review-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 24px;
        background: linear-gradient(135deg, var(--gold-main) 0%, var(--green-dark) 100%);
        color: #fff;
    }

    .review-head h5 {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 700;
    }

    .review-close {
        border: none;
        background: rgba(255, 255, 255, .2);
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
    }

    .review-close:hover {
        background: rgba(255, 255, 255, .35);
    }

    .review-body {
        padding: 22px 24px;
    }

    .review-group {
        margin-bottom: 18px;
    }

    .review-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 13px;
        color: #374151;
    }

    .review-group select,
    .review-group textarea {
        width: 100%;
        border: 1.5px solid var(--border);
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        font-family: 'DM Sans', sans-serif;
        outline: none;
        box-sizing: border-box;
        background: #fafafa;
        transition: border-color .25s, box-shadow .25s;
    }

    .review-group select:focus,
    .review-group textarea:focus {
        border-color: var(--gold-main);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(184,139,74, .12);
    }

    .review-group textarea {
        resize: none;
    }

    .review-submit {
        background: var(--gold-main);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        transition: background .2s;
    }

    .review-submit:hover {
        background: var(--green-dark);
    }

    .deposit-box {
        width: 460px;
    }

    /* Layout QR + info nằm ngang */
    .deposit-content-row {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .deposit-qr {
        width: 140px;
        min-width: 140px;
        max-width: 140px;
        display: block;
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        background: var(--white);
        flex-shrink: 0;
    }

    .deposit-info {
        display: grid;
        grid-template-columns: 110px 1fr;
        gap: 5px 8px;
        font-size: 13px;
        background: var(--green-light);
        border-radius: var(--radius-md);
        padding: 10px 12px;
        flex: 1;
        align-content: start;
        margin-bottom: 0;
    }

    .deposit-info b {
        color: var(--green-dark);
        font-weight: 600;
    }

    .deposit-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        flex-wrap: wrap;
    }

    .deposit-upload-wrap {
        margin: 8px 0 6px;
        border: 2px dashed #a0b4d0;
        border-radius: 8px;
        padding: 8px 10px;
        background: #f0f6ff;
        text-align: center;
    }

    .deposit-upload-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        color: #1a56b0;
        font-weight: 600;
        font-size: 13px;
        padding: 6px 12px;
        border-radius: 7px;
        background: rgba(184,139,74,0.08);
        transition: background .2s;
    }

    .deposit-upload-label:hover { background: #bfdbfe; }

    .deposit-confirm {
        background: var(--gold-main);
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        font-family: 'DM Sans', sans-serif;
        transition: background .2s, opacity .2s;
    }

    .deposit-confirm:not([disabled]):hover {
        background: var(--green-dark);
    }

    @media (max-width:992px) {
        .bookings-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width:600px) {
        .bookings-grid {
            grid-template-columns: 1fr;
        }

        .bookings-wrap {
            padding: 0 16px 40px;
        }
    }
    </style>
</head>

<body style="background:#faf8f4;">

    <?php
require('inc/header.php');

if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');
}
?>

    <div class="bookings-wrap">

        <div class="bookings-header">
            <h2 class="h-font">Lịch sử đặt phòng</h2>
            <div class="breadcrumb-row">
                <a href="index.php" class="bc-link">Trang chủ</a>
                <span class="bc-sep">›</span>
                <span class="bc-current">Lịch sử đặt phòng</span>
            </div>
        </div>

        <div class="bookings-grid">

            <?php

$query = "SELECT bo.*, bd.room_no, bd.price, bd.total_pay, bd.room_name FROM `booking_order` bo
LEFT JOIN (SELECT booking_id, MIN(room_no) AS room_no, price, total_pay, room_name FROM `booking_details` GROUP BY booking_id) bd ON bo.booking_id = bd.booking_id
WHERE (
bo.booking_status='booked'
OR bo.booking_status='cancelled'
OR bo.booking_status='checked_out'
OR bo.booking_status='payment failed'
OR bo.booking_status='pending'
)
AND bo.user_id=?
ORDER BY bo.booking_id DESC";

$result = select($query,[$_SESSION['uId']],'i');

while($data = mysqli_fetch_assoc($result))
{
    $date = date("d-m-Y", strtotime($data['datentime']));
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));

    $status_class = "";
    $btn = "";

    $booking_id = (int)$data['booking_id'];
    $room_id = isset($data['room_id']) ? (int)$data['room_id'] : 0;
    $payment_status = (!isset($data['payment_status']) || $data['payment_status'] === null || trim($data['payment_status']) === '') 
        ? 'unpaid' 
        : trim($data['payment_status']);
    $deposit = isset($data['deposit']) ? (float)$data['deposit'] : 0;
    $total_pay = isset($data['total_pay']) ? (float)$data['total_pay'] : 0;
    $deposit_due = round($total_pay * 0.2, 2);
    $deposit_display = $deposit > 0 ? $deposit : (($payment_status == 'unpaid') ? $deposit_due : 0);
    $deposit_text = number_format($deposit_display, 0, ',', '.');
    $deposit_due_json = json_encode($deposit_due);
    $order_id_json = json_encode($data['order_id'] ?? '');
    $price_text = number_format((float)$data['price'], 0, ',', '.');
    $total_text = number_format((float)$data['total_pay'], 0, ',', '.');

    // Lấy lịch sử thay đổi ngày đã được duyệt
    $changes_res = mysqli_query($con,
        "SELECT * FROM `booking_change_requests` WHERE `booking_id`=".(int)$booking_id." AND `status`='approved' ORDER BY `datentime` ASC"
    );
    $change_history_html = '';
    if(mysqli_num_rows($changes_res) > 0){
        $change_history_html .= '<div style="margin-top:10px; border-top:1px dashed #d1d5db; padding-top:10px;">';
        $change_history_html .= '<div style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.04em;margin-bottom:6px;">
            <i class="fa fa-history"></i> Lịch sử thay đổi ngày</div>';
        while($ch = mysqli_fetch_assoc($changes_res)){
            $ch_type  = $ch['request_type'] === 'early_checkout' ? 'Check-out sớm' : 'Đổi ngày';
            $ch_color = $ch['request_type'] === 'early_checkout' ? '#0891b2' : '#B88B4A';
            $ch_ci    = date('d-m-Y', strtotime($ch['new_checkin']));
            $ch_co    = date('d-m-Y', strtotime($ch['new_checkout']));
            $ch_date  = date('d-m-Y H:i', strtotime($ch['datentime']));
            $ch_total = number_format((int)$ch['new_total'], 0, ',', '.');
            $change_history_html .= "
            <div style='background:#f8faff;border:1px solid #e0e7ff;border-radius:8px;padding:8px 10px;margin-bottom:6px;font-size:12px;'>
                <div style='display:flex;justify-content:space-between;align-items:center;margin-bottom:4px;'>
                    <span style='background:{$ch_color};color:#fff;border-radius:4px;padding:2px 7px;font-size:11px;font-weight:700;'>{$ch_type}</span>
                    <span style='color:#9ca3af;font-size:11px;'>{$ch_date}</span>
                </div>
                <div style='display:flex;gap:10px;color:#374151;'>
                    <span><i class='fa fa-sign-in' style='color:#16a34a;'></i> {$ch_ci}</span>
                    <span>→</span>
                    <span><i class='fa fa-sign-out' style='color:#dc2626;'></i> {$ch_co}</span>
                    <span style='margin-left:auto;font-weight:700;color:#B88B4A;'>{$ch_total} VND</span>
                </div>
            </div>";
        }
        $change_history_html .= '</div>';
    }

    // Kiểm tra có bồi thường không
    $comp_res = select(
        "SELECT COUNT(*) AS total FROM `booking_item_charges` WHERE `booking_id`=?",
        [$booking_id], 'i'
    );
    $comp_count = (int)(mysqli_fetch_assoc($comp_res)['total'] ?? 0);
    $comp_btn = "";
    if($comp_count > 0){
        $comp_btn = "<button type='button' onclick='openCompModal($booking_id)' class='compensation-btn'>Bồi thường ($comp_count)</button>";
    }

    if($data['booking_status']=='booked')
    {
        $status_class = "success";

        // Chỉ hiện nút Đánh giá sau khi đã qua ngày trả phòng
        $today = date('Y-m-d');
        $checkout_date = $data['check_out']; // format YYYY-MM-DD trong DB

        if($today >= $checkout_date){
            if((int)($data['rate_review'] ?? 0)==0){
                $btn .= "<button type='button'
onclick='review_room(".$data['booking_id'].",".$data['room_id'].")'
class='review-btn'>
Đánh giá
</button>";
            }
            else{
                $btn .= "
                <span class='status-badge warning'>
                Đã đánh giá
                </span>";
            }
        }

        // Kiểm tra yêu cầu đổi ngày / checkout sớm đang pending
        $has_date_pending = false;
        $has_early_pending = false;
        $cr_res = mysqli_query($con,
            "SELECT `request_type` FROM `booking_change_requests`
             WHERE `booking_id`=".(int)$booking_id." AND `status`='pending'"
        );
        while($cr = mysqli_fetch_assoc($cr_res)){
            if($cr['request_type']=='date_change')     $has_date_pending  = true;
            if($cr['request_type']=='early_checkout')  $has_early_pending = true;
        }

        // Nút Đổi ngày — miễn là chưa trả phòng (today < check_out)
        if($today < $checkout_date){
            if(!$has_date_pending){
                $checkin_json  = json_encode($data['check_in']);
                $checkout_json = json_encode($data['check_out']);
                $btn .= "
                <button
                onclick='openChangeDateModal($booking_id,$checkin_json,$checkout_json)'
                class='change-date-btn'>
                <i class='fa fa-calendar'></i> Đổi ngày
                </button>";
            } else {
                $btn .= "<span class='status-badge warning'>Đang chờ duyệt đổi ngày</span>";
            }
        }

        // Nút Check-out sớm — chỉ khi admin đã check-in (arrival=1) và chưa quá ngày trả
        if($data['arrival']==1 && $today < $checkout_date){
            if(!$has_early_pending){
                $checkout_json_ec = json_encode($data['check_out']);
                $checkin_json_ec  = json_encode($data['check_in']);
                $btn .= "
                <button
                onclick='openEarlyCheckoutModal($booking_id,$checkin_json_ec,$checkout_json_ec)'
                class='early-checkout-btn'>
                <i class='fa fa-sign-out'></i> Check-out sớm
                </button>";
            } else {
                $btn .= "<span class='status-badge warning'>Đang chờ duyệt checkout sớm</span>";
            }
        }

        if($data['arrival']!=1){
            if($payment_status == 'pending_verification'){
                $btn .= "
                <span class='status-badge' style='background:#fef3c7;color:#92400e;border:1px solid #fde68a;padding:8px 14px;border-radius:8px;font-size:13px;font-weight:600;display:inline-flex;align-items:center;gap:6px;'>
                  ⏳ Đã gửi ảnh — lễ tân đang xác nhận cọc
                </span>
                <button
                onclick='openDepositModal($booking_id,$deposit_due_json,$order_id_json)'
                class='deposit-btn' style='background:#6b7280;'>
                🔄 Gửi lại ảnh chuyển khoản
                </button>
                <button
                onclick='cancel_booking($booking_id)'
                class='cancel-btn'>
                Huỷ đặt phòng
                </button>";
            }
            else if($payment_status != 'deposited'){
                $btn .= "
                <button
                onclick='openDepositModal($booking_id,$deposit_due_json,$order_id_json)'
                class='deposit-btn'>
                Thanh toán cọc
                </button>

                <button
                onclick='cancel_booking($booking_id)'
                class='cancel-btn'>
                Huỷ đặt phòng
                </button>";
            }

            else if($payment_status=='deposited'){
                $btn .= "
                <span class='status-badge success'>
                Đã thanh toán cọc
                </span>

                <button
                onclick='cancel_booking($booking_id)'
                class='cancel-btn'>
                Huỷ đặt phòng
                </button>";
            }
        }
        else {
            // Đã nhận phòng (arrival=1) — không cho huỷ
        }
    }

    else if($data['booking_status']=='cancelled')
    {
        $status_class = "danger";

        if($payment_status=='refunded'){
            $refund_amt = isset($data['refund_amount']) && $data['refund_amount'] > 0
                ? number_format((float)$data['refund_amount'], 0, ',', '.') . ' VND'
                : $deposit_text . ' VND';
            $btn = "
            <span class='status-badge success'>
            &#10003; Đã hoàn tiền: $refund_amt
            </span>";
        }

        else if($payment_status=='no_refund'){
            $btn = "
            <span class='status-badge danger'>
            Không hoàn tiền
            </span>";
        }

        else if($payment_status=='refund_pending'){
            $btn = "
            <span class='status-badge warning'>
            &#9203; Đang xử lý hoàn tiền
            </span>";
        }

        else{
            $btn = "
            <span class='status-badge warning'>
            Đang xử lý
            </span>";
        }
    }

    else if($data['booking_status']=='checked_out')
    {
        $status_class = "warning";

        if($payment_status=='refunded'){
            $refund_amt = isset($data['refund_amount']) && $data['refund_amount'] > 0
                ? number_format((float)$data['refund_amount'], 0, ',', '.') . ' VND'
                : '';
            $btn = "
            <span class='status-badge success'>
            &#10003; Đã trả phòng" . ($refund_amt ? " &amp; hoàn cọc $refund_amt" : "") . "
            </span>";
        } else {
            $btn = "
            <span class='status-badge warning'>
            Đã trả phòng
            </span>";
        }
    }

    else{
        $status_class = "warning";
    }

    // Xác định trạng thái hiển thị theo booking_status + arrival
    if($data['booking_status'] == 'booked') {
        if((int)($data['arrival'] ?? 0) == 1) {
            $status_vn    = 'Đang ở';
            $status_class = 'success';
        } elseif($payment_status == 'pending_verification') {
            $status_vn    = 'Chờ xác nhận cọc';
            $status_class = 'warning';
        } else {
            $status_vn    = 'Đã đặt phòng';
            $status_class = 'success';
        }
    } elseif($data['booking_status'] == 'checked_out') {
        $status_vn    = 'Đã trả phòng';
        $status_class = 'warning';
    } elseif($data['booking_status'] == 'cancelled') {
        $status_vn    = 'Đã huỷ';
        $status_class = 'danger';
    } elseif($data['booking_status'] == 'payment failed') {
        $status_vn    = 'Thanh toán thất bại';
        $status_class = 'danger';
    } elseif($data['booking_status'] == 'pending') {
        $status_vn    = 'Đang xử lý';
        $status_class = 'warning';
    } else {
        $status_vn    = $data['booking_status'];
        $status_class = 'warning';
    }

$room_no_display = !empty($data['room_no']) 
    ? "<div style='font-size:13px;color:rgba(255,255,255,0.75);margin-top:3px;'><i class='fa fa-door-open'></i> Phòng số: {$data['room_no']}</div>" 
    : "";

// Badge trạng thái hiển thị trên header card
if($data['booking_status'] == 'booked' && (int)($data['arrival'] ?? 0) == 1) {
    $arrival_badge_html = "<div style='display:inline-block;margin-top:8px;background:rgba(255,255,255,0.2);border:1px solid rgba(255,255,255,0.5);border-radius:20px;padding:3px 12px;font-size:12px;font-weight:700;color:#fff;letter-spacing:.5px;'>&#9679; Đang ở</div>";
} elseif($data['booking_status'] == 'booked' && $payment_status == 'pending_verification') {
    $arrival_badge_html = "<div style='display:inline-block;margin-top:8px;background:rgba(251,191,36,0.25);border:1px solid rgba(251,191,36,0.6);border-radius:20px;padding:3px 12px;font-size:12px;font-weight:700;color:#fef3c7;letter-spacing:.5px;'>⏳ Chờ xác nhận cọc</div>";
} elseif($data['booking_status'] == 'checked_out') {
    $arrival_badge_html = "<div style='display:inline-block;margin-top:8px;background:rgba(0,0,0,0.2);border:1px solid rgba(255,255,255,0.3);border-radius:20px;padding:3px 12px;font-size:12px;font-weight:600;color:rgba(255,255,255,0.8);'>&#10003; Đã trả phòng</div>";
} elseif($data['booking_status'] == 'cancelled') {
    $arrival_badge_html = "<div style='display:inline-block;margin-top:8px;background:rgba(220,38,38,0.3);border:1px solid rgba(255,255,255,0.3);border-radius:20px;padding:3px 12px;font-size:12px;font-weight:600;color:rgba(255,255,255,0.9);'>&#10007; Đã huỷ</div>";
} else {
    $arrival_badge_html = "";
}
echo <<<bookings

<div class="booking-card">

    <div class="booking-card-header">
        <h5>$data[room_name]</h5>
        $room_no_display
        <div class="price">$price_text VND / đêm</div>
        $arrival_badge_html
    </div>

    <div class="booking-card-body">

        <div class="info-row">
            <i class="fa fa-calendar-check-o"></i>
            <span class="info-label">Nhận phòng</span>
            <span class="info-val">$checkin</span>
        </div>

        <div class="info-row">
            <i class="fa fa-calendar-times-o"></i>
            <span class="info-label">Trả phòng</span>
            <span class="info-val">$checkout</span>
        </div>

        <div class="divider"></div>

        <div class="info-row">
            <i class="fa fa-money"></i>
            <span class="info-label">Tổng tiền</span>
            <span class="info-val">$total_text VND</span>
        </div>

        <div class="info-row">
            <i class="fa fa-shield"></i>
            <span class="info-label">Tiền cọc</span>
            <span class="info-val">$deposit_text VND</span>
        </div>

        <div class="info-row">
            <i class="fa fa-tag"></i>
            <span class="info-label">Mã đơn</span>
            <span class="info-val">$data[order_id]</span>
        </div>

        <div class="info-row">
            <i class="fa fa-clock-o"></i>
            <span class="info-label">Ngày đặt</span>
            <span class="info-val">$date</span>
        </div>



        $change_history_html

        <div style="margin-top:12px;">
            <span class="status-badge $status_class">$status_vn</span>
        </div>

    </div>

    <div class="booking-card-footer">
        $btn
        $comp_btn
    </div>

</div>

bookings;

}
?>

        </div>
    </div>

    <script>
    // ── Real-time polling: tự reload khi trạng thái booking thay đổi ──
    (function() {
        var snapshot = <?php
        $snap = [];
        $snap_q = select(
            "SELECT booking_id, booking_status, arrival, refund_status FROM booking_order WHERE user_id=? ORDER BY booking_id DESC",
            [$_SESSION['uId']], 'i'
        );
        while($r = mysqli_fetch_assoc($snap_q)){
            $snap[] = [
                'id'     => (int)$r['booking_id'],
                'status' => $r['booking_status'],
                'arrival'=> (int)($r['arrival'] ?? 0),
                'refund' => $r['refund_status'] ?? ''
            ];
        }
        echo json_encode($snap);
    ?>;

        function hashSnap(arr) {
            return arr.map(function(x) {
                return x.id + ':' + x.status + ':' + x.arrival + ':' + x.refund;
            }).join('|');
        }
        var currentHash = hashSnap(snapshot);

        function checkUpdates() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/realtime_poll.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                try {
                    var d = JSON.parse(this.responseText);
                    if (d && d.snapshot) {
                        var newHash = hashSnap(d.snapshot);
                        if (newHash !== currentHash) {
                            window.location.reload();
                        }
                    }
                } catch (e) {}
            };
            xhr.send('client_snapshot=1');
        }

        window._pollingTimer = setInterval(checkUpdates, 8000);
    })();
    </script>

    <div class="review-modal" id="compModal">
        <div class="review-box" style="width:560px;max-width:95%;">
            <div class="review-head">
                <h5>Danh sách bồi thường</h5>
                <button type="button" class="review-close" onclick="closeCompModal()">×</button>
            </div>
            <div class="review-body" id="comp-list" style="padding:16px 20px;max-height:420px;overflow-y:auto;">
                <p style="text-align:center;color:#888;">Đang tải...</p>
            </div>
        </div>
    </div>

    <!-- Modal QR thanh toán bồi thường -->
    <div class="review-modal" id="chargeQRModal">
        <div class="review-box deposit-box" style="width:480px;">
            <div class="review-head">
                <h5>Thanh toán bồi thường</h5>
                <button type="button" class="review-close" onclick="closeChargeQRModal()">×</button>
            </div>
            <div class="review-body">
                <img src="" alt="QR thanh toán bồi thường" class="deposit-qr" id="charge_qr_img">
                <div class="deposit-info">
                    <b>Số tiền</b>
                    <span id="charge_amount_text"></span>
                    <b>Ngân hàng</b>
                    <span id="charge_bank_text"></span>
                    <b>Số tài khoản</b>
                    <span id="charge_account_text"></span>
                    <b>Chủ tài khoản</b>
                    <span id="charge_name_text"></span>
                    <b>Nội dung CK</b>
                    <span id="charge_note_text"></span>
                </div>
                <div class="deposit-actions">
                    <button type="button" class="review-submit" onclick="closeChargeQRModal()">Đóng</button>
                    <button type="button" class="deposit-confirm" id="charge_confirm_btn"
                        onclick="confirmChargePayment()">Tôi đã chuyển khoản</button>
                </div>
            </div>
        </div>
    </div>

    <div class="review-modal" id="reviewModal">

        <div class="review-box">

            <form id="review-form">

                <div class="review-head">

                    <h5>Đánh giá phòng</h5>

                    <button type="button" class="review-close" onclick="closeReviewModal()">
                        ×
                    </button>

                </div>

                <div class="review-body">

                    <div class="review-group">

                        <label>Mức độ hài lòng</label>

                        <select name="rating">
                            <option value="5">Xuất sắc</option>
                            <option value="4">Tốt</option>
                            <option value="3">Bình thường</option>
                            <option value="2">Kém</option>
                            <option value="1">Tệ</option>
                        </select>

                    </div>

                    <div class="review-group">

                        <label>Nhận xét</label>

                        <textarea name="review" rows="4" required></textarea>

                    </div>

                    <input type="hidden" name="booking_id">
                    <input type="hidden" name="room_id">

                    <div style="text-align:right">

                        <button type="submit" class="review-submit">
                            Gửi đánh giá
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="review-modal" id="depositModal">

        <div class="review-box deposit-box">

            <div class="review-head">
                <h5>Thanh toán cọc</h5>
                <button type="button" class="review-close" onclick="closeDepositModal()">×</button>
            </div>

            <div class="review-body">

                <div class="deposit-content-row">
                    <img src="" alt="QR thanh toán cọc" class="deposit-qr" id="deposit_qr_img">

                    <div class="deposit-info">
                        <b>Số tiền cọc</b>
                        <span id="deposit_amount_text"></span>

                        <b>Ngân hàng</b>
                        <span id="deposit_bank_text"></span>

                        <b>Số tài khoản</b>
                        <span id="deposit_account_text"></span>

                        <b>Chủ tài khoản</b>
                        <span id="deposit_name_text"></span>

                        <b>Nội dung</b>
                        <span id="deposit_note_text"></span>
                    </div>
                </div>

                <div class="deposit-upload-wrap">
                    <div style="background:#f0fdf4;border:1.5px solid #86efac;border-radius:10px;padding:12px 14px;margin-bottom:12px;font-size:13px;color:#166534;display:flex;align-items:flex-start;gap:8px;">
                        <span style="font-size:18px;flex-shrink:0;">✅</span>
                        <span>Sau khi chuyển khoản đúng nội dung, hệ thống sẽ <b>tự động xác nhận</b> trong vài giây. Bạn không cần upload ảnh.</span>
                    </div>
                    <label class="deposit-upload-label" for="deposit_proof_input">
                        <span id="deposit_upload_icon">📎</span>
                        <span id="deposit_upload_text">Hoặc upload ảnh chuyển khoản (tuỳ chọn)</span>
                    </label>
                    <input type="file" id="deposit_proof_input" accept="image/jpeg,image/png,image/webp"
                        style="display:none" onchange="onDepositProofChange(this)">
                    <div id="deposit_proof_preview" style="display:none;margin-top:8px;text-align:center;">
                        <img id="deposit_proof_img" src="" alt="Ảnh chuyển khoản"
                            style="max-width:100%;max-height:160px;border-radius:8px;border:1px solid #dde6f0;">
                        <button type="button" onclick="clearDepositProof()"
                            style="display:block;margin:6px auto 0;font-size:12px;color:#ef4444;background:none;border:none;cursor:pointer;">✕ Xoá ảnh</button>
                    </div>
                </div>
                <div class="deposit-actions">
                    <button type="button" class="review-submit" onclick="closeDepositModal()">Đóng</button>
                    <button type="button" class="deposit-confirm" id="deposit_confirm_btn"
                        onclick="confirmDepositPayment()"
                        style="opacity:1;cursor:pointer;">Tôi đã chuyển khoản</button>
                </div>
            </div>

        </div>

    </div>

    <!-- ══════ MODAL ĐỔI NGÀY ══════ -->
    <div class="review-modal" id="changeDateModal">
        <div class="review-box" style="width:480px;">
            <div class="review-head">
                <h5><i class="fa fa-calendar me-2"></i>Yêu cầu đổi ngày</h5>
                <button type="button" class="review-close" onclick="closeChangeDateModal()">×</button>
            </div>
            <div class="review-body">
                <p style="font-size:13px;color:var(--muted);margin-bottom:18px;">
                    Chọn ngày nhận và trả phòng mới. Admin sẽ xác nhận trong thời gian sớm nhất.
                </p>
                <div class="review-group">
                    <label><i class="fa fa-calendar-check-o" style="color:var(--gold-main);margin-right:5px;"></i>Ngày nhận
                        phòng mới</label>
                    <input type="date" id="cd_checkin"
                        style="width:100%;border:1.5px solid var(--border);border-radius:8px;padding:10px 12px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;background:#fafafa;transition:border-color .25s,box-shadow .25s;">
                </div>
                <div class="review-group">
                    <label><i class="fa fa-calendar-times-o" style="color:var(--gold-main);margin-right:5px;"></i>Ngày trả
                        phòng mới</label>
                    <input type="date" id="cd_checkout"
                        style="width:100%;border:1.5px solid var(--border);border-radius:8px;padding:10px 12px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;background:#fafafa;transition:border-color .25s,box-shadow .25s;">
                </div>
                <div id="cd_msg"
                    style="display:none;padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:12px;"></div>
                <input type="hidden" id="cd_booking_id">
                <div style="display:flex;justify-content:flex-end;gap:10px;">
                    <button type="button" class="review-submit" style="background:#6b7280;"
                        onclick="closeChangeDateModal()">Huỷ</button>
                    <button type="button" class="review-submit" id="cd_submit_btn" onclick="submitDateChange()">
                        <i class="fa fa-paper-plane"></i> Gửi yêu cầu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ══════ MODAL CHECK-OUT SỚM ══════ -->
    <div class="review-modal" id="earlyCheckoutModal">
        <div class="review-box" style="width:460px;">
            <div class="review-head" style="background:linear-gradient(135deg,#0891b2,#0e7490);">
                <h5><i class="fa fa-sign-out me-2"></i>Yêu cầu check-out sớm</h5>
                <button type="button" class="review-close" onclick="closeEarlyCheckoutModal()">×</button>
            </div>
            <div class="review-body">
                <div id="ec_original_info"
                    style="background:var(--green-light);border-radius:8px;padding:12px 14px;margin-bottom:16px;font-size:13px;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:5px;">
                        <span style="color:var(--muted);font-weight:600;">NGÀY NHẬN PHÒNG</span>
                        <span id="ec_original_checkin" style="font-weight:600;"></span>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <span style="color:var(--muted);font-weight:600;">NGÀY TRẢ GỐC</span>
                        <span id="ec_original_checkout" style="font-weight:600;color:var(--gold-main);"></span>
                    </div>
                </div>
                <div class="review-group">
                    <label><i class="fa fa-sign-out" style="color:#0891b2;margin-right:5px;"></i>Ngày trả phòng
                        sớm</label>
                    <input type="date" id="ec_early_date"
                        style="width:100%;border:1.5px solid var(--border);border-radius:8px;padding:10px 12px;font-size:14px;font-family:'DM Sans',sans-serif;outline:none;background:#fafafa;transition:border-color .25s,box-shadow .25s;">
                </div>
                <div
                    style="background:#fef3c7;border-radius:8px;padding:10px 14px;font-size:12px;color:#92400e;margin-bottom:14px;display:flex;gap:8px;align-items:flex-start;">
                    <i class="fa fa-exclamation-triangle" style="margin-top:2px;flex-shrink:0;"></i>
                    <span>Phí có thể được tính theo số đêm thực tế. Admin sẽ điều chỉnh và hoàn tiền (nếu có) sau khi
                        duyệt.</span>
                </div>
                <div id="ec_msg"
                    style="display:none;padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:12px;"></div>
                <input type="hidden" id="ec_booking_id">
                <div style="display:flex;justify-content:flex-end;gap:10px;">
                    <button type="button" class="review-submit" style="background:#6b7280;"
                        onclick="closeEarlyCheckoutModal()">Huỷ</button>
                    <button type="button" class="review-submit" id="ec_submit_btn" style="background:#0891b2;"
                        onclick="submitEarlyCheckout()">
                        <i class="fa fa-paper-plane"></i> Gửi yêu cầu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php

if(isset($_GET['cancel_status'])){
    alert('success','Huỷ đặt phòng thành công!');
}

else if(isset($_GET['review_status'])){
    alert('success','Cảm ơn bạn đã để lại đánh giá!');
}

else if(isset($_GET['deposit_status'])){
        alert('info','Đã nhận ảnh chuyển khoản! Đang chờ lễ tân xác nhận cọc...');
    }

?>

    <!-- Modal xác nhận huỷ thường (chưa nhận phòng) -->
    <div id="cancelModal"
        style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:9999;align-items:center;justify-content:center;">
        <div style="background:#fff;border-radius:14px;width:460px;max-width:95%;box-shadow:0 10px 40px rgba(0,0,0,.25);overflow:hidden;">
            <div style="background:#dc2626;padding:16px 20px;display:flex;justify-content:space-between;align-items:center;">
                <h5 style="margin:0;color:#fff;font-size:17px;">&#9888; Xác nhận huỷ đặt phòng</h5>
                <button onclick="closeCancelModal()" style="background:none;border:none;color:#fff;font-size:24px;cursor:pointer;line-height:1;">×</button>
            </div>
            <div style="padding:20px 24px;">
                <div style="background:#fff8e1;border:1px solid #fde68a;border-radius:10px;padding:14px 16px;margin-bottom:16px;font-size:13px;color:#78350f;line-height:1.9;">
                    <b>Chính sách hoàn tiền cọc:</b><br>
                    &#10003; Huỷ trước <b>48 giờ</b> so với giờ check-in → Hoàn <b>100%</b> tiền cọc<br>
                    &#126; Huỷ từ <b>48 – 72 giờ</b> sau khi đặt → Hoàn <b>75%</b> tiền cọc<br>
                    &#126; Huỷ sau <b>72 giờ</b> kể từ lúc đặt → Hoàn <b>50%</b> tiền cọc<br>
                    &#10007; Huỷ sau <b>15:00</b> ngày check-in → <b>Không hoàn tiền cọc</b><br>
                    &#10007; Đã nhận phòng → <b>Không hoàn tiền cọc</b>
                </div>
                <p style="font-size:13px;color:#dc2626;margin:0;">Sau khi xác nhận, yêu cầu huỷ sẽ được gửi đi và không thể hoàn tác.</p>
            </div>
            <input type="hidden" id="cancel_booking_id">
            <div style="display:flex;justify-content:flex-end;gap:10px;padding:14px 24px;border-top:1px solid #f0f0f0;">
                <button onclick="closeCancelModal()"
                    style="padding:9px 18px;background:#6b7280;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;">Quay lại</button>
                <button onclick="confirmCancel()"
                    style="padding:9px 18px;background:#dc2626;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;font-weight:700;">Xác nhận huỷ phòng</button>
            </div>
        </div>
    </div>

    <!-- Modal xác nhận huỷ khi đã nhận phòng -->
    <div id="cancelCheckinModal"
        style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:9999;align-items:center;justify-content:center;">
        <div
            style="background:#fff;border-radius:14px;width:440px;max-width:95%;box-shadow:0 10px 40px rgba(0,0,0,.25);overflow:hidden;">
            <div
                style="background:#b45309;padding:16px 20px;display:flex;justify-content:space-between;align-items:center;">
                <h5 style="margin:0;color:#fff;font-size:17px;">&#9888; Xác nhận yêu cầu huỷ phòng</h5>
                <button onclick="closeCancelCheckinModal()"
                    style="background:none;border:none;color:#fff;font-size:24px;cursor:pointer;line-height:1;">×</button>
            </div>
            <div style="padding:20px 24px;">
                <p style="margin:0 0 12px;font-size:15px;color:#1a1a1a;font-weight:600;">Bạn đang yêu cầu huỷ phòng sau
                    khi đã nhận phòng.</p>
                <div
                    style="background:#fff8e1;border:1px solid #fde68a;border-radius:10px;padding:14px 16px;margin-bottom:16px;font-size:13px;color:#78350f;line-height:1.7;">
                    <b>Chính sách hoàn tiền cọc:</b><br>
                    &#10003; Huỷ trước <b>48 giờ</b> so với giờ check-in → Hoàn <b>100%</b> tiền cọc<br>
                    &#126; Huỷ từ <b>48 – 72 giờ</b> sau khi đặt → Hoàn <b>75%</b> tiền cọc<br>
                    &#126; Huỷ sau <b>72 giờ</b> kể từ lúc đặt → Hoàn <b>50%</b> tiền cọc<br>
                    &#10007; Huỷ sau <b>15:00</b> ngày check-in → <b>Không hoàn tiền cọc</b><br>
                    &#10007; Đã nhận phòng → <b>Không hoàn tiền cọc</b>
                </div>
                <p style="font-size:13px;color:#dc2626;margin:0;">Yêu cầu huỷ sẽ được gửi đến lễ tân để xử lý. Vui lòng
                    liên hệ trực tiếp quầy lễ tân để được hỗ trợ nhanh nhất.</p>
            </div>
            <input type="hidden" id="cancel_checkin_id">
            <div style="display:flex;justify-content:flex-end;gap:10px;padding:14px 24px;border-top:1px solid #f0f0f0;">
                <button onclick="closeCancelCheckinModal()"
                    style="padding:9px 18px;background:#6b7280;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;">Quay
                    lại</button>
                <button onclick="confirm_cancel_checkin()"
                    style="padding:9px 18px;background:#b45309;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;font-weight:700;">Xác
                    nhận huỷ phòng</button>
            </div>
        </div>
    </div>

    <!-- Modal điền thông tin hoàn tiền cọc -->
    <div id="refundInfoModal"
        style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:9999;align-items:center;justify-content:center;">
        <div style="background:#fff;border-radius:14px;width:480px;max-width:95%;box-shadow:0 10px 40px rgba(0,0,0,.25);overflow:hidden;">
            <div style="background:#b45309;padding:16px 20px;display:flex;justify-content:space-between;align-items:center;">
                <h5 style="margin:0;color:#fff;font-size:17px;">&#128179; Điền thông tin hoàn tiền cọc</h5>
            </div>
            <div style="padding:20px 24px;">
                <p style="margin:0 0 16px;font-size:13px;color:#555;">Vui lòng điền thông tin tài khoản ngân hàng để nhận hoàn tiền. Lễ tân sẽ xử lý trong vòng 1–3 ngày làm việc.</p>
                <input type="hidden" id="refund_info_booking_id">
                <div style="margin-bottom:14px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Tên ngân hàng <span style="color:#dc2626">*</span></label>
                    <input type="text" id="refund_bank_name" placeholder="VD: Vietcombank, BIDV, Techcombank..."
                        style="width:100%;padding:9px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;box-sizing:border-box;outline:none;">
                </div>
                <div style="margin-bottom:14px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Số tài khoản <span style="color:#dc2626">*</span></label>
                    <input type="text" id="refund_bank_account" placeholder="Nhập số tài khoản..."
                        style="width:100%;padding:9px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;box-sizing:border-box;outline:none;">
                </div>
                <div style="margin-bottom:6px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Ảnh QR chuyển khoản <span style="font-size:11px;color:#6b7280;">(tuỳ chọn)</span></label>
                    <input type="file" id="refund_qr_file" accept="image/jpeg,image/png,image/webp"
                        style="font-size:13px;color:#374151;">
                </div>
            </div>
            <div style="display:flex;justify-content:flex-end;gap:10px;padding:14px 24px;border-top:1px solid #f0f0f0;">
                <button onclick="skipRefundInfo()"
                    style="padding:9px 18px;background:#6b7280;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;">Bỏ qua</button>
                <button onclick="submitRefundInfo()"
                    style="padding:9px 18px;background:#b45309;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;font-weight:700;">Gửi thông tin</button>
            </div>
        </div>
    </div>

    <script>
    function skipRefundInfo() {
        document.getElementById('refundInfoModal').style.display = 'none';
        window.location.href = 'bookings.php?cancel_status=true';
    }

    function submitRefundInfo() {
        const bid      = document.getElementById('refund_info_booking_id').value;
        const bankName = document.getElementById('refund_bank_name').value.trim();
        const bankAcct = document.getElementById('refund_bank_account').value.trim();
        const qrFile   = document.getElementById('refund_qr_file').files[0];

        if (!bankName || !bankAcct) {
            alert('Vui lòng điền đầy đủ tên ngân hàng và số tài khoản!');
            return;
        }

        const fd = new FormData();
        fd.append('submit_refund_info', '1');
        fd.append('booking_id', bid);
        fd.append('bank_name', bankName);
        fd.append('bank_account', bankAcct);
        if (qrFile) fd.append('qr_image', qrFile);

        fetch('ajax/cancel_booking.php', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(d => {
                if (d.status == 1) {
                    document.getElementById('refundInfoModal').style.display = 'none';
                    window.location.href = 'bookings.php?cancel_status=true';
                } else {
                    alert('Gửi thông tin thất bại, vui lòng thử lại!');
                }
            })
            .catch(() => alert('Có lỗi xảy ra, vui lòng thử lại!'));
    }
    </script>

    <?php require('inc/footer.php'); ?>

    <script>
    function openCompModal(bookingId) {
        document.getElementById('compModal').classList.add('active');
        let list = document.getElementById('comp-list');
        list.innerHTML = '<p style="text-align:center;color:#888;">Đang tải...</p>';

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/get_my_charges.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            list.innerHTML = this.responseText;
        };
        xhr.send('booking_id=' + encodeURIComponent(bookingId));
    }

    function closeCompModal() {
        document.getElementById('compModal').classList.remove('active');
    }

    function openReviewModal() {
        document
            .getElementById('reviewModal')
            .classList.add('active');
    }

    function closeReviewModal() {
        document
            .getElementById('reviewModal')
            .classList.remove('active');
    }

    function review_room(bid, rid) {

        // Đã xóa dòng alert() gây lỗi hiển thị chữ undefined tại đây

        let review_form =
            document.getElementById('review-form');

        review_form.elements['booking_id'].value = bid;

        review_form.elements['room_id'].value = rid;

        openReviewModal();
    }

    function cancel_booking(id) {
        document.getElementById('cancel_booking_id').value = id;
        document.getElementById('cancelModal').style.display = 'flex';
    }

    function closeCancelModal() {
        document.getElementById('cancelModal').style.display = 'none';
    }

    function confirmCancel() {
        const id = document.getElementById('cancel_booking_id').value;
        closeCancelModal();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/cancel_booking.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            let res = this.responseText.trim();
            try {
                let json = JSON.parse(res);
                if (json.result === 'cancelled') {
                    window.location.href = "bookings.php?cancel_status=true";
                } else if (json.result === 'need_refund_form') {
                    document.getElementById('refund_info_booking_id').value = json.booking_id;
                    document.getElementById('refundInfoModal').style.display = 'flex';
                } else {
                    alert('error', 'Huỷ đặt phòng không thành công!');
                }
            } catch(e) {
                alert('error', 'Huỷ đặt phòng không thành công!');
            }
        }
        xhr.send('cancel_booking=1&id=' + encodeURIComponent(id));
    }

    // Huỷ khi đã nhận phòng (arrival=1) — mở modal cảnh báo
    function cancel_booking_checkin(id) {
        document.getElementById('cancel_checkin_id').value = id;
        document.getElementById('cancelCheckinModal').style.display = 'flex';
    }

    function closeCancelCheckinModal() {
        document.getElementById('cancelCheckinModal').style.display = 'none';
    }

    function confirm_cancel_checkin() {
        let id = document.getElementById('cancel_checkin_id').value;
        closeCancelCheckinModal();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/cancel_booking.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.responseText.trim() == "1") {
                window.location.href = "bookings.php?cancel_status=true";
            } else {
                alert('Huỷ không thành công, vui lòng liên hệ lễ tân!');
            }
        };
        xhr.send('cancel_booking=1&id=' + encodeURIComponent(id));
    }

    let review_form =
        document.getElementById('review-form');

    if (review_form) {

        review_form.addEventListener(
            'submit',
            function(e) {

                e.preventDefault();

                let data = new FormData();

                data.append('review_form', '1');

                data.append(
                    'rating',
                    review_form.elements['rating'].value
                );

                data.append(
                    'review',
                    review_form.elements['review'].value
                );

                data.append(
                    'booking_id',
                    review_form.elements['booking_id'].value
                );

                data.append(
                    'room_id',
                    review_form.elements['room_id'].value
                );

                let xhr = new XMLHttpRequest();

                xhr.open(
                    "POST",
                    "ajax/review_room.php",
                    true
                );

                xhr.onload = function() {

                    let result =
                        this.responseText.trim();

                    if (result == "1") {

                        closeReviewModal();

                        window.location.href =
                            'bookings.php?review_status=true';

                    } else {

                        alert(
                            'error',
                            result || 'Đánh giá thất bại!'
                        );
                    }
                };

                xhr.onerror = function() {

                    alert(
                        'error',
                        'Lỗi kết nối server!'
                    );
                };

                xhr.send(data);

            });
    }

    const depositPayment = {
        bankCode: 'MB',
        bankName: 'MB Bank',
        accountNo: '0914762614',
        accountName: 'NGUYEN ANH KIET'
    };

    let selectedDepositBookingId = 0;

    function formatVnd(amount) {
        return Number(amount || 0).toLocaleString('vi-VN') + ' VND';
    }

    function openDepositModal(id, amount, orderId) {
        selectedDepositBookingId = id;

        let note = 'DATCOC ' + (orderId || id);
        let qrUrl = 'https://img.vietqr.io/image/' +
            encodeURIComponent(depositPayment.bankCode) + '-' +
            encodeURIComponent(depositPayment.accountNo) +
            '-compact2.png?amount=' + encodeURIComponent(Math.round(amount)) +
            '&addInfo=' + encodeURIComponent(note) +
            '&accountName=' + encodeURIComponent(depositPayment.accountName);

        document.getElementById('deposit_qr_img').src = qrUrl;
        document.getElementById('deposit_amount_text').innerText = formatVnd(amount);
        document.getElementById('deposit_bank_text').innerText = depositPayment.bankName;
        document.getElementById('deposit_account_text').innerText = depositPayment.accountNo;
        document.getElementById('deposit_name_text').innerText = depositPayment.accountName;
        document.getElementById('deposit_note_text').innerText = note;
        document.getElementById('depositModal').classList.add('active');
    }

    function closeDepositModal() {
        document.getElementById('depositModal').classList.remove('active');
        clearDepositProof();
    }

    function confirmDepositPayment() {
        if (selectedDepositBookingId) {
            let file = document.getElementById('deposit_proof_input').files[0];
            pay_deposit(selectedDepositBookingId, file || null);
        }
    }

    function onDepositProofChange(input) {
        let btn = document.getElementById('deposit_confirm_btn');
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('deposit_proof_img').src = e.target.result;
                document.getElementById('deposit_proof_preview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
            document.getElementById('deposit_upload_text').textContent = input.files[0].name;
            btn.disabled = false;
            btn.style.opacity = '1';
            btn.style.cursor = 'pointer';
        }
    }

    function clearDepositProof() {
        document.getElementById('deposit_proof_input').value = '';
        document.getElementById('deposit_proof_preview').style.display = 'none';
        document.getElementById('deposit_proof_img').src = '';
        document.getElementById('deposit_upload_text').textContent = 'Chọn ảnh chuyển khoản để tiếp tục';
        let btn = document.getElementById('deposit_confirm_btn');
        btn.disabled = true;
        btn.style.opacity = '0.5';
        btn.style.cursor = 'not-allowed';
    }

    // ===== QR THANH TOÁN BỒI THƯỜNG =====
    let selectedChargeId = 0;
    let selectedChargeBookingId = 0;

    function openChargeQR(chargeId, bookingId, amount) {
        selectedChargeId = chargeId;
        selectedChargeBookingId = bookingId;

        let note = 'BOITHUONG-' + chargeId;
        let qrUrl = 'https://img.vietqr.io/image/' +
            encodeURIComponent(depositPayment.bankCode) + '-' +
            encodeURIComponent(depositPayment.accountNo) +
            '-compact2.png?amount=' + encodeURIComponent(Math.round(amount)) +
            '&addInfo=' + encodeURIComponent(note) +
            '&accountName=' + encodeURIComponent(depositPayment.accountName);

        document.getElementById('charge_qr_img').src = qrUrl;
        document.getElementById('charge_amount_text').innerText = formatVnd(amount);
        document.getElementById('charge_bank_text').innerText = depositPayment.bankName;
        document.getElementById('charge_account_text').innerText = depositPayment.accountNo;
        document.getElementById('charge_name_text').innerText = depositPayment.accountName;
        document.getElementById('charge_note_text').innerText = note;
        document.getElementById('chargeQRModal').classList.add('active');
    }

    function closeChargeQRModal() {
        document.getElementById('chargeQRModal').classList.remove('active');
    }

    function confirmChargePayment() {
        let btn = document.getElementById('charge_confirm_btn');
        btn.disabled = true;
        btn.innerText = 'Đang xử lý...';

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/get_my_charges.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            btn.disabled = false;
            btn.innerText = 'Tôi đã chuyển khoản';

            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                closeChargeQRModal();
                // Reload lại danh sách bồi thường trong modal
                let list = document.getElementById('comp-list');
                list.innerHTML = '<p style="text-align:center;color:#888;">Đang tải...</p>';
                let xhr2 = new XMLHttpRequest();
                xhr2.open('POST', 'ajax/get_my_charges.php', true);
                xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr2.onload = function() {
                    list.innerHTML = this.responseText;
                };
                xhr2.send('booking_id=' + encodeURIComponent(selectedChargeBookingId));
            } else {
                alert('error', 'Xác nhận thất bại, vui lòng thử lại!');
            }
        };

        xhr.send('confirm_charge_payment=1&charge_id=' + encodeURIComponent(selectedChargeId) +
            '&booking_id=' + encodeURIComponent(selectedChargeBookingId));
    }
    // ===== END QR BỒI THƯỜNG =====

    function pay_deposit(id, proofFile) {
        let btn = document.getElementById('deposit_confirm_btn');
        if(btn) { btn.disabled = true; btn.style.opacity='0.7'; btn.innerText = 'Đang gửi...'; }

        let formData = new FormData();
        formData.append('pay_deposit', '1');
        formData.append('id', id);
        if (proofFile) formData.append('deposit_proof', proofFile);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/pay_deposit.php", true);

        xhr.onload = function() {
            let res = this.responseText.trim();
            if (res == "1") {
                closeDepositModal();
                if(window._pollingTimer) clearInterval(window._pollingTimer);
                alert('success', 'Đã gửi ảnh! Vui lòng chờ lễ tân xác nhận cọc.');
                setTimeout(function(){ window.location.href = 'bookings.php?deposit_status=true'; }, 1200);
            } else {
                if(btn) { btn.disabled = false; btn.style.opacity='1'; btn.innerText = 'Tôi đã chuyển khoản'; }
                alert('error', 'Gửi thất bại, vui lòng thử lại!');
            }
        };

        xhr.onerror = function() {
            if(btn) { btn.disabled = false; btn.style.opacity='1'; btn.innerText = 'Tôi đã chuyển khoản'; }
            alert('error', 'Lỗi kết nối server!');
        };

        xhr.send(formData);
    }
    // ══════ ĐỔI NGÀY ══════
    function openChangeDateModal(bookingId, currentCheckin, currentCheckout) {
        document.getElementById('cd_booking_id').value = bookingId;
        // Set min date = hôm nay, pre-fill với ngày hiện tại
        let today = new Date().toISOString().split('T')[0];
        let ci = document.getElementById('cd_checkin');
        let co = document.getElementById('cd_checkout');
        ci.min = today;
        co.min = today;
        ci.value = currentCheckin;
        co.value = currentCheckout;
        hideMsgBox('cd_msg');
        document.getElementById('changeDateModal').classList.add('active');
    }

    function closeChangeDateModal() {
        document.getElementById('changeDateModal').classList.remove('active');
    }

    function submitDateChange() {
        let btn = document.getElementById('cd_submit_btn');
        let bookingId = document.getElementById('cd_booking_id').value;
        let newCheckin = document.getElementById('cd_checkin').value;
        let newCheckout = document.getElementById('cd_checkout').value;

        if (!newCheckin || !newCheckout) {
            showMsgBox('cd_msg', 'error', 'Vui lòng chọn đầy đủ ngày nhận và trả phòng.');
            return;
        }
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang gửi...';

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/change_booking.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-paper-plane"></i> Gửi yêu cầu';
            try {
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    showMsgBox('cd_msg', 'success', res.msg);
                    setTimeout(() => {
                        closeChangeDateModal();
                        location.reload();
                    }, 1800);
                } else {
                    showMsgBox('cd_msg', 'error', res.msg);
                }
            } catch (e) {
                showMsgBox('cd_msg', 'error', 'Lỗi hệ thống.');
            }
        };
        xhr.onerror = function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-paper-plane"></i> Gửi yêu cầu';
            showMsgBox('cd_msg', 'error', 'Lỗi kết nối.');
        };
        xhr.send('request_date_change=1&booking_id=' + encodeURIComponent(bookingId) +
            '&new_checkin=' + encodeURIComponent(newCheckin) +
            '&new_checkout=' + encodeURIComponent(newCheckout));
    }

    // ══════ CHECK-OUT SỚM ══════
    function openEarlyCheckoutModal(bookingId, checkin, checkout) {
        document.getElementById('ec_booking_id').value = bookingId;
        // Hiển thị thông tin gốc
        document.getElementById('ec_original_checkin').textContent = formatDate(checkin);
        document.getElementById('ec_original_checkout').textContent = formatDate(checkout);
        // Set range cho ngày trả sớm
        let tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        let minDate = tomorrow.toISOString().split('T')[0];
        // max = 1 ngày trước checkout gốc
        let maxDt = new Date(checkout);
        maxDt.setDate(maxDt.getDate() - 1);
        let maxDate = maxDt.toISOString().split('T')[0];

        let ecInput = document.getElementById('ec_early_date');
        ecInput.min = minDate > checkin ? minDate : checkin;
        ecInput.max = maxDate;
        ecInput.value = '';
        hideMsgBox('ec_msg');
        document.getElementById('earlyCheckoutModal').classList.add('active');
    }

    function closeEarlyCheckoutModal() {
        document.getElementById('earlyCheckoutModal').classList.remove('active');
    }

    function submitEarlyCheckout() {
        let btn = document.getElementById('ec_submit_btn');
        let bookingId = document.getElementById('ec_booking_id').value;
        let earlyDate = document.getElementById('ec_early_date').value;

        if (!earlyDate) {
            showMsgBox('ec_msg', 'error', 'Vui lòng chọn ngày trả phòng sớm.');
            return;
        }
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang gửi...';

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/change_booking.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-paper-plane"></i> Gửi yêu cầu';
            try {
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    showMsgBox('ec_msg', 'success', res.msg);
                    setTimeout(() => {
                        closeEarlyCheckoutModal();
                        location.reload();
                    }, 1800);
                } else {
                    showMsgBox('ec_msg', 'error', res.msg);
                }
            } catch (e) {
                showMsgBox('ec_msg', 'error', 'Lỗi hệ thống.');
            }
        };
        xhr.onerror = function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-paper-plane"></i> Gửi yêu cầu';
            showMsgBox('ec_msg', 'error', 'Lỗi kết nối.');
        };
        xhr.send('request_early_checkout=1&booking_id=' + encodeURIComponent(bookingId) +
            '&early_date=' + encodeURIComponent(earlyDate));
    }

    // ══════ HELPERS ══════
    function formatDate(ymd) {
        if (!ymd) return '';
        let parts = ymd.split('-');
        return parts[2] + '-' + parts[1] + '-' + parts[0];
    }

    function showMsgBox(id, type, msg) {
        let el = document.getElementById(id);
        el.style.display = 'block';
        el.style.background = type == 'success' ? '#dcfce7' : '#fee2e2';
        el.style.color = type == 'success' ? '#15803d' : '#dc2626';
        el.textContent = msg;
    }

    function hideMsgBox(id) {
        let el = document.getElementById(id);
        if (el) el.style.display = 'none';
    }
    </script>
</body>

</html>