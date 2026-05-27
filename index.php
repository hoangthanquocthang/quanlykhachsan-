<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - Trang chủ</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
    :root {
        --ink: #1a1208;
        --gold: #B88B4A;
        --gold-light: #d4aa6a;
        --cream: #faf8f4;
        --white: #ffffff;
        --border: rgba(184,139,74,0.15);
    }

    .home-page {
        background-color: var(--cream);
        color: var(--ink);
        font-family: 'DM Sans', sans-serif;
    }

    .home-container {
    width: min(1400px, calc(100% - 40px));
    margin: 0 auto;
}

    .section-title {
        text-align: center;
        margin: 60px 0 30px;
        font-size: 32px;
        font-weight: 700;
        color: var(--ink);
        font-family: 'Cormorant Garamond', serif;
        letter-spacing: 1px;
    }

    .hero-slider-section {
        max-width: 1400px;
        margin: 20px auto 0;
        padding: 0 20px;
        position: relative;
    }

    .hero-slider-section::after {
        content: '';
        position: absolute;
        bottom: 0; left: 20px; right: 20px;
        height: 180px;
        background: linear-gradient(to top, rgba(26,18,8,0.55), transparent);
        border-radius: 0 0 14px 14px;
        pointer-events: none;
        z-index: 2;
    }

    .hero-slide-img {
        display: block;
        width: 100%;
        height: clamp(280px, 42vw, 560px);
        object-fit: cover;
        border-radius: 14px;
    }

    .availability-form {
        margin-top: -60px;
        position: relative;
        z-index: 10;
    }

    .booking-panel {
        background: linear-gradient(135deg, #1a1208 0%, #2d2010 100%);
        padding: 28px 32px;
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.30);
        border: 1px solid rgba(184,139,74,0.25);
    }

    .booking-title {
        margin: 0 0 22px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 3.5px;
        text-transform: uppercase;
        color: var(--gold);
        font-family: 'DM Sans', sans-serif;
    }

    .booking-grid {
        display: grid;
        grid-template-columns: 2fr 2fr 2fr 2fr 1.5fr;
        gap: 15px;
        align-items: end;
    }

    .field-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 10px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.55);
        font-family: 'DM Sans', sans-serif;
    }
    .booking-field select.custom-input {
        height: 60px;
        border: 1.5px solid rgba(184,139,74,0.4);
        border-radius: 10px;
        padding: 0 16px;
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        background: rgba(255,255,255,0.07);
        cursor: pointer;
        appearance: auto;
        box-sizing: border-box;
        font-family: 'DM Sans', sans-serif;
    }
    .booking-field select.custom-input option {
        background: #1a1208;
        color: #fff;
    }
    .booking-field select.custom-input:focus {
        border-color: var(--gold);
        box-shadow: 0 4px 14px rgba(184,139,74,0.22);
        outline: none;
    }
    .booking-field .date-card-widget {
        height: 60px;
        box-sizing: border-box;
        padding: 0 16px;
        display: flex;
        align-items: center;
    }


    /* ===== DATE CARD WIDGET ===== */
    .date-card-widget {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255,255,255,0.07);
        border: 1.5px solid rgba(184,139,74,0.4);
        border-radius: 10px;
        padding: 10px 16px;
        cursor: pointer;
        min-width: 130px;
        transition: box-shadow 0.2s, border-color 0.2s;
        user-select: none;
    }
    .date-card-widget:hover {
        border-color: var(--gold);
        box-shadow: 0 4px 16px rgba(184,139,74,0.20);
        background: rgba(184,139,74,0.08);
    }
    .dcw-day {
        font-size: 36px;
        font-weight: 800;
        color: var(--gold-light);
        line-height: 1;
        min-width: 44px;
        text-align: center;
        font-family: 'Cormorant Garamond', serif;
    }
    .dcw-divider {
        width: 1.5px;
        height: 40px;
        background: rgba(184,139,74,0.35);
        border-radius: 2px;
        flex-shrink: 0;
    }
    .dcw-right {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .dcw-month {
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .dcw-weekday {
        font-size: 11px;
        font-weight: 600;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .date-picker-hidden {
        position: absolute;
        opacity: 0;
        pointer-events: none;
        width: 0;
        height: 0;
    }

    .facility-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        max-width: 900px;
        margin: 0 auto;
    }

    .facility-card {
        background: var(--white);
        padding: 24px 20px;
        border-radius: 12px;
        border: 1px solid var(--border);
        box-shadow: 0 4px 18px rgba(184,139,74,0.07);
        text-align: center;
        width: calc(25% - 16px);
        min-width: 160px;
        transition: 0.3s;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
        border-color: var(--gold);
    }

    .facility-card img {
        width: 56px;
        height: 56px;
        object-fit: contain;
    }

    .facility-card h5 {
        margin: 12px 0 0;
        font-size: 15px;
        font-weight: 600;
        color: #1a1208;
    }

    .review-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .profile-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .profile-row img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-row h6 {
        margin: 0;
        font-size: 16px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .contact-panel {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .contact-panel iframe {
        width: 100%;
        height: 350px;
        border: none;
        border-radius: 8px;
    }

    .contact-info-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .contact-link, .social-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #212529;
        text-decoration: none;
        margin-bottom: 12px;
        font-weight: 500;
    }

    .more-link-wrap {
        text-align: center;
        margin-top: 35px;
    }

    @media screen and (max-width: 991px) {
        .booking-grid { grid-template-columns: 1fr 1fr; }
        .booking-submit { grid-column: span 2; }
        .contact-grid { grid-template-columns: 1fr; }
    }

    @media screen and (max-width: 575px) {
        .booking-grid { grid-template-columns: 1fr; }
        .booking-submit { grid-column: span 1; }
        .hero-slider-section { padding: 0 10px; }
        .availability-form { margin-top: 20px; }
    }

    /* BỘ CỤC DANH SÁCH TẦNG */
    .floor-layout{
        display:flex;
        align-items:flex-start;
        gap:24px; /* Giảm gap một chút */
        width:100%;
        margin-top:30px;
        position:relative;
    }
    .floor-sidebar {
    width: 250px;
    min-width: 250px;
    position: sticky;
    top: 90px; 
    align-self: flex-start; 
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }
    .floor-menu{
        background:#fff;
        border-radius:16px;
        overflow:hidden;
        border:1px solid #e9e9e9;
        box-shadow:0 6px 22px rgba(0,0,0,.05);
    }

    .floor-menu-title {
        background: #B88B4A;
        color: #fff;
        padding: 20px;
        font-size: 20px;
        font-weight: 700;
    }

    .floor-btn{
        width:100%;
        border:none;
        background:#fff;
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:20px;
        cursor:pointer;
        font-size:16px;
        font-weight:600;
        color:#222;
        border-bottom:1px solid #ececec;
        transition:.25s;
        position:relative;
        overflow:hidden;
    }

    .floor-btn::before {
        content:'';
        position:absolute;
        left:0;
        top:0;
        width:4px;
        height:100%;
        background:#B88B4A;
        transform:scaleY(0);
        transition:.25s;
    }

    .floor-btn:last-child{ border-bottom:none; }
    .floor-btn:hover{ background:#fdf8f0; }

    .floor-btn.active {
        background: #fdf6e9;
        color: #B88B4A;
    }
    .floor-btn.active::before {
        transform:scaleY(1);
    }

    .floor-content{ width:100%; }
    .floor-panel{ display:none; }
    .floor-panel.active{ display:block; }

    /* LƯỚI PHÒNG - 4 CỘT CHUẨN */
    .floor-room-grid{
        display:grid;
        grid-template-columns:repeat(3,minmax(260px,1fr));
        gap:20px;
        width:100%;
    }

    /* THẺ PHÒNG - ĐÃ ÉP NHỎ TỐI ĐA */
    .floor-room-card{
        width:100%;
        background:#fff;
        border-radius:14px;
        overflow:hidden;
        border:1px solid var(--border);
        box-shadow:0 4px 18px rgba(184,139,74,0.06);
        transition:.3s;
        display: flex;
        flex-direction: column;
    }

    .floor-room-card:hover{
        transform:translateY(-5px);
        box-shadow:0 14px 32px rgba(184,139,74,0.14);
        border-color:var(--gold);
    }

    .floor-room-img{
        width:100%;
        height:200px;
        object-fit:cover;
        display:block;
        transition:.4s;
    }

    .floor-room-card:hover .floor-room-img { transform:scale(1.03); }

    .floor-room-body{
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .floor-room-name{
        font-size:16px; /* Nhỏ lại 1 chút */
        font-weight:700;
        color:#B88B4A;
        margin-bottom:6px;
        line-height:1.4;
    }

    /* GIÁ TIỀN */
    .floor-room-meta{
        font-size: 14px;
        color: #222;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .floor-room-status{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:4px 10px;
        border-radius:30px;
        font-size:11px;
        font-weight:700;
        margin-bottom:10px;
        width: fit-content;
    }

    .fs-avail{ background:#fdf6e9; color:#7a5c2e; }
    .fs-booked{ background:#fde8e8; color:#c0392b; }
    .fs-maintain{ background:#fff3d9; color:#996500; }
    .fs-cleaning{ background:#fff3d9; color:#7a5c2e; }
    .fs-occupied{ background:#fde8e8; color:#c0392b; }
    .fs-reserved{ background:#fff3d9; color:#996500; }

    /* TỐI ƯU CÁC KHỐI THÔNG TIN (Không gian, Tiện ích...) */
    .room-block { margin-bottom: 10px; }
    .room-block-title {
        margin: 0 0 5px;
        font-size: 12px;
        font-weight: 700;
        color: #555;
        text-transform: uppercase; 
    }

    .room-tag {
        display: inline-block;
        margin: 0 4px 4px 0;
        padding: 4px 10px;
        border-radius: 12px;
        background: #f1f5f9;
        color: #333;
        font-size: 12px;
        border: 1px solid #e2e8f0;
    }

    /* NÚT BẤM DƯỚI CÙNG */
    .floor-room-actions{
        display:flex;
        gap:8px;
        margin-top: auto; 
        padding-top: 5px;
    }

    .btn-dat-ngay {
        flex: 1;
        background: linear-gradient(135deg, var(--gold) 0%, #9a7035 100%);
        color: #fff !important;
        border: none;
        border-radius: 8px;
        padding: 8px;
        font-size: 11px;
        font-weight: 700;
        text-align: center;
        transition: .25s;
        text-decoration: none;
        cursor: pointer;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-family: 'DM Sans', sans-serif;
        box-shadow: 0 4px 16px rgba(184,139,74,0.35);
    }

    .btn-dat-ngay:hover {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
        box-shadow: 0 6px 22px rgba(184,139,74,0.50);
        transform: translateY(-1px);
    }

    .btn-outline{
        flex:1;
        background:#fff;
        border:1px solid #bfc5cc;
        color:#222;
        border-radius:6px;
        padding:8px;
        font-size:12px;
        font-weight:700;
        text-align:center;
        transition:.25s;
        text-decoration:none;
        cursor: pointer;
    }

    .btn-outline:hover{ background:#111; color:#fff; border-color:#111; }

    /* RESPONSIVE */
    @media(max-width: 1500px) {
        .floor-sidebar { width: 100%; margin-left: 0; }
        .floor-content { margin-left: 0; }
        .floor-layout { flex-direction: column; }
        .floor-room-grid { grid-template-columns: repeat(3, minmax(220px, 1fr)); }
    }
    @media(max-width: 1200px) { .floor-room-grid { grid-template-columns: repeat(2, minmax(220px, 1fr)); } }
    @media(max-width: 991px) { .floor-room-grid{ grid-template-columns:repeat(2,minmax(220px,1fr)); } }
    @media(max-width: 575px) {
        .floor-room-grid{ grid-template-columns:1fr; }
        .floor-room-img{ height:220px; }
    }
    </style>
</head>

<body class="home-page">

    <?php require('inc/header.php'); ?>

    <div class="hero-slider-section">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php 
          $res = selectAll('carousel');
          while($row = mysqli_fetch_assoc($res))
          {
            $path = CAROUSEL_IMG_PATH;
            echo <<<data
              <div class="swiper-slide">
                <img src="$path$row[image]" class="hero-slide-img">
              </div>
            data;
          }
        ?>
            </div>
        </div>
    </div>

    <div class="home-container availability-form">
        <div class="booking-panel">
            <h5 class="booking-title">Tiến hành đặt phòng</h5>
            <form action="rooms.php">
                <div class="booking-grid">
                    <!-- WIDGET NHẬN PHÒNG -->
                    <div class="booking-field">
                        <label class="field-label">Nhận phòng</label>
                        <input type="hidden" name="checkin" id="checkin-val" required>
                        <div class="date-card-widget" id="checkin-widget" onclick="openDatePicker('checkin')">
                            <div class="dcw-day" id="checkin-day">--</div>
                            <div class="dcw-divider"></div>
                            <div class="dcw-right">
                                <div class="dcw-month" id="checkin-month">---</div>
                                <div class="dcw-weekday" id="checkin-weekday">---</div>
                            </div>
                        </div>
                        <input type="date" id="checkin-picker" class="date-picker-hidden" onchange="onDateChange('checkin')" min="">
                    </div>
                    <!-- WIDGET TRẢ PHÒNG -->
                    <div class="booking-field">
                        <label class="field-label">Trả phòng</label>
                        <input type="hidden" name="checkout" id="checkout-val" required>
                        <div class="date-card-widget" id="checkout-widget" onclick="openDatePicker('checkout')">
                            <div class="dcw-day" id="checkout-day">--</div>
                            <div class="dcw-divider"></div>
                            <div class="dcw-right">
                                <div class="dcw-month" id="checkout-month">---</div>
                                <div class="dcw-weekday" id="checkout-weekday">---</div>
                            </div>
                        </div>
                        <input type="date" id="checkout-picker" class="date-picker-hidden" onchange="onDateChange('checkout')" min="">
                    </div>
                    <div class="booking-field">
                        <label class="field-label">Người lớn</label>
                        <select class="custom-input" name="adult">
                            <?php 
                  $guests_q = mysqli_query($con,"SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` FROM `rooms` WHERE `status`='1' AND `removed`='0'");  
                  $guests_res = mysqli_fetch_assoc($guests_q);
                  for($i=1; $i<=$guests_res['max_adult']; $i++){
                    echo"<option value='$i'>$i</option>";
                  }
                ?>
                        </select>
                    </div>
                    <div class="booking-field">
                        <label class="field-label">
                            Trẻ em
                            <span style="position:relative; display:inline-block;">
                                <i class="bi bi-info-circle-fill" style="color:#d97706; cursor:pointer; font-size:13px; vertical-align:middle;"
                                   onmouseenter="document.getElementById('children-policy-tip').style.display='block'"
                                   onmouseleave="document.getElementById('children-policy-tip').style.display='none'"></i>
                                <div id="children-policy-tip" style="display:none; position:absolute; bottom:calc(100% + 8px); left:50%; transform:translateX(-50%);
                                    background:#fffbeb; border:1px solid #fde68a; border-radius:8px; padding:10px 14px;
                                    font-size:12px; color:#78350f; white-space:nowrap; z-index:999;
                                    box-shadow:0 4px 12px rgba(0,0,0,0.1); font-weight:400; line-height:1.8;">
                                    <div style="font-weight:700; margin-bottom:4px;">
                                        <i class="bi bi-info-circle-fill" style="color:#d97706;"></i> Chính sách trẻ em
                                    </div>
                                    <div>• Dưới 10 tuổi: <strong>miễn phí</strong></div>
                                    <div>• Từ 10–16 tuổi: <strong>+7% giá phòng / đêm / trẻ</strong></div>
                                    <div>• Trên 16 tuổi: tính như <strong>người lớn</strong></div>
                                    <div style="position:absolute; bottom:-6px; left:50%; transform:translateX(-50%);
                                        width:10px; height:10px; background:#fffbeb; border-right:1px solid #fde68a;
                                        border-bottom:1px solid #fde68a; transform:translateX(-50%) rotate(45deg);"></div>
                                </div>
                            </span>
                        </label>
                        <select class="custom-input" name="children">
                            <?php 
                  echo"<option value='0'>0</option>";
                  for($i=1; $i<=$guests_res['max_children']; $i++){
                    echo"<option value='$i'>$i</option>";
                  }
                ?>
                        </select>
                    </div>
                    <input type="hidden" name="check_availability">
                    <div class="booking-submit">
                        <button type="submit" class="btn-dat-ngay" style="width: 100%; padding: 11px; font-size: 15px; border-radius: 6px;">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- WIDGET THỐNG KÊ KHÁCH SẠN REALTIME -->
    <div class="home-container" style="margin-top: 28px; margin-bottom: 0;">
        <div id="hotel-stats-bar" style="
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0;
            background: linear-gradient(135deg, #1a1208 0%, #2d2010 100%);
            border-radius: 14px;
            padding: 20px 0;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            border: 1px solid rgba(184,139,74,0.22);
        ">
            <div style="text-align:center; border-right: 1px solid rgba(184,139,74,0.2); padding: 0 16px;">
                <div style="font-size:10px; color:rgba(255,255,255,0.45); font-weight:600; text-transform:uppercase; letter-spacing:2px; margin-bottom:8px; font-family:'DM Sans',sans-serif;">
                    <i class="bi bi-people-fill" style="color:#B88B4A;"></i> Khách đang ở
                </div>
                <div id="stat-guests" style="font-size:36px; font-weight:700; color:#d4aa6a; line-height:1; font-family:'Cormorant Garamond',serif;">—</div>
                <div style="font-size:11px; color:rgba(255,255,255,0.3); margin-top:6px; letter-spacing:1px; text-transform:uppercase;">người</div>
            </div>
            <div style="text-align:center; border-right: 1px solid rgba(184,139,74,0.2); padding: 0 16px;">
                <div style="font-size:10px; color:rgba(255,255,255,0.45); font-weight:600; text-transform:uppercase; letter-spacing:2px; margin-bottom:8px; font-family:'DM Sans',sans-serif;">
                    <i class="bi bi-door-open-fill" style="color:#4ade80;"></i> Phòng trống
                </div>
                <div id="stat-avail" style="font-size:36px; font-weight:700; color:#4ade80; line-height:1; font-family:'Cormorant Garamond',serif;">—</div>
                <div style="font-size:11px; color:rgba(255,255,255,0.3); margin-top:6px; letter-spacing:1px; text-transform:uppercase;">phòng</div>
            </div>
            <div style="text-align:center; border-right: 1px solid rgba(184,139,74,0.2); padding: 0 16px;">
                <div style="font-size:10px; color:rgba(255,255,255,0.45); font-weight:600; text-transform:uppercase; letter-spacing:2px; margin-bottom:8px; font-family:'DM Sans',sans-serif;">
                    <i class="bi bi-door-closed-fill" style="color:#f87171;"></i> Đang có khách
                </div>
                <div id="stat-occupied" style="font-size:36px; font-weight:700; color:#f87171; line-height:1; font-family:'Cormorant Garamond',serif;">—</div>
                <div style="font-size:11px; color:rgba(255,255,255,0.3); margin-top:6px; letter-spacing:1px; text-transform:uppercase;">phòng</div>
            </div>
            <div style="text-align:center; border-right: 1px solid rgba(184,139,74,0.2); padding: 0 16px;">
                <div style="font-size:10px; color:rgba(255,255,255,0.45); font-weight:600; text-transform:uppercase; letter-spacing:2px; margin-bottom:8px; font-family:'DM Sans',sans-serif;">
                    <i class="bi bi-stars" style="color:#fb923c;"></i> Đang dọn dẹp
                </div>
                <div id="stat-cleaning" style="font-size:36px; font-weight:700; color:#fb923c; line-height:1; font-family:'Cormorant Garamond',serif;">—</div>
                <div style="font-size:11px; color:rgba(255,255,255,0.3); margin-top:6px; letter-spacing:1px; text-transform:uppercase;">phòng</div>
            </div>
            <div style="text-align:center; padding: 0 16px;">
                <div style="font-size:10px; color:rgba(255,255,255,0.45); font-weight:600; text-transform:uppercase; letter-spacing:2px; margin-bottom:8px; font-family:'DM Sans',sans-serif;">
                    <i class="bi bi-building" style="color:#B88B4A;"></i> Tổng phòng
                </div>
                <div id="stat-total" style="font-size:36px; font-weight:700; color:#d4aa6a; line-height:1; font-family:'Cormorant Garamond',serif;">—</div>
                <div style="font-size:11px; color:rgba(255,255,255,0.3); margin-top:6px; letter-spacing:1px; text-transform:uppercase;">phòng</div>
            </div>
        </div>
        <style>
        @media(max-width:600px){
            #hotel-stats-bar { grid-template-columns: repeat(2,1fr); }
            #hotel-stats-bar > div { border-right:none !important; border-bottom: 1px solid rgba(184,139,74,0.15); padding-bottom:16px; }
        }
        </style>
    </div>


        <div id="floor-section"></div>
    <h2 class="section-title">Danh sách phòng theo tầng</h2>
    <div class="home-container">
        <?php
        $floors_data = [];

        // Lấy tất cả số phòng kết hợp với thông tin loại phòng
        $all_q = mysqli_query($con,
            "SELECT rn.*, r.name, r.area, r.price, r.quantity, r.adult, r.children, 
                    r.description, r.status, r.removed, r.id as room_type_id
            FROM `room_numbers` rn
            INNER JOIN `rooms` r ON rn.room_id = r.id
            WHERE r.removed='0' AND r.status='1'
            ORDER BY rn.room_no ASC");

        while($r = mysqli_fetch_assoc($all_q)){
            // Tính tầng từ số phòng
            $room_no = (int)$r['room_no'];
            $fn = (int)($room_no / 100);
            if($fn < 1) $fn = 1;

            // Dùng room_type_id để lấy ảnh và tiện ích
            $r['id'] = $r['room_type_id'];
            $floors_data[$fn][] = $r;
        }

        ksort($floors_data);
        $login_status = (isset($_SESSION['login']) && $_SESSION['login']==true) ? 1 : 0;
        ?>

        <div class="floor-layout">
            <div class="floor-sidebar">
                <div class="floor-menu">
                    <div class="floor-menu-title">Danh sách tầng</div>
                    <?php
                    $first = true;
                    foreach($floors_data as $fnum => $rooms){
                    ?>
                    <button class="floor-btn <?php if($first) echo 'active'; ?>"
                        onclick="showFloor(<?php echo $fnum; ?>,this);history.replaceState(null,'','#floor-<?php echo $fnum; ?>')">
                        <span>Tầng <?php echo $fnum; ?></span>
                        <span style="font-size: 13px; font-weight: 500;"><?php echo count($rooms); ?> phòng</span>
                    </button>
                    <?php
                    $first = false;
                    }
                    ?>
                </div>
            </div>

            <div class="floor-content">
                <?php
                $first_panel = true;
                foreach($floors_data as $fnum => $rooms){
                ?>

                <div class="floor-panel <?php if($first_panel) echo 'active'; ?>" id="floor-panel-<?php echo $fnum; ?>">
                    <div class="floor-room-grid">

                        <?php
                        foreach($rooms as $room){
                            // LẤY ẢNH PHÒNG
                            $room_thumb_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room[id]' AND `thumb`='1'");
                            $room_thumb = mysqli_fetch_assoc($room_thumb_q);
                            if($room_thumb){
                                $room_img = ROOMS_IMG_PATH.$room_thumb['image'];
                            }else{
                                $room_img = 'images/no-image.png';
                            }

                            // TRẠNG THÁI PHÒNG - kiểm tra trạng thái vật lý + đặt phòng thực tế
                            $rn_status_q = mysqli_query($con, "SELECT status FROM room_numbers WHERE room_no='$room[room_no]' LIMIT 1");
                            $rn_status_row = mysqli_fetch_assoc($rn_status_q);
                            $rn_status = $rn_status_row ? $rn_status_row['status'] : 1;

                            if($rn_status == 2){
                                $status_class = 'fs-cleaning';
                                $status_label = 'Đang dọn phòng';
                            } else {
                                // Kiểm tra có khách đang ở / đặt trước không
                                $bq2 = "SELECT bo.check_in, bo.check_out, bo.arrival FROM booking_order bo
                                        JOIN booking_details bd ON bo.booking_id = bd.booking_id
                                        WHERE bo.booking_status = 'booked'
                                          AND bo.room_id = '$room[id]'
                                          AND bd.room_no = '$room[room_no]'
                                          AND bo.check_out > CURDATE()
                                        ORDER BY bo.check_in ASC LIMIT 1";
                                $bres2 = mysqli_fetch_assoc(mysqli_query($con, $bq2));
                                if($bres2){
                                    $ci2 = date('d/m/Y', strtotime($bres2['check_in']));
                                    $co2 = date('d/m/Y', strtotime($bres2['check_out']));
                                    if($bres2['arrival'] == 1){
                                        $status_class = 'fs-occupied';
                                        $status_label = "Đang có khách: {$ci2} → {$co2}";
                                    } else {
                                        $status_class = 'fs-reserved';
                                        $status_label = "Đã đặt trước: {$ci2} → {$co2}";
                                    }
                                } elseif($room['status'] == '1'){
                                    $status_class = 'fs-avail';
                                    $status_label = 'Còn trống';
                                } else {
                                    $status_class = 'fs-maintain';
                                    $status_label = 'Bảo dưỡng';
                                }
                            }

                            // NÚT ĐẶT PHÒNG
                            if($settings_r['shutdown']){
                                $book_btn="<button class='btn-dat-ngay' disabled style='background:#888; cursor:not-allowed;'>Bảo trì</button>";
                            } elseif($rn_status == 2){
                                $book_btn="<button class='btn-dat-ngay' disabled style='background:#94a3b8; cursor:not-allowed;'>Đang dọn</button>";
                            } else{
                                $book_btn="<button onclick='checkLoginToBook2($login_status,$room[id],\"{$room['room_no']}\")' class='btn-dat-ngay'>Đặt ngay</button>";
                            }

                            $price = number_format($room['price'],0,',','.');

                            // LẤY TIỆN ÍCH
                            $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room[id]'");
                            $facilities_data = "";
                            while($fac_row = mysqli_fetch_assoc($fac_q)){
                                $facilities_data .="<span class='room-tag'>$fac_row[name]</span>";
                            }

                            // LẤY KHÔNG GIAN
                            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room[id]'");
                            $features_data = "";
                            while($fea_row = mysqli_fetch_assoc($fea_q)){
                                $features_data .="<span class='room-tag'>$fea_row[name]</span>";
                            }
                        ?>

                        <div class="floor-room-card">
                            <div style="overflow: hidden;">
                                <img src="<?php echo $room_img; ?>" class="floor-room-img">
                            </div>

                            <div class="floor-room-body">
                                <div class="floor-room-name">
                                    <?php echo $room['name'] . ' - P.' . $room['room_no']; ?>
                                </div>
                                
                                <div class="floor-room-meta">
                                    <?php echo $price; ?> VND / đêm
                                </div>

                                <span class="floor-room-status <?php echo $status_class; ?>">
                                    <?php echo $status_label; ?>
                                </span>

                                <div style="display: flex; gap: 15px; margin-bottom: 8px;">
                                    <div class="room-block" style="margin-bottom: 0;">
                                        <h6 class="room-block-title">Diện tích</h6>
                                        <span class='room-tag'><?php echo $room['area']; ?> m²</span>
                                    </div>
                                    <div class="room-block" style="margin-bottom: 0;">
                                        <h6 class="room-block-title">Khách</h6>
                                        <span class='room-tag'><?php echo $room['adult']; ?> Người lớn</span>
                                        <span class='room-tag'><?php echo $room['children']; ?> Trẻ em</span>
                                    </div>
                                </div>
                                <div style="margin-bottom:8px;background:#fffbeb;border:1px solid #fde68a;border-radius:6px;
                                    padding:8px 10px;font-size:11px;color:#78350f;line-height:1.8;">
                                    <div style="font-weight:700;margin-bottom:2px;">
                                        <i class="bi bi-info-circle-fill" style="color:#d97706;"></i> Chính sách trẻ em
                                    </div>
                                    <div>• Dưới 10 tuổi: <strong>miễn phí</strong></div>
                                    <div>• Từ 10–16 tuổi: <strong>+7% giá phòng/đêm/trẻ</strong></div>
                                    <div>• Trên 16 tuổi: tính như <strong>người lớn</strong></div>
                                </div>

                                <div class="room-block">
                                    <h6 class="room-block-title">Không gian</h6>
                                    <div class="tags">
                                        <?php echo $features_data ?: '<span class="room-tag" style="color:#aaa;">Chưa cập nhật</span>'; ?>
                                    </div>
                                </div>

                                <div class="room-block" style="margin-bottom: 12px;">
                                    <h6 class="room-block-title">Tiện ích</h6>
                                    <div class="tags">
                                        <?php echo $facilities_data ?: '<span class="room-tag" style="color:#aaa;">Chưa cập nhật</span>'; ?>
                                    </div>
                                </div>

                                <div class="floor-room-actions">
                                    <?php echo $book_btn; ?>
                                    <a href="room_details.php?id=<?php echo $room['id']; ?>&room_no=<?php echo $room['room_no']; ?>" class="btn-outline">
                                        Chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>

                <?php
                $first_panel = false;
                }
                ?>
            </div>

        </div>
    </div>

    <h2 class="section-title">Các tiện ích</h2>
    <div class="home-container">
        <div class="facility-grid">
            <?php 
        $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` ASC");
        $path = FACILITIES_IMG_PATH;
        while($row = mysqli_fetch_assoc($res)){
          echo<<<data
            <div class="facility-card">
              <img src="$path$row[icon]">
              <h5>$row[name]</h5>
            </div>
          data;
        }
      ?>
        </div>
        <div class="more-link-wrap">
            <a href="facilities.php" class="btn-outline">Tìm hiểu thêm >>></a>
        </div>
    </div>

    <h2 class="section-title">Đánh giá dịch vụ</h2>
    <div class="home-container testimonial-section">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper" style="margin-bottom: 40px;">
                <?php
          $review_q = "SELECT rr.*,uc.name AS uname, uc.profile, r.name AS rname FROM `rating_review` rr INNER JOIN `user_cred` uc ON rr.user_id = uc.id INNER JOIN `rooms` r ON rr.room_id = r.id ORDER BY `sr_no` DESC LIMIT 6";
          $review_res = mysqli_query($con,$review_q);
          $img_path = USERS_IMG_PATH;

          if(mysqli_num_rows($review_res)==0){
            echo '<p style="text-align:center;">Chưa có đánh giá nào!</p>';
          } else {
            while($row = mysqli_fetch_assoc($review_res)) {
              $stars = "";
              for($i=0; $i<$row['rating']; $i++){
                $stars .= "<i class='bi bi-star-fill star-icon'></i> ";
              }
              echo<<<slides
                <div class="swiper-slide review-card">
                  <div class="profile-row">
                    <img src="$img_path$row[profile]" loading="lazy">
                    <h6>$row[uname]</h6>
                  </div>
                  <p style="color:#555; font-size: 15px; line-height: 1.5;">$row[review]</p>
                  <div class="rating">$stars</div>
                </div>
              slides;
            }
          }
        ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <h2 class="section-title">Liên hệ</h2>
    <div class="home-container" style="margin-bottom: 60px;">
        <div class="contact-grid">
            <div class="contact-panel">
                <iframe src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
            </div>
            <div>
                <div class="contact-info-card">
                    <h5 style="margin-top:0;">Tổng đài viên</h5>
                    <a href="tel:+<?php echo $contact_r['pn1'] ?>" class="contact-link">
                        <i class="bi bi-telephone-fill" style="color:#27724b;"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                </div>
                <div class="contact-info-card">
                    <h5 style="margin-top:0;">Theo dõi chúng tôi</h5>
                    <?php 
            if($contact_r['tw']!=''){
              echo<<<data
                <a href="$contact_r[tw]" class="room-tag" style="text-decoration:none;"><i class="bi bi-twitter" style="color:#1da1f2;"></i> Twitter</a><br>
              data;
            }
          ?>
                    <a href="<?php echo $contact_r['fb'] ?>" class="room-tag" style="text-decoration:none;"><i class="bi bi-facebook" style="color:#1877f2;"></i> Facebook</a><br>
                    <a href="<?php echo $contact_r['insta'] ?>" class="room-tag" style="text-decoration:none;"><i class="bi bi-instagram" style="color:#e1306c;"></i> Instagram</a>
                </div>
                <div class="contact-info-card" style="text-align: center;">
                    <a href="about.php" class="btn-outline" style="width: 100%;">Tìm hiểu thêm về chúng tôi</a>
                </div>
            </div>
        </div>
    </div>

    <div id="recoveryModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="modal-header-custom">
                <h3><i class="bi bi-shield-lock"></i> Tạo mật khẩu mới</h3>
                <span class="close-modal" onclick="closeModal('recoveryModal')">&times;</span>
            </div>
            <form id="recovery-form">
                <div class="form-group">
                    <label class="form-label">Mật khẩu mới</label>
                    <input type="password" name="pass" class="custom-input" required oninput="hideRecoveryError()">
                    <input type="hidden" name="email">
                    <input type="hidden" name="token">
                    <div id="recovery-error" style="color: #dc3545; font-size: 13px; display: none; margin-top: 8px; font-weight: 500;"></div>
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" class="btn-custom btn-outline" onclick="closeModal('recoveryModal')">Huỷ</button>
                    <button type="submit" class="btn-custom btn-primary-custom">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

    <div id="loginAlertModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="modal-header-custom">
                <h3 style="color: #dc3545;"><i class="bi bi-exclamation-triangle-fill"></i> Thông báo</h3>
                <span class="close-modal" onclick="closeModal('loginAlertModal')">&times;</span>
            </div>
            <p style="font-size: 16px; margin-bottom: 24px; color: #333;">Bạn cần phải đăng nhập trước khi thực hiện đặt phòng!</p>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn-custom btn-outline" onclick="closeModal('loginAlertModal')">Đóng</button>
                <button type="button" class="btn-custom btn-primary-custom" onclick="closeModal('loginAlertModal'); openModal('loginModal');">Đăng nhập ngay</button>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <?php
    if(isset($_GET['account_recovery']))
    {
      $data = filteration($_GET);
      $t_date = date("Y-m-d");
      $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1", [$data['email'],$data['token'],$t_date],'sss');

      if(mysqli_num_rows($query)==1)
      {
        echo<<<showModal
          <script>
            var myModal = document.getElementById('recoveryModal');
            myModal.querySelector("input[name='email']").value = '$data[email]';
            myModal.querySelector("input[name='token']").value = '$data[token]';
            openModal('recoveryModal');
          </script>
        showModal;
      }
      else{
        echo "<script>alert('Lỗi: Liên kết khôi phục không hợp lệ hoặc đã hết hạn!');</script>";
      }
    }
  ?>

    
<script>
// ── WIDGET THỐNG KÊ KHÁCH SẠN REALTIME ──────────────────────
function loadHotelStats() {
    var fd = new FormData();
    fd.append('hotel_stats', '1');
    fetch('ajax/realtime_poll.php', { method: 'POST', body: fd })
        .then(function(r){ return r.json(); })
        .then(function(d){
            if (d.error) return;
            document.getElementById('stat-guests').textContent    = d.guests_in_house ?? '0';
            document.getElementById('stat-avail').textContent     = d.rooms_available  ?? '0';
            document.getElementById('stat-occupied').textContent  = d.rooms_occupied   ?? '0';
            document.getElementById('stat-cleaning').textContent  = d.rooms_cleaning   ?? '0';
            document.getElementById('stat-total').textContent     = d.rooms_total      ?? '0';
        })
        .catch(function(){});
}
loadHotelStats();
setInterval(loadHotelStats, 15000); // Cập nhật mỗi 15 giây
</script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: { delay: 3500, disableOnInteraction: false, }
    });

    var swiperTestimonials = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: false, },
        pagination: { el: ".swiper-pagination", },
        breakpoints: {
            320: { slidesPerView: 1, },
            768: { slidesPerView: 2, },
            1024: { slidesPerView: 3, },
        }
    });

    function hideRecoveryError() {
        document.getElementById('recovery-error').style.display = 'none';
    }

    let recovery_form = document.getElementById('recovery-form');
    recovery_form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();
        data.append('email', recovery_form.elements['email'].value);
        data.append('token', recovery_form.elements['token'].value);
        data.append('pass', recovery_form.elements['pass'].value);
        data.append('recover_user', '');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            let recError = document.getElementById('recovery-error');
            if (this.responseText == 'failed') {
                recError.innerHTML = "Lỗi hệ thống: Không thể cập nhật mật khẩu lúc này!";
                recError.style.display = 'block';
            } else {
                alert("Thành công: Đã đặt lại mật khẩu! Vui lòng đăng nhập bằng mật khẩu mới.");
                recovery_form.reset();
                closeModal('recoveryModal');
            }
        }
        xhr.send(data);
    });

    function checkLoginToBook(status, room_id) {
        if (status) {
            window.location.href = 'confirm_booking.php?id=' + room_id;
        } else {
            openModal('loginAlertModal'); 
        }
    }
    function checkLoginToBook2(status, room_id, room_no) {
        if (status) {
            var checkin_val  = document.getElementById('checkin-val').value;
            var checkout_val = document.getElementById('checkout-val').value;
            var url = 'confirm_booking.php?id=' + room_id + '&room_no=' + room_no;
            if (checkin_val)  url += '&checkin='  + checkin_val;
            if (checkout_val) url += '&checkout=' + checkout_val;
            window.location.href = url;
        } else {
            openModal('loginAlertModal');
        }
    }

    // LỌC TẦNG CHUẨN
    function showFloor(id,btn){
        let panels = document.querySelectorAll('.floor-panel');
        let buttons = document.querySelectorAll('.floor-btn');

        panels.forEach(panel=>{ panel.classList.remove('active'); });
        buttons.forEach(button=>{ button.classList.remove('active'); });

        let target = document.getElementById('floor-panel-'+id);
        if(target) target.classList.add('active');
        if(btn) btn.classList.add('active');

        // Scroll đến khu vực danh sách tầng
        let section = document.getElementById('floor-section');
        if(section){
            section.scrollIntoView({ behavior:'smooth', block:'start' });
        }
    }

    // Khi trang load: nếu URL có #floor-N thì tự chọn đúng tầng đó
    (function(){
        var hash = window.location.hash;
        var m = hash.match(/^#floor-(\d+)$/);
        if(m){
            var fid = parseInt(m[1]);
            var btn = document.querySelector('.floor-btn[onclick*="showFloor('+fid+',"]');
            if(!btn){
                // Tìm rộng hơn
                document.querySelectorAll('.floor-btn').forEach(function(b){
                    if(b.getAttribute('onclick') && b.getAttribute('onclick').indexOf('showFloor('+fid+',') !== -1) btn = b;
                });
            }
            if(btn) showFloor(fid, btn);
        }
    })();
    </script>

<script>
// ===== DATE CARD WIDGET =====
const MONTHS = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
const DAYS   = ['SUN','MON','TUE','WED','THU','FRI','SAT'];

function toYMD(d) {
    return d.getFullYear() + '-' +
        String(d.getMonth()+1).padStart(2,'0') + '-' +
        String(d.getDate()).padStart(2,'0');
}

function updateWidget(type, dateObj) {
    var day     = String(dateObj.getDate()).padStart(2,'0');
    var month   = MONTHS[dateObj.getMonth()];
    var weekday = DAYS[dateObj.getDay()];
    document.getElementById(type+'-day').textContent     = day;
    document.getElementById(type+'-month').textContent   = month;
    document.getElementById(type+'-weekday').textContent = weekday;
    document.getElementById(type+'-val').value           = toYMD(dateObj);
    document.getElementById(type+'-picker').value        = toYMD(dateObj);
}

function openDatePicker(type) {
    var picker = document.getElementById(type+'-picker');
    picker.style.position = 'fixed';
    picker.style.opacity  = '0';
    picker.style.pointerEvents = 'auto';
    picker.showPicker ? picker.showPicker() : picker.click();
    setTimeout(function(){ picker.style.pointerEvents = 'none'; }, 500);
}

function onDateChange(type) {
    // Lưu vào sessionStorage khi user chọn ngày trên widget
    var picker = document.getElementById(type+'-picker');
    if (!picker.value) return;
    var parts = picker.value.split('-');
    var d = new Date(+parts[0], +parts[1]-1, +parts[2]);
    updateWidget(type, d);

    sessionStorage.setItem('ks_'+type, toYMD(d));
    // Nếu checkin thay đổi -> checkout phải >= checkin + 1 ngày
    if (type === 'checkin') {
        var nextDay = new Date(d);
        nextDay.setDate(nextDay.getDate() + 1);
        document.getElementById('checkout-picker').min = toYMD(nextDay);
        // Nếu checkout hiện tại <= checkin mới -> tự cập nhật checkout
        var coVal = document.getElementById('checkout-val').value;
        if (!coVal || coVal <= toYMD(d)) {
            updateWidget('checkout', nextDay);
        }
    }
}

// Khởi tạo mặc định: hôm nay + ngày mai
(function init() {
    var today    = new Date(); today.setHours(0,0,0,0);
    var tomorrow = new Date(today.getTime() + 86400000);
    var todayStr = toYMD(today);

    document.getElementById('checkin-picker').min  = todayStr;
    document.getElementById('checkout-picker').min = toYMD(tomorrow);

    // Đọc từ sessionStorage nếu có (giữ ngày khi quay lại)
    var _ci = sessionStorage.getItem('ks_checkin');
    var _co = sessionStorage.getItem('ks_checkout');
    var ciDate = null, coDate = null;
    if (_ci) { var d = new Date(_ci + 'T00:00:00'); ciDate = (!isNaN(d) && d >= today) ? d : today; }
    else { ciDate = today; }
    if (_co) { var d = new Date(_co + 'T00:00:00'); coDate = (!isNaN(d) && d > ciDate) ? d : new Date(ciDate.getTime()+86400000); }
    else { coDate = new Date(ciDate.getTime()+86400000); }

    updateWidget('checkin',  ciDate);
    updateWidget('checkout', coDate);

    // Cập nhật đồng hồ thời gian thực mỗi phút (nếu qua ngày mới)
    setInterval(function() {
        var now = new Date();
        var nowStr = toYMD(now);
        var ciVal  = document.getElementById('checkin-val').value;
        // Nếu checkin đã chọn < hôm nay -> reset về hôm nay
        if (ciVal && ciVal < nowStr) {
            var tom = new Date(now); tom.setDate(now.getDate()+1);
            document.getElementById('checkin-picker').min  = nowStr;
            document.getElementById('checkout-picker').min = toYMD(tom);
            updateWidget('checkin',  now);
            updateWidget('checkout', tom);
        }
    }, 60000);
})();
</script>
</body>
</html>