<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title']; ?> - Nội quy & Quy định</title>
    <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

        .policy-hero {
            background: linear-gradient(135deg, #1a1208 0%, #2d1f0a 50%, #3a2610 100%);
            color: #fff;
            text-align: center;
            padding: 70px 20px 60px;
            position: relative;
            overflow: hidden;
        }
        .policy-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a84c' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.4;
        }
        .policy-hero-badge {
            display: inline-block;
            background: rgba(201,168,76,0.15);
            border: 1px solid rgba(201,168,76,0.4);
            color: #c9a84c;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .policy-hero h1 {
            font-size: 38px;
            font-weight: 700;
            margin: 0 0 14px;
            letter-spacing: -0.5px;
            position: relative;
        }
        .policy-hero h1 span {
            color: #c9a84c;
        }
        .policy-hero p {
            font-size: 16px;
            opacity: 0.75;
            margin: 0 auto;
            max-width: 560px;
            line-height: 1.7;
            position: relative;
        }
        .policy-hero-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #c9a84c, transparent);
            margin: 20px auto;
        }
        .policy-container {
            max-width: 920px;
            margin: 0 auto;
            padding: 50px 20px 70px;
        }
        .policy-effective {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin-bottom: 36px;
            letter-spacing: 0.3px;
        }
        .policy-effective span {
            background: #fdf6e9;
            border: 1px solid rgba(184,139,74,0.25);
            border-radius: 20px;
            padding: 5px 16px;
            display: inline-block;
        }
        .policy-section {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 20px rgba(184,139,74,0.08);
            margin-bottom: 20px;
            overflow: hidden;
            border: 1px solid rgba(184,139,74,0.18);
            transition: box-shadow 0.2s;
        }
        .policy-section:hover {
            box-shadow: 0 6px 28px rgba(184,139,74,0.14);
        }
        .policy-section-header {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px 28px;
            background: #fdf6e9;
            border-bottom: 1px solid rgba(184,139,74,0.15);
            cursor: pointer;
            user-select: none;
        }
        .policy-section-header:hover {
            background: #faf0dc;
        }
        .policy-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #B88B4A, #7a5c2e);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(184,139,74,0.25);
        }
        .policy-icon.gold {
            background: linear-gradient(135deg, #c9a84c, #a07830);
            box-shadow: 0 4px 12px rgba(201,168,76,0.3);
        }
        .policy-icon.red {
            background: linear-gradient(135deg, #dc3545, #b02030);
            box-shadow: 0 4px 12px rgba(220,53,69,0.25);
        }
        .policy-icon.green {
            background: linear-gradient(135deg, #198754, #116840);
            box-shadow: 0 4px 12px rgba(25,135,84,0.25);
        }
        .policy-icon.teal {
            background: linear-gradient(135deg, #0d9488, #0a7060);
            box-shadow: 0 4px 12px rgba(13,148,136,0.25);
        }
        .policy-section-title {
            font-size: 17px;
            font-weight: 700;
            color: #1a1208;
            flex: 1;
            margin: 0;
        }
        .policy-section-num {
            font-size: 12px;
            color: #aaa;
            font-weight: 500;
            margin-right: 4px;
        }
        .policy-chevron {
            font-size: 16px;
            color: var(--gold);
            transition: transform 0.3s;
        }
        .policy-section-body {
        font-family: 'DM Sans', sans-serif;
            padding: 26px 28px;
        }
        .policy-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .policy-list li {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 11px 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 15px;
            color: #333;
            line-height: 1.65;
        }
        .policy-list li:last-child {
            border-bottom: none;
        }
        .policy-list li .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #B88B4A;
            margin-top: 8px;
            flex-shrink: 0;
        }
        .policy-list li .dot.red   { background: #dc3545; }
        .policy-list li .dot.green { background: #198754; }
        .policy-list li .dot.orange{ background: #f59e0b; }
        .policy-list li .dot.gold  { background: #c9a84c; }
        .tag-highlight {
            display: inline-block;
            background: #e8f0fb;
            color: var(--gold);
            font-weight: 700;
            border-radius: 6px;
            padding: 2px 9px;
            font-size: 13.5px;
            white-space: nowrap;
        }
        .tag-red    { background: #fde8e8; color: #c0392b; }
        .tag-green  { background: #e6f4ea; color: #2d7c4f; }
        .tag-orange { background: #fff3e0; color: #b45309; }
        .tag-gold   { background: #fdf6e3; color: #92650a; }
        .note-box {
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 14px;
            color: #78350f;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 16px;
        }
        .note-box i { font-size: 17px; color: #d97706; margin-top: 2px; flex-shrink: 0; }
        .note-box-blue {
            background: #faf8f4;
            border: 1px solid #bfdbfe;
            color: #1e3a5f;
        }
        .note-box-blue i { color: var(--gold); }
        .policy-rights {
            background: linear-gradient(135deg, #1a1208 0%, #2d1f0a 100%);
            border-radius: 16px;
            padding: 32px 36px;
            margin-bottom: 20px;
            color: #fff;
        }
        .policy-rights h3 {
            color: #c9a84c;
            font-size: 17px;
            font-weight: 700;
            margin: 0 0 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .policy-rights ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .policy-rights ul li {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            font-size: 14px;
            color: rgba(255,255,255,0.85);
            line-height: 1.6;
        }
        .policy-rights ul li i { color: #c9a84c; font-size: 15px; margin-top: 2px; flex-shrink: 0; }
        @media (max-width: 600px) {
            .policy-rights ul { grid-template-columns: 1fr; }
        }
        .policy-footer-note {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin-top: 10px;
            padding: 28px 24px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 14px rgba(0,0,0,0.05);
            border: 1px solid rgba(184,139,74,0.18);
        }
        .policy-footer-logo {
            font-size: 22px;
            font-weight: 800;
            color: #1a1208;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }
        .policy-footer-logo span { color: #c9a84c; }
        .policy-footer-note .hotline {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #fdf6e9;
            border: 1px solid #dce8fb;
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 700;
            color: var(--gold);
            font-size: 15px;
            margin-top: 12px;
        }
        .stars { color: #c9a84c; letter-spacing: 2px; font-size: 16px; }
    </style>
</head>
<body>

<?php require('inc/header.php'); ?>

<div class="policy-hero">
    <div class="policy-hero-badge">★ Luxury 5-Star DawnChill Hotel</div>
    <h1><span>Nội Quy</span> & Quy Định Khách Sạn</h1>
    <div class="policy-hero-divider"></div>
    <p>Quý khách vui lòng đọc kỹ các quy định trước khi nhận phòng. Sự tuân thủ của quý khách giúp chúng tôi mang lại trải nghiệm lưu trú hoàn hảo cho tất cả mọi người.</p>
</div>

<div class="policy-container">

    <div class="policy-effective">
        <span><i class="bi bi-calendar3"></i> Có hiệu lực từ ngày 01/01/2025 — Phiên bản 3.2</span>
    </div>

    <!-- 1. NHẬN & TRẢ PHÒNG -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon"><i class="bi bi-door-open"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">01 /</span> Nhận phòng & Trả phòng</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Giờ nhận phòng tiêu chuẩn <span class="tag-highlight tag-green">Check-in: từ 15:00 (3:00 PM)</span> — Quý khách đến sớm có thể gửi hành lý miễn phí tại quầy lễ tân. Early check-in từ 12:00 PM – 15:00 PM có thể được sắp xếp miễn phí tùy tình trạng phòng (đặt trước được ưu tiên).</span></li>
                <li><span class="dot red"></span><span>Giờ trả phòng tiêu chuẩn <span class="tag-highlight tag-red">Check-out: trước 12:00 (12:00 PM — Trưa)</span> — Late check-out đến 15:00 (3:00 PM) phụ thu <strong>30% giá phòng</strong>; đến 18:00 (6:00 PM) phụ thu <strong>50%</strong>; sau 18:00 (6:00 PM) tính thêm <strong>1 đêm đầy đủ</strong>. Khách hạng phòng Suite trở lên được late check-out đến 14:00 (2:00 PM) miễn phí.</span></li>
                <li><span class="dot"></span><span>Quý khách vui lòng xuất trình <strong>CMND / CCCD / Hộ chiếu</strong> còn hiệu lực khi làm thủ tục nhận phòng. Đối với khách nước ngoài, hộ chiếu là bắt buộc.</span></li>
                <li><span class="dot gold"></span><span>Đặt cọc bảo đảm khi nhận phòng: <span class="tag-highlight tag-gold">20% giá trị đặt phòng</span> (tính trên tổng tiền phòng theo số đêm). Ví dụ: phòng 450.000 VND/đêm × 2 đêm = 900.000 VND → đặt cọc <strong>180.000 VND</strong>. Hoàn trả toàn bộ khi trả phòng nếu không phát sinh hư hỏng hoặc dịch vụ chưa thanh toán.</span></li>
                <li><span class="dot"></span><span>Khách đặt phòng trực tuyến vui lòng mang theo <strong>email xác nhận đặt phòng</strong> và giấy tờ tùy thân. Thông tin phải khớp với tên đặt phòng để nhận phòng.</span></li>
                <li><span class="dot"></span><span>Thủ tục nhận/trả phòng nhanh (Express Check-in / Check-out) có sẵn cho thành viên chương trình khách hàng thân thiết. Đăng ký tại quầy lễ tân hoặc qua ứng dụng khách sạn.</span></li>
            </ul>
        </div>
    </div>

    <!-- 2. QUY ĐỊNH TRONG PHÒNG -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon"><i class="bi bi-house-fill"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">02 /</span> Quy định trong phòng</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot red"></span><span><strong>Nghiêm cấm hút thuốc lá & thuốc lá điện tử</strong> trong toàn bộ phòng nghỉ và khu vực trong nhà. Khu vực hút thuốc chỉ định tại tầng trệt, ngoài cổng phụ. Vi phạm bị phạt <span class="tag-highlight tag-red">2.000.000 VND</span> và phí vệ sinh phòng thêm <span class="tag-highlight tag-red">500.000 VND</span>.</span></li>
                <li><span class="dot red"></span><span><strong>Không mang thức ăn có mùi mạnh</strong> (sầu riêng, mắm, đồ ăn có mùi nồng) vào phòng. Nhà hàng và khu lounge tầng 1 phục vụ mọi nhu cầu ẩm thực 24/7.</span></li>
                <li><span class="dot red"></span><span><strong>Không tổ chức tiệc, liên hoan, karaoke</strong> trong phòng. Giờ yên tĩnh bắt buộc từ <span class="tag-highlight tag-red">22:00 – 07:00</span>. Tiếng ồn vượt mức ảnh hưởng khách khác sẽ bị xử lý theo quy trình an ninh.</span></li>
                <li><span class="dot"></span><span>Dịch vụ dọn phòng mỗi ngày một lần, từ 09:00–14:00. Nếu không muốn bị làm phiền, hãy treo biển <strong>"Do Not Disturb"</strong> ngoài cửa. Quý khách lưu trú từ 2 đêm trở lên có thể chọn <strong>không thay ga/khăn hằng ngày</strong> để góp phần bảo vệ môi trường.</span></li>
                <li><span class="dot"></span><span>Minibar trong phòng được kiểm kê và bổ sung mỗi ngày. Phí tiêu thụ được ghi vào bill phòng và thanh toán khi trả phòng. Danh sách giá niêm yết sẵn trong phòng.</span></li>
                <li><span class="dot"></span><span>Không tự ý di chuyển hoặc làm hư hỏng đồ nội thất, trang trí trong phòng. Mọi thiệt hại sẽ được định giá theo <strong>Bảng bồi thường tài sản</strong> tại quầy lễ tân.</span></li>
                <li><span class="dot"></span><span>Không giặt đồ và phơi quần áo trong phòng hoặc tại ban công. Dịch vụ giặt ủi chuyên nghiệp nhận đồ từ 07:00–20:00, trả trong ngày. Liên hệ lễ tân qua nội bộ số <span class="tag-highlight">3</span>.</span></li>
                <li><span class="dot green"></span><span>Vui lòng tắt điều hòa, đèn và rút thẻ từ khi rời phòng để tiết kiệm năng lượng và tăng tuổi thọ thiết bị.</span></li>
            </ul>
        </div>
    </div>

    <!-- 3. HỒ BƠI & SPA -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon teal"><i class="bi bi-water"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">03 /</span> Hồ bơi, Spa & Phòng tập</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Hồ bơi ngoài trời mở cửa <span class="tag-highlight tag-green">06:00 – 22:00</span>. Hồ bơi trong nhà (tầng 3) mở cửa <span class="tag-highlight tag-green">06:00 – 23:00</span>. Nhân viên cứu hộ trực tại hồ bơi trong toàn bộ giờ hoạt động.</span></li>
                <li><span class="dot"></span><span>Bắt buộc mặc <strong>trang phục bơi phù hợp</strong> khi sử dụng hồ bơi. Không mặc đồ lót, quần short vải cotton hoặc trang phục thường ngày xuống hồ bơi.</span></li>
                <li><span class="dot red"></span><span>Trẻ em dưới <strong>16 tuổi</strong> phải có người lớn giám sát trực tiếp khi ở khu vực hồ bơi. Trẻ dưới 5 tuổi bắt buộc đeo phao cứu sinh cá nhân.</span></li>
                <li><span class="dot"></span><span>Spa & Wellness Center mở cửa <span class="tag-highlight">09:00 – 21:00</span>. Vui lòng đặt lịch trước ít nhất 2 giờ qua lễ tân hoặc nội bộ số <span class="tag-highlight">5</span>. Khách hạng Suite được ưu tiên đặt lịch không phụ phí.</span></li>
                <li><span class="dot"></span><span>Phòng tập Fitness mở cửa <span class="tag-highlight">05:30 – 23:00</span> mỗi ngày. Yêu cầu mặc trang phục thể thao và sử dụng giày trong phòng tập. Khách sạn có huấn luyện viên cá nhân theo yêu cầu (đặt trước).</span></li>
                <li><span class="dot orange"></span><span>Không mang đồ ăn, thức uống vào khu vực hồ bơi. Dịch vụ Pool Bar phục vụ đồ uống và snack nhẹ trực tiếp tại ghế nằm từ 10:00 – 20:00.</span></li>
            </ul>
        </div>
    </div>

    <!-- 4. KHÁCH THĂM & AN NINH -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon"><i class="bi bi-shield-check"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">04 /</span> Khách thăm & An ninh</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot"></span><span>Khách thăm được phép vào phòng trong khung giờ <span class="tag-highlight">08:00 – 22:00</span> và phải đăng ký tại lễ tân. Ngoài giờ này, mọi khách thăm cần được sự đồng ý bằng văn bản từ khách lưu trú và được lễ tân xác nhận.</span></li>
                <li><span class="dot red"></span><span><strong>Nghiêm cấm</strong> cho người chưa đăng ký ở lại qua đêm trong phòng. Phát hiện vi phạm sẽ tính phí thêm người theo giá phòng hiện hành và có thể bị yêu cầu rời khách sạn.</span></li>
                <li><span class="dot"></span><span>Hệ thống camera an ninh HD hoạt động <strong>24/7</strong> tại tất cả khu vực công cộng: hành lang, thang máy, sảnh, bãi đỗ xe. Phòng nghỉ tuyệt đối không lắp camera để bảo vệ quyền riêng tư của quý khách.</span></li>
                <li><span class="dot gold"></span><span>Quý khách được khuyến khích sử dụng <strong>két an toàn điện tử trong phòng</strong> để bảo quản tiền mặt, giấy tờ và trang sức. Khách sạn không chịu trách nhiệm về tài sản không cất giữ trong két.</span></li>
                <li><span class="dot"></span><span>Đường dây khẩn cấp 24/7: gọi nội bộ <span class="tag-highlight">số 0</span> để kết nối lễ tân ngay lập tức. Tất cả các cửa tầng đều có khóa từ, chỉ mở bằng thẻ phòng đã kích hoạt.</span></li>
                <li><span class="dot red"></span><span><strong>Nghiêm cấm</strong> mang vũ khí, chất nổ, chất kích thích bất hợp pháp vào khách sạn dưới mọi hình thức. Vi phạm sẽ bị báo cáo cơ quan chức năng ngay lập tức.</span></li>
            </ul>
        </div>
    </div>

    <!-- 5. TRẺ EM & THÚ CƯNG -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon gold"><i class="bi bi-emoji-smile"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">05 /</span> Trẻ em & Thú cưng</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Trẻ em <span class="tag-highlight tag-green">dưới 10 tuổi</span> ngủ chung giường với bố/mẹ: <strong>Miễn phí hoàn toàn</strong> (không tính thêm người). Cung cấp miễn phí giường trẻ em (baby cot) theo yêu cầu, số lượng có hạn.</span></li>
                <li><span class="dot orange"></span><span>Trẻ em <span class="tag-highlight tag-orange">từ 10 – 16 tuổi</span> ngủ chung phòng với phụ huynh: phụ thu <strong>7% giá phòng/đêm/trẻ</strong>. Cần thêm giường phụ: phụ thu <strong>300.000 VND/đêm</strong> (đặt trước).</span></li>
                <li><span class="dot red"></span><span>Người <span class="tag-highlight tag-red">từ 16 tuổi trở lên</span> được tính như khách lưu trú đầy đủ. Trẻ vị thành niên dưới 18 tuổi không được nhận phòng độc lập nếu không có người giám hộ đi kèm.</span></li>
                <li><span class="dot red"></span><span><strong>Khách sạn không cho phép mang thú cưng</strong> vào bất kỳ khu vực nào trong khách sạn kể cả sảnh và nhà hàng, nhằm đảm bảo vệ sinh và an toàn cho tất cả quý khách.</span></li>
                <li><span class="dot green"></span><span>Khu vui chơi trẻ em (Kids' Club) mở cửa <span class="tag-highlight tag-green">08:00 – 20:00</span> miễn phí cho khách lưu trú, có nhân viên trông trẻ chuyên nghiệp. Phụ huynh cần ký xác nhận trước khi để trẻ tham gia.</span></li>
            </ul>
        </div>
    </div>

    <!-- 6. ĂN UỐNG & DỊCH VỤ -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon green"><i class="bi bi-cup-hot"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">06 /</span> Ăn uống & Dịch vụ</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Bữa sáng Buffet phục vụ từ <span class="tag-highlight tag-green">06:30 – 10:30</span> tại nhà hàng tầng 1. Hạng phòng <strong>Superior, Deluxe, Suite</strong> được bao gồm bữa sáng cho 2 người/phòng. Hạng Standard phụ thu <strong>250.000 VND/người</strong>.</span></li>
                <li><span class="dot"></span><span>Dịch vụ Room Service hoạt động <strong>24/7</strong>. Đặt món qua nội bộ số <span class="tag-highlight">1</span> hoặc tablet trong phòng. Phụ phí phục vụ <strong>15%</strong>; ngoài giờ 22:00–06:00 phụ thu thêm <strong>10%</strong>.</span></li>
                <li><span class="dot"></span><span>Nhà hàng chính phục vụ <strong>Ẩm thực Việt – Lào</strong>: Bữa trưa 11:30–14:30, Bữa tối 18:00–22:30. Cocktail Bar & Lounge mở cửa 16:00–24:00 tại tầng thượng (Sky Bar).</span></li>
                <li><span class="dot"></span><span>Minibar trong phòng được bổ sung mỗi ngày. Phí tiêu thụ tính vào hóa đơn phòng. Yêu cầu bổ sung thêm hoặc thay thế loại đồ uống liên hệ lễ tân qua nội bộ.</span></li>
                <li><span class="dot gold"></span><span>Dịch vụ tổ chức tiệc riêng tư, tiệc cưới, hội nghị có sẵn tại các phòng tiệc từ tầng 2–4. Liên hệ bộ phận <strong>Event & Banquet</strong> để được tư vấn gói dịch vụ phù hợp.</span></li>
            </ul>
            <div class="note-box">
                <i class="bi bi-info-circle-fill"></i>
                <span>Quý khách có dị ứng thực phẩm hoặc yêu cầu chế độ ăn đặc biệt (chay, thuần chay, halal, không gluten...) vui lòng thông báo khi đặt phòng hoặc trước 24 giờ để bếp chuẩn bị phù hợp.</span>
            </div>
        </div>
    </div>

    <!-- 7. WIFI & CÔNG NGHỆ -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon"><i class="bi bi-wifi"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">07 /</span> Wifi & Công nghệ</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Wifi tốc độ cao <span class="tag-highlight tag-green">miễn phí</span> toàn bộ khách sạn (phòng, sảnh, hồ bơi, nhà hàng). Tên mạng và mật khẩu in sẵn trên thẻ chào mừng trong phòng. Băng thông <strong>500 Mbps</strong>, hỗ trợ tối đa <strong>5 thiết bị/phòng</strong>.</span></li>
                <li><span class="dot"></span><span>Mỗi phòng được trang bị <strong>Smart TV 55"</strong> với Netflix, YouTube và kênh quốc tế. Điều khiển chiếu sáng, điều hòa, rèm tự động qua bảng điều khiển cảm ứng hoặc ứng dụng khách sạn.</span></li>
                <li><span class="dot"></span><span>Dịch vụ in ấn, scan tài liệu miễn phí tại Business Center tầng 2 (08:00–20:00). Ngoài giờ liên hệ lễ tân để hỗ trợ.</span></li>
                <li><span class="dot orange"></span><span>Khách sạn không chịu trách nhiệm về mất mát dữ liệu khi sử dụng mạng wifi công cộng. Khuyến khích dùng VPN khi xử lý thông tin nhạy cảm.</span></li>
            </ul>
            <div class="note-box note-box-blue">
                <i class="bi bi-phone"></i>
                <span>Tải ứng dụng <strong>DawnChill Hotel App</strong> để đặt dịch vụ, kiểm tra hóa đơn, chat với lễ tân và nhận ưu đãi độc quyền trong suốt thời gian lưu trú.</span>
            </div>
        </div>
    </div>

    <!-- 8. THANH TOÁN & HỦY PHÒNG -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon"><i class="bi bi-credit-card"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">08 /</span> Thanh toán & Hủy đặt phòng</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot green"></span><span>Hình thức thanh toán chấp nhận: <span class="tag-highlight tag-green">Tiền mặt (VND/USD)</span>, thẻ tín dụng/ghi nợ (Visa, Mastercard, JCB, UnionPay), chuyển khoản, ví điện tử (MoMo, ZaloPay, VNPay).</span></li>
                <li><span class="dot green"></span><span><strong>Giá linh hoạt (Flexible Rate):</strong> Hủy phòng trước <strong>48 giờ</strong> so với giờ check-in — <span class="tag-highlight tag-green">Hoàn tiền 100%</span> tiền đặt cọc.</span></li>
                <li><span class="dot orange"></span><span><strong>Giá linh hoạt:</strong> Hủy từ <strong>48–72 giờ</strong> sau khi đặt — Hoàn trả <span class="tag-highlight tag-orange">75%</span> tiền đặt cọc.</span></li>
                <li><span class="dot red"></span><span><strong>Giá linh hoạt:</strong> Hủy sau <strong>72 giờ</strong> kể từ lúc đặt — <span class="tag-highlight tag-red">Hoàn 50%</span> tiền đặt cọc.</span></li>
                <li><span class="dot red"></span><span><strong>Giá linh hoạt:</strong> Huỷ sau <strong>15:00</strong> ngày check-in — <span class="tag-highlight tag-red">Không hoàn tiền cọc</span>.</span></li>
                <li><span class="dot red"></span><span><strong>Giá linh hoạt:</strong> Đã nhận phòng — <span class="tag-highlight tag-red">Không hoàn tiền cọc</span>.</span></li>
                <li><span class="dot red"></span><span><strong>Giá không hoàn tiền (Non-refundable Rate):</strong> Mọi trường hợp hủy đều <span class="tag-highlight tag-red">không được hoàn tiền</span>. Bù lại, giá này thấp hơn 15–25% so với giá linh hoạt.</span></li>
                <li><span class="dot gold"></span><span>Trường hợp bất khả kháng có xác nhận (thiên tai, tai nạn, bệnh nặng cần nhập viện khẩn cấp) sẽ được xem xét hoàn tiền hoặc đổi ngày lưu trú theo từng trường hợp cụ thể.</span></li>
            </ul>
        </div>
    </div>

    <!-- 9. AN TOÀN CHÁY NỔ & MÔI TRƯỜNG -->
    <div class="policy-section">
        <div class="policy-section-header" onclick="toggleSection(this)">
            <div class="policy-icon red"><i class="bi bi-fire"></i></div>
            <h2 class="policy-section-title"><span class="policy-section-num">09 /</span> An toàn cháy nổ & Môi trường</h2>
            <i class="bi bi-chevron-down policy-chevron"></i>
        </div>
        <div class="policy-section-body">
            <ul class="policy-list">
                <li><span class="dot red"></span><span><strong>Nghiêm cấm tuyệt đối</strong> mang vào khách sạn các chất dễ cháy, nổ, chất độc hại, chất lỏng dễ bắt lửa (xăng, cồn nồng độ cao...) dưới bất kỳ hình thức nào.</span></li>
                <li><span class="dot red"></span><span><strong>Không đốt nến, hương, nhang, đèn cầy</strong> trong phòng và khu vực trong nhà. Cảm biến khói nhạy cảm sẽ kích hoạt hệ thống báo cháy và sprinkler nếu có khói.</span></li>
                <li><span class="dot"></span><span>Hệ thống <strong>báo cháy & chữa cháy tự động</strong> hoạt động 24/7 theo tiêu chuẩn PCCC quốc gia. Diễn tập thoát hiểm định kỳ mỗi 6 tháng. Bản đồ thoát hiểm dán phía sau cửa phòng — vui lòng đọc khi nhận phòng.</span></li>
                <li><span class="dot"></span><span>Lối thoát hiểm bố trí tại cuối mỗi hành lang, có đèn xanh chỉ dẫn phát sáng kể cả khi mất điện. <strong>Không sử dụng thang máy khi có sự cố cháy nổ.</strong></span></li>
                <li><span class="dot green"></span><span>Chương trình <strong>Green Stay:</strong> Lưu trú từ 2 đêm trở lên có thể chọn không thay ga/khăn hằng ngày để tiết kiệm nước. Khách sạn trồng 1 cây xanh cho mỗi 10 đêm lưu trú đăng ký chương trình này.</span></li>
                <li><span class="dot green"></span><span>Rác thải được phân loại với 3 thùng tại mỗi phòng: <span class="tag-highlight tag-green">Tái chế</span>, <span class="tag-highlight tag-red">Hữu cơ</span>, <span class="tag-highlight">Nguy hại</span>. Thu gom 2 lần/ngày. Khách sạn cam kết <strong>Zero Plastic</strong> — không sử dụng nhựa dùng một lần.</span></li>
            </ul>
        </div>
    </div>

    <!-- QUYỀN CỦA KHÁCH -->
    <div class="policy-rights">
        <h3><i class="bi bi-patch-check-fill"></i> Cam kết của Khách sạn đối với Quý khách</h3>
        <ul>
            <li><i class="bi bi-check-circle-fill"></i><span>Bảo mật tuyệt đối thông tin cá nhân — không chia sẻ cho bên thứ ba khi chưa có sự đồng ý.</span></li>
            <li><i class="bi bi-check-circle-fill"></i><span>Quyền khiếu nại và phản hồi 24/7 qua lễ tân, email hoặc ứng dụng. Phản hồi trong vòng 2 giờ.</span></li>
            <li><i class="bi bi-check-circle-fill"></i><span>Môi trường lưu trú an toàn, không phân biệt đối xử dưới mọi hình thức.</span></li>
            <li><i class="bi bi-check-circle-fill"></i><span>Thông tin về phí dịch vụ luôn minh bạch, niêm yết rõ ràng — không phát sinh phí ẩn.</span></li>
            <li><i class="bi bi-check-circle-fill"></i><span>Hỗ trợ người khuyết tật: thang máy, phòng tiêu chuẩn accessibility, xe lăn miễn phí.</span></li>
            <li><i class="bi bi-check-circle-fill"></i><span>Đảm bảo chất lượng dịch vụ đúng với hạng phòng đã đặt. Trường hợp không đáp ứng được, khách sạn có trách nhiệm sắp xếp phòng tương đương hoặc hoàn tiền.</span></li>
        </ul>
    </div>

    <div class="policy-footer-note">
        <div class="policy-footer-logo">Dawn<span>Chill</span> Hotel</div>
        <div class="stars">★★★★★</div>
        <p style="margin: 10px 0 4px; color: #777; font-size: 13px;">Bằng việc nhận phòng, quý khách xác nhận đã đọc và đồng ý tuân thủ toàn bộ nội quy trên.<br>Nội quy có thể được cập nhật theo quy định pháp luật và chính sách khách sạn.</p>
        <div>
            <a class="hotline" href="tel:19006868"><i class="bi bi-telephone-fill"></i> Lễ tân 24/7: 1900 6868</a>
        </div>
        <p style="margin-top: 14px; color: #aaa; font-size: 12px;">📧 info@dawnchill.vn &nbsp;|&nbsp; 🌐 www.dawnchill.vn &nbsp;|&nbsp; Cập nhật lần cuối: 01/01/2025</p>
    </div>

</div>

<?php require('inc/footer.php'); ?>

<script>
function toggleSection(header) {
    const body = header.nextElementSibling;
    const chevron = header.querySelector('.policy-chevron');
    const isOpen = body.style.display !== 'none' && body.style.display !== '';
    if (isOpen) {
        body.style.display = 'none';
        chevron.style.transform = 'rotate(-90deg)';
    } else {
        body.style.display = 'block';
        chevron.style.transform = 'rotate(0deg)';
    }
}
// Mặc định mở tất cả section
document.querySelectorAll('.policy-section-body').forEach(b => b.style.display = 'block');
document.querySelectorAll('.policy-chevron').forEach(c => c.style.transform = 'rotate(0deg)');
</script>
</body>
</html>