<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Chi tiết phòng</title>

    <style>
    :root {
        --green:       #B88B4A;
        --green-dark:  #9a7035;
        --green-light: #fdf6e9;
        --gold:        #c8a96e;
        --text:        #1a1a1a;
        --muted:       #6b7280;
        --border:      #e8e8e8;
        --bg:          #f7f5f2;
        --white:       #ffffff;
        --radius-lg:   16px;
        --radius-md:   10px;
        --shadow-card: 0 4px 24px rgba(0,0,0,.08);
        --shadow-btn:  0 4px 14px rgba(184,139,74,.35);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        background: var(--bg);
        color: var(--text);
        font-family: 'DM Sans', sans-serif;
    }


    /* ── Room header ── */
    .room-header {
        padding: 24px 0 20px;
        border-bottom: 1px solid var(--border);
        margin-bottom: 28px;
    }
    .room-name {
        font-family: 'Playfair Display', serif;
        font-size: clamp(24px, 3.5vw, 38px);
        font-weight: 700;
        color: var(--text);
        line-height: 1.2;
        margin-bottom: 10px;
    }
    .breadcrumb-row { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
    .bc-link { font-size: 14px; color: var(--muted); text-decoration: none; transition: color .2s; }
    .bc-link:hover { color: var(--green); }
    .bc-sep { color: var(--muted); font-size: 11px; }
    .bc-current { font-size: 14px; color: var(--green); font-weight: 500; }

    /* ── Toast ── */
    .custom-alert {
        position: fixed; top: 24px; right: 24px;
        padding: 14px 24px;
        background: #dc2626; color: #fff;
        border-radius: 8px; font-size: 14px; font-weight: 500;
        z-index: 9999; display: none;
        box-shadow: 0 4px 20px rgba(0,0,0,.2);
        animation: slideIn .3s ease;
    }
    @keyframes slideIn { from { transform: translateX(30px); opacity: 0; } to { transform: none; opacity: 1; } }

    /* ── Layout wrapper ── */
    .page-wrap {
        max-width: 1200px;
        margin: 0 auto;
        padding: 28px 24px 60px;
    }
    /* ── Main flex ── */
    .details-flex {
        display: flex;
        gap: 32px;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    /* ── Slider column ── */
    .slider-col {
        flex: 0 0 calc(60% - 16px);
        min-width: 0;
    }

    /* Swiper */
    .room-swiper {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-card);
        background: #111;
        position: relative;
    }
    .swiper-slide img {
        width: 100%; height: 420px;
        object-fit: cover; display: block;
    }
    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        background: rgba(0,0,0,.45);
        width: 44px; height: 44px;
        border-radius: 50%;
        backdrop-filter: blur(4px);
    }
    .swiper-button-next::after,
    .swiper-button-prev::after { font-size: 16px; font-weight: 700; }
    .swiper-pagination-bullet-active { background: var(--gold) !important; }

    /* Thumbnails row */
    .thumb-row {
        display: flex;
        gap: 10px;
        margin-top: 12px;
        flex-wrap: wrap;
    }
    .thumb-row img {
        width: 72px; height: 52px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        opacity: .7;
        transition: opacity .2s, border-color .2s;
    }
    .thumb-row img.active-thumb,
    .thumb-row img:hover { opacity: 1; border-color: var(--gold); }

    /* ── Info card column ── */
    .info-col {
        flex: 1;
        min-width: 300px;
        position: sticky;
        top: 20px;
    }

    .info-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-card);
        overflow: hidden;
    }

    /* Price header */
    .price-header {
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
        padding: 24px 28px;
        color: #fff;
    }
    .price-label { font-size: 12px; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; opacity: .8; margin-bottom: 4px; }
    .price-value {
        font-family: 'Playfair Display', serif;
        font-size: 32px; font-weight: 700;
        line-height: 1;
    }
    .price-unit { font-size: 14px; opacity: .85; margin-left: 4px; }

    /* Stars row */
    .stars-row { display: flex; align-items: center; gap: 4px; margin-top: 8px; }
    .stars-row i { color: var(--gold); font-size: 14px; }
    .stars-row .rating-txt { font-size: 13px; opacity: .8; margin-left: 4px; }

    /* Card body */
    .info-body { padding: 24px 28px; }

    /* Divider */
    .info-divider { height: 1px; background: var(--border); margin: 18px 0; }

    /* Info row */
    .info-row { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 16px; }
    .info-row:last-child { margin-bottom: 0; }
    .info-icon {
        width: 36px; height: 36px; border-radius: 8px;
        background: var(--green-light);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        color: var(--green);
        font-size: 15px;
    }
    .info-row-body { flex: 1; min-width: 0; }
    .info-row-label { font-size: 11px; font-weight: 600; letter-spacing: .07em; text-transform: uppercase; color: var(--muted); margin-bottom: 5px; }
    .tags-wrap { display: flex; flex-wrap: wrap; gap: 6px; }
    .tag {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 12px;
        border-radius: 20px;
        background: var(--green-light);
        color: var(--green-dark);
        font-size: 13px; font-weight: 500;
        border: 1px solid rgba(184,139,74,.15);
    }

    /* Availability note */
    .avail-note {
        display: flex; align-items: center; gap: 8px;
        background: #fdf6e9;
        border: 1px solid #b3cef5;
        border-radius: 8px;
        padding: 10px 14px;
        margin: 18px 0;
        font-size: 13px;
        color: #B88B4A;
        font-weight: 500;
    }
    .avail-dot { width: 8px; height: 8px; border-radius: 50%; background: #d4aa6a; flex-shrink: 0; }

    /* CTA button */
    .btn-book {
        width: 100%;
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
        color: #fff !important;
        border: none;
        padding: 15px 20px;
        border-radius: 10px;
        font-size: 16px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        transition: all .3s ease;
        box-shadow: var(--shadow-btn);
        letter-spacing: .02em;
        display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-book:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(184,139,74,.4);
    }
    .btn-book:disabled {
        background: #9ca3af; box-shadow: none;
        transform: none; cursor: not-allowed;
    }

    /* ── Bottom section ── */
    .bottom-section { margin-top: 50px; }

    .section-label {
        display: flex; align-items: center; gap: 12px;
        margin-bottom: 22px;
    }
    .section-label::after {
        content: ''; flex: 1;
        height: 1px; background: var(--border);
    }
    .section-label h5 {
        font-family: 'Playfair Display', serif;
        font-size: 22px; font-weight: 700;
        white-space: nowrap;
        color: var(--text);
    }

    .description-box {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 28px 32px;
        box-shadow: var(--shadow-card);
        margin-bottom: 40px;
    }
    .description-text { font-size: 15px; line-height: 1.75; color: #4b5563; }

    /* Reviews */
    .reviews-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 18px; }

    .review-card {
        background: var(--white);
        border-radius: var(--radius-md);
        padding: 22px;
        box-shadow: var(--shadow-card);
        border: 1px solid var(--border);
        transition: transform .2s, box-shadow .2s;
    }
    .review-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(0,0,0,.1); }

    .reviewer-row { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
    .reviewer-avatar {
        width: 42px; height: 42px; border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--border);
    }
    .reviewer-name { font-size: 15px; font-weight: 600; color: var(--text); }
    .review-stars { display: flex; gap: 2px; margin-top: 2px; }
    .review-stars i { color: var(--gold); font-size: 12px; }

    .review-text { font-size: 14px; color: #4b5563; line-height: 1.65; }

    /* Modal */
    .modal-overlay {
        position: fixed; inset: 0;
        background: rgba(0,0,0,.55);
        display: none; justify-content: center; align-items: center;
        z-index: 9999;
        backdrop-filter: blur(4px);
    }
    .modal-box {
        background: var(--white);
        padding: 36px 32px;
        border-radius: var(--radius-lg);
        width: min(420px, calc(100% - 40px));
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,.25);
        text-align: center;
    }
    .modal-icon { font-size: 40px; color: var(--green); margin-bottom: 12px; }
    .modal-title { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; margin-bottom: 10px; }
    .modal-desc { font-size: 15px; color: var(--muted); margin-bottom: 24px; line-height: 1.6; }
    .modal-close { position: absolute; top: 16px; right: 20px; font-size: 22px; cursor: pointer; color: var(--muted); background: none; border: none; line-height: 1; }
    .modal-close:hover { color: var(--text); }
    .btn-modal-close {
        padding: 11px 28px;
        border-radius: 8px;
        background: var(--green);
        color: #fff;
        border: none;
        font-size: 15px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        transition: background .2s;
    }
    .btn-modal-close:hover { background: var(--green-dark); }

    @media (max-width: 768px) {
        .slider-col { flex: 0 0 100%; }
        .swiper-slide img { height: 300px; }
        .info-col { position: static; }
        .reviews-grid { grid-template-columns: 1fr; }
        
    }
    </style>
</head>
<body style="background:#faf8f4;">

    <?php require('inc/header.php'); ?>

    <div id="toastAlert" class="custom-alert"></div>

    <?php 
    if(!isset($_GET['id'])){ redirect('rooms.php'); }

    $data = filteration($_GET);
    $preselected_room_no = isset($_GET['room_no']) ? trim($_GET['room_no']) : '';
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if(mysqli_num_rows($room_res)==0){ redirect('rooms.php'); }
    $room_data = mysqli_fetch_assoc($room_res);
    ?>

    <div class="page-wrap">

        <!-- Room title + breadcrumb -->
        <div class="room-header">
            <h1 class="room-name"><?php 
                $display_name = !empty($room_data['room_type']) ? $room_data['room_type'] : $room_data['name'];
                if(!empty($preselected_room_no)) {
                    echo $display_name . ' - P.' . $preselected_room_no;
                } else {
                    echo $display_name;
                }
            ?></h1>
            <div class="breadcrumb-row">
                <a href="index.php" class="bc-link">Trang ch&#7911;</a>
                <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
                <a href="rooms.php" class="bc-link">Danh s&#225;ch ph&#242;ng</a>
                <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
                <span class="bc-current"><?php echo $room_data['name'] ?></span>
            </div>
        </div>

        <!-- Main layout -->
        <div class="details-flex">

            <!-- Slider -->
            <div class="slider-col">
                <div class="swiper room-swiper">
                    <div class="swiper-wrapper">
                        <?php 
                        $img_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]'");
                        $all_imgs = [];
                        if(mysqli_num_rows($img_q)>0) {
                            while($img_res = mysqli_fetch_assoc($img_q)) {
                                $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
                                if(file_exists(UPLOAD_IMAGE_PATH.ROOMS_FOLDER.$img_res['image'])){
                                    $room_img = roomImagePath($img_res['image']);
                                }
                                $all_imgs[] = $room_img;
                                echo "<div class='swiper-slide'><img src='$room_img' alt='Room image'></div>";
                            }
                        } else {
                            $room_img = ROOMS_IMG_PATH."thumbnail.jpg";
                            $all_imgs[] = $room_img;
                            echo "<div class='swiper-slide'><img src='$room_img' alt='Room image'></div>";
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- Thumbnails -->
                <?php if(count($all_imgs) > 1): ?>
                <div class="thumb-row" id="thumbRow">
                    <?php foreach($all_imgs as $ti => $tsrc): ?>
                        <img src="<?= $tsrc ?>" class="<?= $ti===0?'active-thumb':'' ?>" onclick="goThumb(<?= $ti ?>)" alt="thumb">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Info card -->
            <div class="info-col">
                <div class="info-card">
                    <!-- Price header -->
                    <div class="price-header">
                        <div class="price-label">Giá phòng mỗi đêm</div>
                        <?php 
                        $price = number_format($room_data['price'], 0, ',', '.');
                        echo "<div class='price-value'>$price <span class='price-unit'>VND</span></div>";

                        $rating_q = "SELECT AVG(rating) AS avg_rating, COUNT(*) AS cnt FROM `rating_review` WHERE `room_id`='$room_data[id]'";
                        $rating_res = mysqli_query($con,$rating_q);
                        $rating_fetch = mysqli_fetch_assoc($rating_res);
                        if($rating_fetch['avg_rating'] != NULL) {
                            $avg = round($rating_fetch['avg_rating'], 1);
                            $stars_html = '';
                            for($i=0; $i<floor($avg); $i++) $stars_html .= "<i class='bi bi-star-fill'></i>";
                            if($avg - floor($avg) >= 0.5) $stars_html .= "<i class='bi bi-star-half'></i>";
                            echo "<div class='stars-row'>$stars_html<span class='rating-txt'>$avg / 5 ({$rating_fetch['cnt']} đánh giá)</span></div>";
                        }
                        ?>
                    </div>

                    <!-- Card body -->
                    <div class="info-body">

                        <?php if(!empty($room_data['room_number'])): ?>
                        <div style="display:flex; align-items:center; gap:8px; background:#f0f4ff; border:1px solid #c7d8f8; border-radius:8px; padding:10px 14px; margin-bottom:16px;">
                            <i class="bi bi-door-closed-fill" style="color:#B88B4A; font-size:16px;"></i>
                            <div>
                                <div style="font-size:11px; font-weight:700; color:#6b7280; text-transform:uppercase; letter-spacing:.07em;">Số phòng</div>
                                <div style="font-size:18px; font-weight:700; color:#B88B4A;"><?php echo $room_data['room_number'] ?></div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Không gian -->
                        <?php
                        $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");
                        $fea_tags = '';
                        while($fr = mysqli_fetch_assoc($fea_q)) $fea_tags .= "<span class='tag'>{$fr['name']}</span>";
                        ?>
                        <div class="info-row">
                            <div class="info-icon"><i class="bi bi-layout-text-window"></i></div>
                            <div class="info-row-body">
                                <div class="info-row-label">Không gian</div>
                                <div class="tags-wrap"><?= $fea_tags ?></div>
                            </div>
                        </div>

                        <div class="info-divider"></div>

                        <!-- Tiện ích -->
                        <?php
                        $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]'");
                        $fac_tags = '';
                        while($fr2 = mysqli_fetch_assoc($fac_q)) $fac_tags .= "<span class='tag'>{$fr2['name']}</span>";
                        ?>
                        <div class="info-row">
                            <div class="info-icon"><i class="bi bi-grid-3x3-gap"></i></div>
                            <div class="info-row-body">
                                <div class="info-row-label">Tiện ích</div>
                                <div class="tags-wrap"><?= $fac_tags ?></div>
                            </div>
                        </div>

                        <div class="info-divider"></div>

                        <!-- Sức chứa + diện tích -->
                        <div class="info-row">
                            <div class="info-icon"><i class="bi bi-people"></i></div>
                            <div class="info-row-body">
                                <div class="info-row-label">Sức chứa</div>
                                <div class="tags-wrap">
                                    <span class="tag"><?= $room_data['adult'] ?> Người lớn</span>
                                    <span class="tag"><?= $room_data['children'] ?> Trẻ em</span>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex; gap:10px; margin-top:12px;">
                            <div style="flex:1; background:var(--green-light); border-radius:10px; padding:14px 16px; text-align:center;">
                                <div style="font-size:11px; text-transform:uppercase; letter-spacing:.07em; color:var(--muted); margin-bottom:4px;">Diện Tích</div>
                                <div style="font-size:20px; font-weight:700; color:var(--green-dark);"><?= $room_data['area'] ?> m²</div>
                            </div>
                            <div style="flex:1; background:var(--green-light); border-radius:10px; padding:14px 16px; text-align:center;">
                                <div style="font-size:11px; text-transform:uppercase; letter-spacing:.07em; color:var(--muted); margin-bottom:4px;">Tầng</div>
                                <div style="font-size:20px; font-weight:700; color:var(--green-dark);"><?= $room_data['floor'] ?? '—' ?></div>
                            </div>
                        </div>

                        <?php if($room_data['children'] > 0):
                            $surcharge_price = number_format($room_data['price'] * 0.07, 0, ',', '.');
                            $total_with_surcharge = number_format($room_data['price'] * 1.07, 0, ',', '.');
                        ?>
                        <div style="margin-top:14px; background:#fffbeb; border:1px solid #fde68a; border-radius:10px; padding:12px 16px; display:flex; gap:10px; align-items:flex-start;">
                            <i class="bi bi-exclamation-triangle-fill" style="color:#d97706; font-size:16px; flex-shrink:0; margin-top:2px;"></i>
                            <div style="flex:1;">
                                <div style="font-size:13px; font-weight:700; color:#92400e; margin-bottom:8px;">Quy định trẻ em</div>
                                <div style="font-size:12px; color:#78350f; line-height:1.8; display:flex; flex-direction:column; gap:2px;">
                                    <span>🟢 <strong>Dưới 10 tuổi:</strong> miễn phí, không phụ thu.</span>
                                    <span>🟡 <strong>Từ 10–16 tuổi:</strong> phụ thu 7% / đêm &nbsp;·&nbsp; <strong><?= $surcharge_price ?> VND</strong> &nbsp;→&nbsp; Giá sau phụ thu: <strong style="color:#b45309;"><?= $total_with_surcharge ?> VND / đêm</strong></span>
                                    <span>🔵 <strong>Trên 16 tuổi:</strong> tính như người lớn.</span>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Available badge - ĐỘNG -->
                        <?php
                        $today_det = date('Y-m-d');

                        // 1. Kiểm tra phòng đang dọn (room_numbers.status = 2)
                        $cleaning_res = mysqli_query($con,
                            "SELECT room_no FROM room_numbers
                             WHERE room_id='{$room_data['id']}' AND status=2"
                        );
                        $cleaning_rooms = [];
                        while($cr = mysqli_fetch_assoc($cleaning_res)) $cleaning_rooms[] = $cr['room_no'];

                        // 2. Phòng đang có khách (arrival=1, check_out > hôm nay)
                        $rno_filter = !empty($preselected_room_no) ? " AND bd.room_no='".mysqli_real_escape_string($con,$preselected_room_no)."'" : "";
                        $active_bk_res = mysqli_query($con,
                            "SELECT bo.check_in, bo.check_out, bd.room_no
                             FROM booking_order bo
                             LEFT JOIN booking_details bd ON bd.booking_id = bo.booking_id
                             WHERE bo.room_id='{$room_data['id']}' AND bo.booking_status='booked'
                             AND bo.arrival = 1 AND bo.check_out > '$today_det'
                             {$rno_filter}
                             ORDER BY bd.room_no ASC"
                        );
                        $active_rows = [];
                        while($r = mysqli_fetch_assoc($active_bk_res)) $active_rows[] = $r;

                        // 3. Phòng đã đặt trước chưa nhận (arrival=0, check_out > hôm nay)
                        $reserved_res = mysqli_query($con,
                            "SELECT bo.check_in, bo.check_out, bd.room_no
                             FROM booking_order bo
                             LEFT JOIN booking_details bd ON bd.booking_id = bo.booking_id
                             WHERE bo.room_id='{$room_data['id']}' AND bo.booking_status='booked'
                             AND bo.arrival = 0 AND bo.check_out > '$today_det'
                             {$rno_filter}
                             ORDER BY bo.check_in ASC LIMIT 5"
                        );
                        $reserved_rows = [];
                        while($rv = mysqli_fetch_assoc($reserved_res)) $reserved_rows[] = $rv;

                        $has_status = !empty($cleaning_rooms) || !empty($active_rows) || !empty($reserved_rows);
                        ?>

                        <?php if(!empty($cleaning_rooms)): ?>
                        <div class="avail-note" style="background:#fff3d9; border-color:#d4aa6a; color:#7a5c2e; flex-direction:column; align-items:flex-start; gap:4px; margin-bottom:6px;">
                            <?php foreach($cleaning_rooms as $crno): ?>
                            <div style="display:flex;align-items:center;gap:6px;">
                                <div class="avail-dot" style="background:#B88B4A;flex-shrink:0;"></div>
                                Đang dọn phòng &nbsp;·&nbsp; <strong>Phòng <?= htmlspecialchars($crno) ?></strong>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($active_rows)): ?>
                        <div class="avail-note" style="background:#fef2f2; border-color:#fecaca; color:#dc2626; flex-direction:column; align-items:flex-start; gap:4px; margin-bottom:6px;">
                            <?php foreach($active_rows as $abk):
                                $ci_det  = date('d/m/Y', strtotime($abk['check_in']));
                                $co_det  = date('d/m/Y', strtotime($abk['check_out']));
                                $rno_det = !empty($abk['room_no']) ? 'Phòng '.$abk['room_no'] : '—';
                            ?>
                            <div style="display:flex;align-items:center;gap:6px;">
                                <div class="avail-dot" style="background:#dc2626;flex-shrink:0;"></div>
                                Đang có khách &nbsp;·&nbsp; <strong><?= htmlspecialchars($rno_det) ?></strong> &nbsp;·&nbsp; <?= $ci_det ?> → <?= $co_det ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($reserved_rows)): ?>
                        <div class="avail-note" style="background:#fffbeb; border-color:#fde68a; color:#996500; flex-direction:column; align-items:flex-start; gap:4px; margin-bottom:6px;">
                            <?php foreach($reserved_rows as $rv2):
                                $ci_rv  = date('d/m/Y', strtotime($rv2['check_in']));
                                $co_rv  = date('d/m/Y', strtotime($rv2['check_out']));
                                $rno_rv = !empty($rv2['room_no']) ? 'Phòng '.$rv2['room_no'] : '—';
                            ?>
                            <div style="display:flex;align-items:center;gap:6px;">
                                <div class="avail-dot" style="background:#d97706;flex-shrink:0;"></div>
                                Đã đặt trước &nbsp;·&nbsp; <strong><?= htmlspecialchars($rno_rv) ?></strong> &nbsp;·&nbsp; <?= $ci_rv ?> → <?= $co_rv ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php
                        // Tính số phòng còn trống: tổng - đang dọn - đang có khách - đã đặt trước - trừ phòng đang xem
                        $total_rn_avail_q = mysqli_query($con, "SELECT COUNT(*) as total FROM room_numbers WHERE room_id='{$room_data['id']}'");
                        $total_rn_avail = mysqli_fetch_assoc($total_rn_avail_q)['total'];

                        $busy_cleaning_cnt = count($cleaning_rooms);

                        $busy_booked_q = mysqli_query($con,
                            "SELECT COUNT(DISTINCT bd.room_no) as cnt
                             FROM booking_order bo
                             JOIN booking_details bd ON bd.booking_id = bo.booking_id
                             WHERE bo.room_id='{$room_data['id']}' AND bo.booking_status='booked'
                             AND bo.check_out > CURDATE()"
                        );
                        $busy_booked_cnt = mysqli_fetch_assoc($busy_booked_q)['cnt'];

                        // Nếu đang xem phòng cụ thể (có room_no trên URL) thì trừ thêm 1
                        $viewing_offset = !empty($preselected_room_no) ? 1 : 0;
                        $available_display = max(0, $total_rn_avail - $busy_cleaning_cnt - $busy_booked_cnt - $viewing_offset);

                        if(!$has_status): ?>
                        <div class="avail-note">
                            <div class="avail-dot"></div>
                            Còn <strong><?= $available_display ?></strong> phòng tương tự như phòng này
                        </div>
                        <?php endif; ?>


                        <!-- CTA -->
                        <?php
                        $total_rn_q = mysqli_query($con, "SELECT COUNT(*) as total FROM room_numbers WHERE room_id='{$room_data['id']}'");
                        $total_rn = mysqli_fetch_assoc($total_rn_q)['total'];
                        $busy_cleaning = count($cleaning_rooms);
                        $login = (isset($_SESSION['login']) && $_SESSION['login']==true) ? 1 : 0;
                        $rno_js = htmlspecialchars($preselected_room_no ?? '');

                        if($settings_r['shutdown']){
                            echo "<button class='btn-book' disabled>Đang bảo trì</button>";
                        } elseif(!empty($preselected_room_no)) {
                            // Xem phòng cụ thể: kiểm tra đúng phòng đó
                            $rno_esc = mysqli_real_escape_string($con, $preselected_room_no);
                            $rno_status_q = mysqli_fetch_assoc(mysqli_query($con,
                                "SELECT status FROM room_numbers WHERE room_id='{$room_data['id']}' AND room_no='$rno_esc' LIMIT 1"
                            ));
                            $rno_busy_q = mysqli_fetch_assoc(mysqli_query($con,
                                "SELECT COUNT(*) as cnt FROM booking_order bo
                                 JOIN booking_details bd ON bd.booking_id = bo.booking_id
                                 WHERE bo.room_id='{$room_data['id']}' AND bo.booking_status='booked'
                                 AND bd.room_no='$rno_esc' AND bo.check_out > CURDATE()"
                            ));
                            if($rno_status_q && $rno_status_q['status'] == 2){
                                echo "<button class='btn-book' disabled style='background:#94a3b8;box-shadow:none;cursor:not-allowed;'>Đang dọn phòng</button>";
                            } elseif($rno_busy_q && $rno_busy_q['cnt'] > 0){
                                echo "<button class='btn-book' disabled style='background:#ef4444;box-shadow:none;cursor:not-allowed;'>Phòng đã được đặt</button>";
                            } else {
                                echo "<button onclick='checkLoginToBook($login,$room_data[id],\"{$rno_js}\")' class='btn-book'>Đặt phòng ngay</button>";
                            }
                        } else {
                            // Xem tổng quan: đếm số phòng còn trống
                            $busy_occupied_q = mysqli_query($con,
                                "SELECT COUNT(DISTINCT bd.room_no) as cnt
                                 FROM booking_order bo
                                 JOIN booking_details bd ON bd.booking_id = bo.booking_id
                                 WHERE bo.room_id='{$room_data['id']}' AND bo.booking_status='booked'
                                 AND bo.arrival = 1 AND bo.check_out > CURDATE()"
                            );
                            $busy_occupied = mysqli_fetch_assoc($busy_occupied_q)['cnt'];
                            $available_count = max(0, $total_rn - $busy_cleaning - $busy_occupied);
                            if($available_count <= 0){
                                $reason = ($busy_cleaning > 0 && $busy_occupied == 0) ? 'Đang dọn phòng' : 'Hết phòng trống';
                                echo "<button class='btn-book' disabled style='background:#94a3b8;box-shadow:none;cursor:not-allowed;'>{$reason}</button>";
                            } else {
                                $avail_txt = $available_count < $total_rn ? " ({$available_count}/{$total_rn} phòng trống)" : '';
                                echo "<button onclick='checkLoginToBook($login,$room_data[id],\"{$rno_js}\")' class='btn-book'>Đặt phòng ngay{$avail_txt}</button>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="bottom-section">
            <div class="section-label"><h5>Mô tả phòng</h5></div>
            <div class="description-box">
                <p class="description-text"><?php echo $room_data['description'] ?: 'Chưa có mô tả cho phòng này.' ?></p>
            </div>

            <!-- Reviews -->
            <div class="section-label"><h5>Trải nghiệm khách hàng</h5></div>
            <div class="reviews-grid">
                <?php
                $review_q = "SELECT rr.*, uc.name AS uname, uc.profile FROM `rating_review` rr INNER JOIN `user_cred` uc ON rr.user_id = uc.id WHERE rr.room_id = '$room_data[id]' ORDER BY `sr_no` DESC LIMIT 15";
                $review_res = mysqli_query($con,$review_q);
                $img_path = USERS_IMG_PATH;

                if(mysqli_num_rows($review_res)==0){
                    echo '<p style="color:var(--muted);grid-column:1/-1;">Chưa có đánh giá nào!</p>';
                } else {
                    while($row = mysqli_fetch_assoc($review_res)) {
                        $stars = '';
                        for($i=0; $i<$row['rating']; $i++) $stars .= "<i class='bi bi-star-fill'></i>";
                        $empty = 5 - $row['rating'];
                        for($i=0; $i<$empty; $i++) $stars .= "<i class='bi bi-star' style='opacity:.3;'></i>";
                        echo <<<HTML
                        <div class="review-card">
                            <div class="reviewer-row">
                                <img class="reviewer-avatar" src="{$img_path}{$row['profile']}" alt="{$row['uname']}">
                                <div>
                                    <div class="reviewer-name">{$row['uname']}</div>
                                    <div class="review-stars">$stars</div>
                                </div>
                            </div>
                            <p class="review-text">{$row['review']}</p>
                        </div>
                        HTML;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal đăng nhập -->
    <div id="loginAlertModal" class="modal-overlay" style="display:none; justify-content:center; align-items:center;">
        <div class="modal-box">
            <button class="modal-close" onclick="closeLoginModal()">&times;</button>
            <div class="modal-icon"><i class="bi bi-shield-lock"></i></div>
            <div class="modal-title">Yêu cầu đăng nhập</div>
            <p class="modal-desc">Vui lòng đăng nhập để thực hiện đặt phòng và tận hưởng trải nghiệm của chúng tôi.</p>
            <button class="btn-modal-close" onclick="closeLoginModal()">Đã hiểu</button>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".room-swiper", {
            loop: true,
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            on: {
                slideChange: function() {
                    updateThumbs(this.realIndex);
                }
            }
        });

        function goThumb(idx) {
            swiper.slideToLoop(idx);
            updateThumbs(idx);
        }

        function updateThumbs(idx) {
            var thumbs = document.querySelectorAll('#thumbRow img');
            thumbs.forEach(function(t, i) {
                t.classList.toggle('active-thumb', i === idx);
            });
        }

        function showAlert(msg) {
            var toast = document.getElementById('toastAlert');
            toast.innerText = msg;
            toast.style.display = 'block';
            setTimeout(function() { toast.style.display = 'none'; }, 3000);
        }

        function checkLoginToBook(loginStatus, roomId, roomNo) {
            if (loginStatus === 1) {
                var url = 'confirm_booking.php?id=' + roomId;
                if (roomNo) url += '&room_no=' + encodeURIComponent(roomNo);
                window.location.href = url;
            } else {
                var loginModal = document.getElementById('loginModal');
                if (loginModal) {
                    loginModal.style.display = 'flex';
                    var loginForm = loginModal.querySelector('form');
                    if (loginForm && !loginForm.dataset.hooked) {
                        loginForm.dataset.hooked = 'true';
                        loginForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            var formData = new FormData(loginForm);
                            formData.append('login', '');
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'ajax/login_register.php', true);
                            xhr.onload = function() {
                                var resp = this.responseText.trim();
                                var msgs = {
                                    'inv_email_mob': 'Email hoặc số điện thoại không chính xác!',
                                    'not_verified': 'Tài khoản chưa được xác thực!',
                                    'inactive': 'Tài khoản đã bị khóa!',
                                    'invalid_pass': 'Sai mật khẩu!',
                                    'status_failed': 'Đăng nhập thất bại do lỗi hệ thống!'
                                };
                                if(msgs[resp]) showAlert(msgs[resp]);
                                else window.location.href = window.location.href;
                            };
                            xhr.send(formData);
                        });
                    }
                } else {
                    document.getElementById('loginAlertModal').style.display = 'flex';
                }
            }
        }

        function closeLoginModal() {
            document.getElementById('loginAlertModal').style.display = 'none';
        }
    </script>
    </body>
</html>