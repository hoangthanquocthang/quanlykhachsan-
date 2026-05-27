<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <title><?php echo $settings_r['site_title'] ?> - Xác nhận đặt phòng</title>
  <style>
  :root {
      --green:       #B88B4A;
      --green-dark:  #9a7035;
      --green-light: #edf3fa;
      --gold:        #c8a96e;
      --text:        #1a1a1a;
      --muted:       #6b7280;
      --border:      #e8e8e8;
      --bg:          #f7f5f2;
      --white:       #ffffff;
      --danger:      #dc2626;
      --radius-lg:   16px;
      --radius-md:   10px;
      --shadow-card: 0 4px 24px rgba(0,0,0,.08);
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
  }

  /* ── Page wrapper ── */
  .confirm-wrap {
      max-width: 1140px;
      margin: 0 auto;
      padding: 0 24px 60px;
  }

  /* ── Header ── */
  .confirm-header { padding: 36px 0 28px; border-bottom: 1px solid var(--border); margin-bottom: 36px; }
  .confirm-title {
        font-family: 'Cormorant Garamond', serif; letter-spacing:1px;
      font-family: 'Playfair Display', serif;
      font-size: clamp(24px, 3.5vw, 36px);
      font-weight: 700;
      color: var(--text);
      margin-bottom: 10px;
  }
  .breadcrumb-row { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
  .bc-link { font-size: 14px; color: var(--muted); text-decoration: none; transition: color .2s; }
  .bc-link:hover { color: var(--green); }
  .bc-sep { color: var(--muted); font-size: 11px; }
  .bc-current { font-size: 14px; color: var(--green); font-weight: 500; }

  /* ── Two-column layout ── */
  .confirm-row {
      display: flex;
      gap: 32px;
      align-items: flex-start;
      flex-wrap: wrap;
  }

  .confirm-left { flex: 1.4; min-width: 300px; }
  .confirm-right { flex: 1; min-width: 320px; position: sticky; top: 20px; }

  /* ── Room carousel card ── */
  .room-card {
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-card);
      overflow: hidden;
  }

  /* ── Carousel ── */
  .carousel-wrapper { position: relative; overflow: hidden; border-radius: var(--radius-lg) var(--radius-lg) 0 0; }

  .carousel-slides { position: relative; }
  .carousel-slide { display: none; }
  .carousel-slide.active { display: block; animation: fadeIn .45s ease; }
  @keyframes fadeIn { from { opacity: .4; transform: scale(1.02); } to { opacity: 1; transform: scale(1); } }

  .carousel-slide img {
      width: 100%; height: 360px;
      object-fit: cover; display: block;
  }

  /* Gradient overlay bottom */
  .carousel-wrapper::after {
      content: '';
      position: absolute; bottom: 0; left: 0; right: 0;
      height: 80px;
      background: linear-gradient(to top, rgba(0,0,0,.45), transparent);
      pointer-events: none;
  }

  /* Prev / Next buttons — inside wrapper */
  .carousel-nav {
      position: absolute; top: 50%; transform: translateY(-50%);
      width: 100%; display: flex; justify-content: space-between;
      padding: 0 14px; pointer-events: none;
      z-index: 2;
  }
  .carousel-nav button {
      pointer-events: all;
      width: 44px; height: 44px; border-radius: 50%;
      background: rgba(0,0,0,.45);
      color: #fff;
      border: none;
      font-size: 22px; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      transition: background .2s, transform .2s;
      backdrop-filter: blur(4px);
  }
  .carousel-nav button:hover { background: rgba(0,0,0,.75); transform: scale(1.08); }

  /* Dot counter overlay (bottom-right) */
  .carousel-counter {
      position: absolute; bottom: 14px; right: 16px;
      background: rgba(0,0,0,.5); color: #fff;
      font-size: 12px; font-weight: 600;
      padding: 3px 10px; border-radius: 20px;
      backdrop-filter: blur(4px);
      z-index: 2; letter-spacing: .04em;
  }

  /* Thumbnail strip */
  .carousel-thumbs {
      display: flex; gap: 8px;
      padding: 10px 12px;
      overflow-x: auto;
      scrollbar-width: none;
      background: #fff;
  }
  .carousel-thumbs::-webkit-scrollbar { display: none; }
  .carousel-thumb {
      flex-shrink: 0;
      width: 68px; height: 52px;
      border-radius: 8px;
      object-fit: cover;
      cursor: pointer;
      border: 2.5px solid transparent;
      transition: border-color .25s, opacity .25s, transform .2s;
      opacity: .6;
  }
  .carousel-thumb.active {
      border-color: var(--gold);
      opacity: 1;
      transform: scale(1.05);
  }
  .carousel-thumb:hover { opacity: .9; }

  /* Room info row under image */
  .room-info-strip {
      padding: 20px 24px 22px;
      border-top: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;
  }
  .ri-name { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; }
  .ri-price { font-size: 18px; font-weight: 700; color: var(--green); }
  .ri-price span { font-size: 13px; font-weight: 400; color: var(--muted); }

  /* Quick stats */
  .room-stats {
      display: flex; gap: 10px; padding: 0 24px 24px; flex-wrap: wrap;
  }
  .stat-chip {
      display: flex; align-items: center; gap: 6px;
      padding: 7px 14px;
      background: var(--green-light);
      border-radius: 20px;
      font-size: 13px; font-weight: 500;
      color: var(--green-dark);
  }
  .stat-chip i { font-size: 14px; }

  /* ── Form card ── */
  .form-card {
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-card);
      overflow: hidden;
  }

  .form-card-header {
      background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
      padding: 20px 28px;
      color: #fff;
  }
  .form-card-header h6 {
      font-family: 'Playfair Display', serif;
      font-size: 20px; font-weight: 600; margin: 0;
  }
  .form-card-header p { font-size: 13px; opacity: .8; margin: 4px 0 0; }

  .form-body { padding: 28px; }

  .form-section-label {
      font-size: 11px; font-weight: 600; letter-spacing: .08em;
      text-transform: uppercase; color: var(--muted);
      margin: 0 0 14px;
      display: flex; align-items: center; gap: 8px;
  }
  .form-section-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }

  .form-row-2 { display: flex; gap: 14px; }
  .form-group { display: flex; flex-direction: column; margin-bottom: 16px; flex: 1; }
  .form-group.full { flex: 1 1 100%; }

  .form-group label {
      font-size: 13px; font-weight: 600; margin-bottom: 7px; color: #374151;
      display: flex; align-items: center; gap: 6px;
  }
  .form-group label i { color: var(--green); font-size: 13px; }

  .form-group input,
  .form-group textarea,
  .form-group select {
      width: 100%;
      padding: 11px 14px;
      border: 1.5px solid var(--border);
      border-radius: 8px;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      background: #fafafa;
      outline: none;
      transition: border-color .25s, box-shadow .25s, background .25s;
  }
  .form-group input:focus,
  .form-group textarea:focus,
  .form-group select:focus {
      border-color: var(--green);
      background: #fff;
      box-shadow: 0 0 0 3px rgba(184,139,74,.12);
  }
  .form-group textarea { resize: vertical; min-height: 72px; }

  /* Date fields with icon overlay */
  .date-wrapper { position: relative; }
  .date-wrapper input { padding-right: 8px; }

  /* Stay summary box */
  #stay-summary {
      display: none;
      background: var(--green-light);
      border: 1px solid rgba(184,139,74,.2);
      border-radius: 10px;
      padding: 16px 18px;
      margin-bottom: 16px;
  }
  #stay-summary .ss-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
  #stay-summary .ss-row:last-child { margin-bottom: 0; border-top: 1px dashed rgba(184,139,74,.25); padding-top: 10px; margin-top: 4px; }
  #stay-summary .ss-label { font-size: 13px; color: var(--muted); }
  #stay-summary .ss-val { font-size: 14px; font-weight: 600; color: var(--green-dark); }
  #stay-summary .ss-total-label { font-size: 14px; font-weight: 600; color: var(--text); }
  #stay-summary .ss-total-val { font-size: 18px; font-weight: 700; color: var(--green); }

  /* Error / info message */
  #pay_info {
      font-size: 14px; color: var(--danger);
      margin-bottom: 14px; line-height: 1.6; font-weight: 500;
      padding: 10px 14px;
      border-radius: 8px;
      background: #fef2f2;
      border: 1px solid #fecaca;
      display: flex; align-items: flex-start; gap: 8px;
  }
  #pay_info.hidden { display: none !important; }
  #pay_info i { flex-shrink: 0; margin-top: 2px; }

  /* Loader */
  .loader {
      display: none;
      width: 28px; height: 28px;
      border: 3px solid #e5e7eb;
      border-top-color: var(--green);
      border-radius: 50%;
      animation: spin .7s linear infinite;
      margin: 0 auto 14px;
  }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* Room number select */
  #room-number-section {
      margin-bottom: 16px;
  }

  /* Pay button */
  .btn-pay {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 16px; font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      transition: all .3s;
      box-shadow: 0 4px 14px rgba(184,139,74,.35);
      display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .btn-pay:not(:disabled):hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(184,139,74,.4);
  }
  .btn-pay:disabled { background: #9ca3af; box-shadow: none; cursor: not-allowed; }

  /* Trust badges */
  .trust-row {
      display: flex; justify-content: center; gap: 20px;
      margin-top: 16px; flex-wrap: wrap;
  }
  .trust-item { display: flex; align-items: center; gap: 5px; font-size: 12px; color: var(--muted); }
  .trust-item i { color: var(--green); }

  /* ── Loyalty Redeem Box ── */
  .loyalty-redeem-box {
      background: linear-gradient(135deg, #1a1208 0%, #2a1c0a 100%);
      border-radius: 12px;
      padding: 18px 20px;
      margin-bottom: 16px;
      color: #fff;
      border: 1.5px solid rgba(184,139,74,.35);
  }
  .loyalty-redeem-box .lr-header {
      display: flex; align-items: center; gap: 10px; margin-bottom: 12px;
  }
  .loyalty-redeem-box .lr-title {
      font-size: 14px; font-weight: 700; color: #f0c96b;
  }
  .loyalty-redeem-box .lr-pts {
      font-size: 12px; color: rgba(255,255,255,.6);
  }
  .lr-slider-wrap { margin: 8px 0; }
  .lr-slider {
      width: 100%; -webkit-appearance: none; appearance: none;
      height: 6px; border-radius: 6px;
      background: rgba(255,255,255,.15); outline: none; cursor: pointer;
  }
  .lr-slider::-webkit-slider-thumb {
      -webkit-appearance: none; appearance: none;
      width: 20px; height: 20px; border-radius: 50%;
      background: linear-gradient(135deg,#B88B4A,#f0c96b);
      cursor: pointer; border: 2px solid #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,.3);
  }
  .lr-result {
      display: flex; justify-content: space-between;
      align-items: center; margin-top: 10px;
      padding-top: 10px; border-top: 1px solid rgba(255,255,255,.1);
      font-size: 13px;
  }
  .lr-result .lr-discount { color: #6fe69e; font-weight: 700; font-size: 15px; }
  .lr-zero { color: rgba(255,255,255,.45); font-size: 12px; text-align: center; padding: 8px 0 0; }

  @media (max-width: 768px) {
      .confirm-left, .confirm-right { flex: 1 1 100%; }
      .confirm-right { position: static; }
      .form-row-2 { flex-direction: column; gap: 0; }
      .carousel-slide img { height: 240px; }
      .carousel-thumbs { padding: 8px; }
      .carousel-thumb { width: 56px; height: 42px; }
      .room-stats { padding: 0 16px 16px; }
      .room-info-strip { padding: 16px; }
  }
  </style>
</head>
<body style="background:#faf8f4;">

  <?php
    $pre_adult    = isset($_GET['adult'])    ? intval($_GET['adult'])    : -1;
    $pre_children = isset($_GET['children']) ? intval($_GET['children']) : -1;
  ?>
  <?php require('inc/header.php'); ?>
  <script>
  // Ghi đè _gpAdult/_gpChild từ URL params nếu có
  (function() {
    var _pa = <?php echo $pre_adult; ?>;
    var _pc = <?php echo $pre_children; ?>;
    if (_pa >= 0) { window._gpAdult = _pa; sessionStorage.setItem('ks_adult', _pa); }
    if (_pc >= 0) { window._gpChild = _pc; sessionStorage.setItem('ks_children', _pc); }
    var btn = document.getElementById('nav-guests-btn');
    if (btn) btn.textContent = '1 phòng, ' + ((window._gpAdult||1) + (window._gpChild||0)) + ' khách';
  })();
  </script>

  <?php 
    if(!isset($_GET['id']) || $settings_r['shutdown']==true){ redirect('rooms.php'); }
    else if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){ redirect('rooms.php'); }

    $data = filteration($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');
    if(mysqli_num_rows($room_res)==0){ redirect('rooms.php'); }
    $room_data = mysqli_fetch_assoc($room_res);

    // Lấy số phòng đã chọn từ trang rooms
    $preselected_room_no = isset($_GET['room_no']) ? trim($_GET['room_no']) : '';
    if(empty($preselected_room_no)){ redirect('rooms.php'); }

    // Doc ngay tu URL (tu trang rooms.php hoac header popup)
    $pre_checkin  = isset($_GET['checkin'])  ? trim($_GET['checkin'])  : '';
    $pre_checkout = isset($_GET['checkout']) ? trim($_GET['checkout']) : '';

    $_SESSION['room'] = [
      "id"        => $room_data['id'],
      "name"      => $room_data['name'],
      "price"     => $room_data['price'],
      "payment"   => null,
      "available" => false,
    ];

    $user_res  = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']], "i");
    $user_data = mysqli_fetch_assoc($user_res);

    // Collect images
    $img_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]'");
    $imgs = [];
    if(mysqli_num_rows($img_q) > 0){
        while($img_row = mysqli_fetch_assoc($img_q)){
            $src = ROOMS_IMG_PATH."thumbnail.jpg";
            if(file_exists(UPLOAD_IMAGE_PATH.ROOMS_FOLDER.$img_row['image'])){ $src = ROOMS_IMG_PATH.$img_row['image']; }
            $imgs[] = $src;
        }
    } else {
        $imgs[] = ROOMS_IMG_PATH."thumbnail.jpg";
    }

    // Facilities for stat chips
    $fac_q3 = mysqli_query($con,"SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]' LIMIT 4");
    $chip_icons = ['Wi-Fi'=>'bi-wifi','Máy Lạnh'=>'bi-wind','Truyền Hình'=>'bi-tv','Máy Nước Nóng'=>'bi-droplet-half'];
  ?>

  <div class="confirm-wrap">

    <!-- Header -->
    <div class="confirm-header">
      <h1 class="confirm-title">Xác nhận đặt phòng</h1>
      <div class="breadcrumb-row">
        <a href="index.php" class="bc-link">Trang chủ</a>
        <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
        <a href="rooms.php" class="bc-link">Danh sách phòng</a>
        <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
        <a href="room_details.php?id=<?= $room_data['id'] ?>&room_no=<?= htmlspecialchars($preselected_room_no) ?>" class="bc-link"><?= $room_data['name'] . (!empty($preselected_room_no) ? ' - P.' . $preselected_room_no : '') ?></a>
        <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
        <span class="bc-current">Xác nhận đặt phòng</span>
      </div>
    </div>

    <div class="confirm-row">

      <!-- Left: Room preview -->
      <div class="confirm-left">
        <div class="room-card">

          <!-- Carousel -->
          <div class="carousel-wrapper">
            <div class="carousel-slides">
              <?php foreach($imgs as $i => $src): ?>
                <div class="carousel-slide <?= $i===0?'active':'' ?>">
                  <img src="<?= $src ?>" alt="Ảnh phòng">
                </div>
              <?php endforeach; ?>
            </div>

            <?php if(count($imgs) > 1): ?>
            <div class="carousel-nav">
              <button onclick="changeSlide(-1)">&#8249;</button>
              <button onclick="changeSlide(1)">&#8250;</button>
            </div>
            <div class="carousel-counter">
              <span id="slide-current">1</span> / <?= count($imgs) ?>
            </div>
            <?php endif; ?>
          </div>

          <?php if(count($imgs) > 1): ?>
          <div class="carousel-thumbs">
            <?php foreach($imgs as $i => $src): ?>
              <img src="<?= $src ?>" alt="Thumb <?= $i+1 ?>"
                   class="carousel-thumb <?= $i===0?'active':'' ?>"
                   onclick="goSlide(<?= $i ?>)">
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

          <!-- Room name + price -->
          <div class="room-info-strip">
            <div class="ri-name"><?= $room_data['name'] . (!empty($preselected_room_no) ? ' - P.' . $preselected_room_no : '') ?></div>
            <?php $price = number_format($room_data['price'],0,',','.'); ?>
            <div class="ri-price"><?= $price ?> VND <span>/ đêm</span></div>
          </div>

          <!-- Stat chips -->
          <div class="room-stats">
            <span class="stat-chip"><i class="bi bi-rulers"></i><?= $room_data['area'] ?> m²</span>
            <span class="stat-chip"><i class="bi bi-person"></i><?= $room_data['adult'] ?> Người lớn</span>
            <span class="stat-chip"><i class="bi bi-person-fill"></i><?= $room_data['children'] ?> Trẻ em</span>
            <?php while($ch = mysqli_fetch_assoc($fac_q3)): $ic = $chip_icons[$ch['name']] ?? 'bi-check2'; ?>
              <span class="stat-chip"><i class="bi <?= $ic ?>"></i><?= $ch['name'] ?></span>
            <?php endwhile; ?>
          </div>

        </div>
      </div>

      <!-- Right: Booking form -->
      <div class="confirm-right">
        <div class="form-card">

          <div class="form-card-header">
            <h6>Thông tin đặt phòng</h6>
            <p>Điền đầy đủ thông tin để hoàn tất đặt phòng</p>
          </div>

          <div class="form-body">
            <form action="pay_now.php" method="POST" id="booking_form">

              <!-- Personal info -->
              <div class="form-section-label">Thông tin cá nhân</div>

              <div class="form-row-2">
                <div class="form-group">
                  <label><i class="bi bi-person"></i> Họ tên</label>
                  <input name="name" type="text" value="<?= htmlspecialchars($user_data['name']) ?>" required placeholder="Nhập họ tên...">
                </div>
                <div class="form-group">
                  <label><i class="bi bi-telephone"></i> Số điện thoại</label>
                  <input name="phonenum" type="number" value="<?= htmlspecialchars($user_data['phonenum']) ?>" required placeholder="Số điện thoại...">
                </div>
              </div>

              <div class="form-group full">
                <label><i class="bi bi-geo-alt"></i> Địa chỉ</label>
                <textarea name="address" rows="2" required placeholder="Địa chỉ của bạn..."><?= htmlspecialchars($user_data['address']) ?></textarea>
              </div>

              <!-- Date fields -->
              <div class="form-section-label" style="margin-top:4px;">Thời gian lưu trú</div>

              <div class="form-row-2">
                <div class="form-group">
                  <label>Nhận phòng</label>
                  <div class="date-wrapper">
                    <input name="checkin" type="date" onchange="check_availability()" value="<?php echo htmlspecialchars($pre_checkin); ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Trả phòng</label>
                  <div class="date-wrapper">
                    <input name="checkout" type="date" onchange="check_availability()" value="<?php echo htmlspecialchars($pre_checkout); ?>" required>
                  </div>
                </div>
              </div>

              <!-- Check-in/out time policy -->
              <div style="display:flex;gap:8px;margin-bottom:14px;">
                <div style="flex:1;background:#f0f5ff;border-radius:10px;padding:10px 14px;border-left:3px solid #B88B4A;display:flex;align-items:center;gap:9px;">
                  <i class="bi bi-box-arrow-in-right" style="color:#B88B4A;font-size:18px;flex-shrink:0;"></i>
                  <div>
                    <div style="font-size:11px;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">Check-in</div>
                    <div style="font-size:15px;font-weight:700;color:#B88B4A;">Từ 15:00 <span style="font-size:12px;font-weight:500;">(3:00 PM)</span></div>
                    <div style="font-size:11px;color:#666;">Early check-in 12:00 PM – 15:00 PM (miễn phí)</div>
                  </div>
                </div>
                <div style="flex:1;background:#fff5f5;border-radius:10px;padding:10px 14px;border-left:3px solid #dc3545;display:flex;align-items:center;gap:9px;">
                  <i class="bi bi-box-arrow-right" style="color:#dc3545;font-size:18px;flex-shrink:0;"></i>
                  <div>
                    <div style="font-size:11px;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">Check-out</div>
                    <div style="font-size:15px;font-weight:700;color:#dc3545;">Trước 12:00 <span style="font-size:12px;font-weight:500;">(12:00 PM — Trưa)</span></div>
                    <div style="font-size:11px;color:#666;">Trễ đến 15:00 PM: +30% · Trễ đến 18:00 PM: +50%</div>
                  </div>
                </div>
              </div>

              <!-- Deposit info -->
              <?php
                // Lay ty le dat coc tu settings
                $deposit_settings_q = select("SELECT `deposit_rate` FROM `settings` WHERE `sr_no`=? LIMIT 1",[1],'i');
                $deposit_settings_r = mysqli_fetch_assoc($deposit_settings_q);
                $deposit_rate_val = (isset($deposit_settings_r['deposit_rate']) && $deposit_settings_r['deposit_rate'] > 0)
                  ? floatval($deposit_settings_r['deposit_rate'])
                  : 20.0;
                // Deposit tinh theo % gia 1 dem (bao gom check-in/out note)
                $deposit_per_night = round($room_data['price'] * $deposit_rate_val / 100);
                $deposit_display = number_format($deposit_per_night, 0, ',', '.');
                $deposit_rate_display = rtrim(rtrim(number_format($deposit_rate_val, 1), '0'), '.');
              ?>
              <div style="background:#fdf6e3;border:1px solid #e8d5a0;border-radius:10px;padding:11px 14px;margin-bottom:14px;display:flex;align-items:center;gap:10px;">
                <i class="bi bi-wallet2" style="color:#c9a84c;font-size:18px;flex-shrink:0;"></i>
                <div style="font-size:13px;color:#78530a;">
                  <b>Đặt cọc bảo đảm khi nhận phòng:</b>
                  <span style="font-size:15px;font-weight:700;color:#92650a;margin-left:6px;"><?= $deposit_display ?> VND</span>
                  <span style="font-size:11px;color:#a07830;margin-left:4px;">(<?= $deposit_rate_display ?>% × giá 1 đêm)</span>
                  <div style="font-size:11px;color:#a07830;margin-top:2px;">Hoàn trả đầy đủ khi trả phòng nếu không phát sinh hư hỏng.</div>
                </div>
              </div>

              <!-- Loader -->
              <div class="loader" id="info_loader"></div>

              <!-- Error msg -->
              <p id="pay_info" class="">
                <i class="bi bi-info-circle"></i>
                <span id="pay_info_text">Vui lòng chọn ngày nhận phòng và trả phòng!</span>
              </p>

              <!-- Stay summary (shown on success) -->
              <div id="stay-summary">
                <div class="ss-row">
                  <span class="ss-label">Thời gian lưu trú</span>
                  <span class="ss-val" id="ss-nights">—</span>
                </div>
                <div class="ss-row">
                  <span class="ss-label">Giá mỗi đêm</span>
                  <span class="ss-val"><?= $price ?> VND</span>
                </div>
                <?php if($room_data['children'] > 0):
                    $surcharge_amt = number_format($room_data['price'] * 0.10, 0, ',', '.');
                ?>
                <div id="surcharge-row" class="ss-row" style="display:none;">
                  <span class="ss-label" style="color:#d97706;">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Phụ thu trẻ em 10–16 tuổi (10%/đêm)
                  </span>
                  <span class="ss-val" style="color:#d97706;" id="ss-surcharge">—</span>
                </div>
                <?php endif; ?>
                <div class="ss-row">
                  <span class="ss-total-label">Tổng thanh toán</span>
                  <span class="ss-total-val" id="ss-total">—</span>
                </div>
                <div id="ss-loyrow" class="ss-row" style="display:none;">
                  <span class="ss-label" style="color:#2d7a3a;">🎁 Giảm từ điểm</span>
                  <span class="ss-val" style="color:#2d7a3a;" id="ss-loy-val">— </span>
                </div>
              </div>

              <?php if($room_data['children'] > 0): ?>
              <div style="margin-bottom:16px; background:#fffbeb; border:1px solid #fde68a; border-radius:10px; padding:12px 16px;">
                  <div style="font-size:12px; font-weight:700; color:#92400e; margin-bottom:10px;">
                      <i class="bi bi-people-fill"></i> Thông tin trẻ em
                  </div>

                  <!-- Dropdown số trẻ em từ 10–16 tuổi -->
                  <div style="margin-bottom:10px;">
                      <label style="font-size:13px; color:#78350f; font-weight:600; display:block; margin-bottom:6px;">
                          Số trẻ em <strong>từ 10–16 tuổi</strong> đi cùng:
                      </label>
                      <select id="children-count" name="children_count"
                          onchange="updateChildrenOlder(); updateSurcharge();"
                          style="width:100%; padding:9px 12px; border:1px solid #fde68a; border-radius:8px; font-size:14px; font-family:inherit; background:#fff; color:#78350f; font-weight:600; cursor:pointer; outline:none;">
                          <?php for($i = 0; $i <= $room_data['children']; $i++): ?>
                          <option value="<?= $i ?>"><?= $i === 0 ? '0 — Không có trẻ em từ 10–16 tuổi' : $i . ' trẻ em' ?></option>
                          <?php endfor; ?>
                      </select>

                      <!-- Dropdown 2: Trong số đó, bao nhiêu trẻ từ 10–16 tuổi -->
                      <div id="children-older-wrap" style="display:none; margin-top:10px;">
                          <label style="font-size:13px; color:#78350f; font-weight:600; display:block; margin-bottom:6px;">
                              Trong đó, số trẻ em <strong>từ 10–16 tuổi</strong> (có phụ thu):
                          </label>
                          <select id="children-older" name="children_older"
                              onchange="updateSurcharge()"
                              style="width:100%; padding:9px 12px; border:1px solid #fde68a; border-radius:8px; font-size:14px; font-family:inherit; background:#fff; color:#78350f; font-weight:600; cursor:pointer; outline:none;">
                              <option value="0">0 — Tất cả dưới 10 tuổi (miễn phí)</option>
                          </select>
                          <div style="font-size:11px; color:#a16207; margin-top:5px;">
                              Trẻ còn lại được tính là dưới 10 tuổi — <strong>miễn phí</strong>
                          </div>
                      </div>
                      <div style="font-size:11px; color:#a16207; margin-top:5px;">
                          Tối đa <?= $room_data['children'] ?> trẻ em cho phòng này &nbsp;·&nbsp; Phụ thu <?= $surcharge_amt ?> VND / trẻ 10–16 tuổi / đêm
                      </div>
                  </div>

                  <!-- Ghi chú quy định -->
                  <div style="border-top:1px dashed #fde68a; padding-top:10px; display:flex; flex-direction:column; gap:5px;">
                      <div style="font-size:11px; color:#78350f; display:flex; align-items:center; gap:6px;">
                          <i class="bi bi-dot" style="font-size:18px; line-height:1; color:#d97706;"></i>
                          Trẻ em <strong>dưới 10 tuổi</strong>: miễn phí, không phụ thu.
                      </div>
                      <div style="font-size:11px; color:#78350f; display:flex; align-items:center; gap:6px;">
                          <i class="bi bi-dot" style="font-size:18px; line-height:1; color:#d97706;"></i>
                          Trẻ em <strong>từ 10–16 tuổi</strong>: phụ thu 10% giá phòng / đêm / trẻ em.
                      </div>
                      <div style="font-size:11px; color:#78350f; display:flex; align-items:center; gap:6px;">
                          <i class="bi bi-dot" style="font-size:18px; line-height:1; color:#d97706;"></i>
                          Người <strong>từ 16 tuổi trở lên</strong>: tính như người lớn đầy đủ.
                      </div>
                  </div>
              </div>
              <?php endif; ?>

              <!-- Số phòng đã chọn (cố định từ trang danh sách phòng) -->
              <?php if(!empty($preselected_room_no)): ?>
              <div style="margin-bottom:16px;">
                <div class="form-section-label" style="margin-top:0;">Số phòng đã chọn</div>
                <div style="display:flex;align-items:center;gap:10px;padding:12px 16px;background:var(--green-light);border:1.5px solid rgba(184,139,74,.25);border-radius:10px;">
                  <i class="bi bi-door-open" style="font-size:20px;color:var(--green);"></i>
                  <div>
                    <div style="font-size:18px;font-weight:700;color:var(--green-dark);"><?= htmlspecialchars($room_data['name']) ?> - P.<?= htmlspecialchars($preselected_room_no) ?></div>
                    <div style="font-size:12px;color:var(--muted);margin-top:2px;">Số phòng được chọn từ danh sách — <a href="rooms.php" style="color:var(--green);text-decoration:underline;">Đổi phòng khác</a></div>
                  </div>
                </div>
                <input type="hidden" name="room_no" value="<?= htmlspecialchars($preselected_room_no) ?>">
              </div>
              <?php endif; ?>

              <!-- Dùng điểm tích lũy -->
              <div id="loyalty-redeem-wrap" style="display:none;">
                <div class="loyalty-redeem-box">
                  <div class="lr-header">
                    <span style="font-size:22px;">🏅</span>
                    <div>
                      <div class="lr-title">Dùng điểm tích lũy để giảm giá</div>
                      <div class="lr-pts">Bạn đang có <strong id="lr-avail-pts" style="color:#f0c96b;">0</strong> điểm &nbsp;·&nbsp; 1 điểm = 1.000₫ giảm giá</div>
                    </div>
                  </div>
                  <div class="lr-slider-wrap">
                    <div style="display:flex;align-items:center;gap:10px;">
                      <input type="range" class="lr-slider" id="lr-slider" min="0" max="0" step="1" value="0" oninput="update_redeem(this.value)" style="flex:1;">
                      <input type="number" id="lr-input" min="0" max="0" step="1" value="0"
                        oninput="sync_slider(this.value)"
                        style="width:90px;padding:6px 10px;border:1.5px solid rgba(184,139,74,.5);border-radius:8px;
                               background:rgba(255,255,255,.08);color:#f0c96b;font-size:14px;font-weight:700;
                               text-align:center;outline:none;font-family:inherit;"
                        placeholder="0">
                    </div>
                  </div>
                  <div class="lr-result">
                    <span style="color:rgba(255,255,255,.7);">Dùng <strong id="lr-use-pts" style="color:#f0c96b;">0</strong> điểm</span>
                    <span class="lr-discount">Giảm <span id="lr-discount-amt">0</span> VND</span>
                  </div>
                  <div class="lr-zero" id="lr-zero-note" style="display:none;">Kéo thanh trượt để chọn số điểm muốn dùng</div>
                </div>
                <input type="hidden" name="use_points" id="use_points_input" value="0">
              </div>

              <!-- Dòng tổng tiền sau giảm (loyalty) -->
              <div id="ss-loyalty-row" style="display:none;margin-bottom:12px;padding:10px 14px;background:#edf7ee;border:1px solid #a8ddb3;border-radius:8px;display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:13px;color:#2d7a3a;font-weight:600;">🎁 Giảm từ điểm</span>
                <span style="font-size:15px;font-weight:700;color:#2d7a3a;" id="ss-loyalty-discount">- 0 VND</span>
              </div>
              <div id="ss-final-row" style="display:none;margin-bottom:14px;padding:12px 16px;background:#fff8e1;border:1.5px solid #f0c96b;border-radius:10px;display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:14px;font-weight:700;color:#78530a;">💳 Tổng thanh toán thực tế</span>
                <span style="font-size:18px;font-weight:800;color:#B88B4A;" id="ss-final-total">0 VND</span>
              </div>

              <!-- Submit -->
              <button name="pay_now" class="btn-pay" disabled>
                <i class="bi bi-credit-card"></i> Xác nhận & Thanh toán
              </button>

              <!-- Trust row -->
              <div class="trust-row">
                <span class="trust-item"><i class="bi bi-shield-check"></i> Thanh toán an toàn</span>
                <span class="trust-item"><i class="bi bi-arrow-counterclockwise"></i> Hủy trước 72h hoàn 100%</span>
                <span class="trust-item"><i class="bi bi-headset"></i> Hỗ trợ 24/7</span>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php require('inc/footer.php'); ?>

  <script>
  // ── Carousel ──
  let currentSlide = 0;
  const slides  = document.querySelectorAll('.carousel-slide');
  const thumbs  = document.querySelectorAll('.carousel-thumb');
  const counter = document.getElementById('slide-current');

  function goSlide(index) {
    slides[currentSlide].classList.remove('active');
    if(thumbs[currentSlide]) thumbs[currentSlide].classList.remove('active');

    currentSlide = (index + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if(thumbs[currentSlide]) {
      thumbs[currentSlide].classList.add('active');
      thumbs[currentSlide].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    }
    if(counter) counter.textContent = currentSlide + 1;
  }
  function changeSlide(dir) { goSlide(currentSlide + dir); }

  // ── Booking ──
  const booking_form  = document.getElementById('booking_form');
  const info_loader   = document.getElementById('info_loader');
  const pay_info      = document.getElementById('pay_info');
  const pay_info_text = document.getElementById('pay_info_text');
  const stay_summary  = document.getElementById('stay-summary');

  function showPayInfo(msg, isOk) {
    pay_info.style.display = 'flex';
    pay_info_text.textContent = msg;
    if(isOk) {
      pay_info.style.background = '#edf3fa';
      pay_info.style.borderColor = '#b3cef5';
      pay_info.style.color = '#B88B4A';
      pay_info.querySelector('i').className = 'bi bi-check-circle';
    } else {
      pay_info.style.background = '#fef2f2';
      pay_info.style.borderColor = '#fecaca';
      pay_info.style.color = '#dc2626';
      pay_info.querySelector('i').className = 'bi bi-exclamation-triangle';
    }
  }

  function check_availability() {
    let checkin_val  = booking_form.elements['checkin'].value;
    let checkout_val = booking_form.elements['checkout'].value;

    booking_form.elements['pay_now'].setAttribute('disabled', true);
    stay_summary.style.display = 'none';

    if(checkin_val !== '' && checkout_val !== '') {
      pay_info.style.display    = 'none';
      info_loader.style.display = 'block';

      let data = new FormData();
      data.append('check_availability', '');
      data.append('check_in',  checkin_val);
      data.append('check_out', checkout_val);
      data.append('room_no',   '<?= htmlspecialchars($preselected_room_no) ?>');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/confirm_booking.php", true);

      xhr.onload = function() {
        info_loader.style.display = 'none';
        let res = JSON.parse(this.responseText);

        const errorMsgs = {
          'check_in_out_equal': 'Không thể trả phòng vào cùng ngày nhận phòng!',
          'check_out_earlier':  'Ngày trả phòng phải sau ngày nhận phòng!',
          'check_in_earlier':   'Ngày nhận phòng không thể đặt ở quá khứ!',
          'unavailable':        'Rất tiếc! Phòng không còn trống trong thời gian này!',
          'cleaning':           'Rất tiếc! Phòng đang được dọn dẹp, vui lòng chọn phòng khác!',
          'session_expired':    'Phiên giao dịch hết hạn, vui lòng chọn lại phòng!',
          'shutdown':           'Hệ thống đang bảo trì, hiện không thể đặt phòng!',
        };

        if(errorMsgs[res.status]) {
          showPayInfo(errorMsgs[res.status], false);
          document.getElementById('loyalty-redeem-wrap').style.display = 'none';
          document.getElementById('ss-loyalty-row').style.display = 'none';
          document.getElementById('ss-final-row').style.display   = 'none';
        } else {
          // Success
          showPayInfo('Tuyệt vời! Phòng đang có sẵn trong thời gian này.', true);

          const roomPrice         = <?= $room_data['price'] ?>;
          const children          = <?= $room_data['children'] ?>;
          const days              = res.days;
          const baseTotal         = res.payment;
          const surchargePerNight = Math.round(roomPrice * 0.10);

          // Lưu vào biến toàn cục để updateSurcharge() dùng lại
          window._bookingDays      = days;
          window._bookingBase      = baseTotal;
          window._surchargePerNight = surchargePerNight;
          window._hasChildrenRoom  = children > 0;
          window._loyaltyPoints    = res.loyalty_points || 0;

          function fmtVND(n) { return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."); }
          window.fmtVND = fmtVND;

          document.getElementById('ss-nights').textContent = days + ' đêm';
          document.getElementById('ss-total').textContent  = fmtVND(baseTotal) + ' VND';

          stay_summary.style.display = 'block';

          // ── Loyalty redeem ──
          const loyPts = window._loyaltyPoints;
          const loyWrap = document.getElementById('loyalty-redeem-wrap');
          if (loyPts > 0) {
            document.getElementById('lr-avail-pts').textContent = loyPts.toLocaleString('vi-VN');
            const slider = document.getElementById('lr-slider');
            // Giới hạn điểm dùng tối đa = baseTotal/1000 (không giảm quá tổng tiền)
            const maxUse = Math.min(loyPts, Math.floor(baseTotal / 1000));
            slider.max   = maxUse;
            slider.value = 0;
            document.getElementById('lr-input').max   = maxUse;
            document.getElementById('lr-input').value = 0;
            document.getElementById('lr-use-pts').textContent     = '0';
            document.getElementById('lr-discount-amt').textContent = '0';
            document.getElementById('lr-zero-note').style.display  = maxUse > 0 ? 'block' : 'none';
            loyWrap.style.display = 'block';
            document.getElementById('use_points_input').value = 0;
            document.getElementById('ss-loyalty-row').style.display = 'none';
            document.getElementById('ss-final-row').style.display   = 'none';
          } else {
            loyWrap.style.display = 'none';
            document.getElementById('ss-loyalty-row').style.display = 'none';
            document.getElementById('ss-final-row').style.display   = 'none';
          }

          booking_form.elements['pay_now'].removeAttribute('disabled');
        }
      }

      xhr.onerror = function() {
        info_loader.style.display = 'none';
        showPayInfo('Lỗi kết nối máy chủ, vui lòng thử lại!', false);
      }

      xhr.send(data);
    }
  }
  // Cập nhật dropdown 2 khi dropdown 1 thay đổi
  function updateChildrenOlder() {
    const total = parseInt(document.getElementById('children-count').value) || 0;
    const wrap  = document.getElementById('children-older-wrap');
    const sel   = document.getElementById('children-older');

    if (total === 0) {
      wrap.style.display = 'none';
      sel.innerHTML = '<option value="0">0 — Tất cả dưới 10 tuổi (miễn phí)</option>';
      return;
    }

    wrap.style.display = 'block';
    sel.innerHTML = '<option value="0">0 — Tất cả dưới 10 tuổi (miễn phí)</option>';
    for (let i = 1; i <= total; i++) {
      const free = total - i;
      sel.innerHTML += `<option value="${i}">${i} trẻ 10–16 tuổi (+10%/đêm/trẻ) · ${free} trẻ dưới 10 tuổi (miễn phí)</option>`;
    }
  }

  // Cập nhật bảng giá khi thay đổi số trẻ em
  function updateSurcharge() {
    if (!window._bookingDays) return; // chưa chọn ngày
    const selOlder     = document.getElementById('children-older');
    const numChildren  = selOlder ? parseInt(selOlder.value) : 0;
    const surchargeTotal = Math.round(window._surchargePerNight * window._bookingDays * numChildren);
    const grandTotal     = window._bookingBase + surchargeTotal;
    const surRow         = document.getElementById('surcharge-row');

    if (numChildren > 0) {
      if (surRow) {
        surRow.style.display = '';
        document.getElementById('ss-surcharge').textContent =
          '+ ' + window.fmtVND(surchargeTotal) + ' VND (' + numChildren + ' trẻ em × ' + window._bookingDays + ' đêm)';
      }
      document.getElementById('ss-total').textContent = window.fmtVND(grandTotal) + ' VND';
    } else {
      if (surRow) surRow.style.display = 'none';
      document.getElementById('ss-total').textContent = window.fmtVND(window._bookingBase) + ' VND';
    }
  }

  // Tự động kiểm tra ngày nếu đã có sẵn từ URL
  document.addEventListener('DOMContentLoaded', function() {
    var ci = booking_form.elements['checkin'].value;
    var co = booking_form.elements['checkout'].value;
    if (ci && co) check_availability();
  });

  // ── Cập nhật điểm muốn dùng ──────────────────────────────
  function sync_slider(val) {
    const slider = document.getElementById('lr-slider');
    const max = parseInt(slider.max) || 0;
    val = Math.max(0, Math.min(parseInt(val) || 0, max));
    slider.value = val;
    document.getElementById('lr-input').value = val;
    update_redeem(val);
  }

  function update_redeem(val) {
    val = parseInt(val) || 0;
    const slider = document.getElementById('lr-input');
    if (slider && parseInt(slider.value) !== val) slider.value = val; // đồng bộ ô nhập
    const discount = val * 1000; // 1 điểm = 1.000đ

    document.getElementById('lr-use-pts').textContent      = val.toLocaleString('vi-VN');
    document.getElementById('lr-discount-amt').textContent = discount.toLocaleString('vi-VN');
    document.getElementById('use_points_input').value       = val;
    document.getElementById('lr-zero-note').style.display   = 'none';

    // Tính lại tổng
    const surRow    = document.getElementById('surcharge-row');
    const surchargeVisible = surRow && surRow.style.display !== 'none';
    const selOlder  = document.getElementById('children-older');
    const numChild  = selOlder ? parseInt(selOlder.value) : 0;
    const surchAmt  = surchargeVisible && window._surchargePerNight
                      ? Math.round(window._surchargePerNight * window._bookingDays * numChild) : 0;
    const baseBeforeDiscount = (window._bookingBase || 0) + surchAmt;
    const finalTotal = Math.max(0, baseBeforeDiscount - discount);

    const loyRow   = document.getElementById('ss-loyalty-row');
    const finalRow = document.getElementById('ss-final-row');
    const loyInSum = document.getElementById('ss-loyrow');

    if (val > 0) {
      if (loyRow)   { loyRow.style.display   = 'flex'; document.getElementById('ss-loyalty-discount').textContent = '- ' + discount.toLocaleString('vi-VN') + ' VND'; }
      if (finalRow) { finalRow.style.display = 'flex'; document.getElementById('ss-final-total').textContent     = finalTotal.toLocaleString('vi-VN') + ' VND'; }
      if (loyInSum) { loyInSum.style.display = ''; document.getElementById('ss-loy-val').textContent = '- ' + discount.toLocaleString('vi-VN') + ' VND'; }
    } else {
      if (loyRow)   loyRow.style.display   = 'none';
      if (finalRow) finalRow.style.display = 'none';
      if (loyInSum) loyInSum.style.display = 'none';
    }
  }
  </script>

</body>
</html>