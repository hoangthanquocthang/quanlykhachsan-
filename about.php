<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Về chúng tôi</title>
    <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

    .about-title {
        font-family: 'Cormorant Garamond', serif;
        text-align: center;
        margin: 50px 0 20px;
        padding: 0 16px;
    }

    .about-intro {
        text-align: center;
        margin-top: 12px;
        color: #555;
        line-height: 1.8;
    }

    /* ── About intro card ── */
    .about-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
        max-width: 1140px;
        margin: 30px auto 0;
        padding: 0 16px;
    }

    .about-text {
        flex: 1 1 400px;
        order: 1;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        padding: 28px;
        transition: 0.3s;
    }

    .about-text:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .about-text h3 {
        font-size: 17px;
        font-weight: 700;
        color: #1a1208;
        margin: 0 0 14px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eee;
    }

    .about-text p {
        font-size: 14.5px;
        color: #555;
        line-height: 1.8;
        margin: 0;
    }

    .about-img {
        flex: 1 1 300px;
        order: 2;
        border: 1px solid #ddd;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        overflow: hidden;
        transition: 0.3s;
    }

    .about-img:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .about-img img {
        width: 100%;
        display: block;
        object-fit: cover;
    }

    /* ── Stats ── */
    .stats-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1140px;
        margin: 30px auto 0;
        padding: 0 16px;
    }

    .stat-box {
        flex: 1 1 200px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        padding: 28px 16px;
        text-align: center;
        transition: 0.3s;
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .stat-box img {
        width: 60px;
    }

    .stat-box h4 {
        margin-top: 12px;
        margin-bottom: 0;
        font-size: 15px;
        font-weight: 700;
        color: #1a1208;
    }

    /* ── Team section title ── */
    .team-title {
        margin: 50px 0 24px;
        text-align: center;
        font-weight: 700;
        font-size: 20px;
        color: #1a1208;
    }

    /* ── Team cards (swiper slides) ── */
    .team-wrap {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 16px 50px;
    }

    .team-wrap .swiper-slide {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 20px 16px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        transition: 0.3s;
        overflow: hidden;
    }

    .team-wrap .swiper-slide:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .team-wrap .swiper-slide img {
        width: 100%;
        height: auto;
        max-height: 260px;
        object-fit: contain;
        background: #f8f8f8;
        border-radius: 8px;
    }

    .team-wrap .swiper-slide h5 {
        margin: 12px 0 0;
        font-size: 15px;
        font-weight: 600;
        color: #1a1208;
    }

    .swiper-pagination-bullet-active {
        background: #B88B4A !important;
    }

    @media (max-width: 767px) {
        .about-text { order: 2; }
        .about-img  { order: 1; }
        .stat-box   { flex: 1 1 140px; }
    }
    </style>
</head>

<body style="background:#faf8f4;">

    <?php require('inc/header.php'); ?>

    <div class="about-title">
        <h2 class="fw-bold h-font">VỀ CHÚNG TÔI</h2>
        <div class="h-line"></div>
        <p class="about-intro">
            Sinh viên K47 - Trường Đại Quy Nhơn - Khoa Công nghệ Thông tin <br>
            Nhóm 2
        </p>
    </div>

    <div class="about-row">
        <div class="about-text">
            <h3>Lời cảm ơn</h3>
            <p>
                Chúng em xin được bày tỏ lòng biết ơn sâu sắc đến toàn thể quý thầy, cô trường Đại học Quy Nhơn –
                Khoa Công Nghệ Thông Tin đã tận tình giảng dạy, truyền đạt kiến thức, giúp đỡ và hỗ trợ chúng em
                trong suốt những năm tháng học tập tại trường. <br><br>

                Những kiến thức và kỹ năng mà quý thầy, cô đã trao truyền không chỉ là nền tảng vững chắc để chúng em
                hoàn thành khóa luận tốt nghiệp, mà còn là hành trang quý giá cho chặng đường sự nghiệp phía trước. <br><br>

                Đặc biệt, chúng em xin gửi lời cảm ơn chân thành và sâu sắc nhất đến cô <strong>Võ Thị Mỹ</strong> –
                người đã trực tiếp hướng dẫn, hỗ trợ và đồng hành cùng chúng em trong suốt quá trình thực hiện đề tài.
                Sự tận tâm, những góp ý quý báu và sự động viên kịp thời của cô đã giúp chúng em vượt qua nhiều khó
                khăn để hoàn thành khóa luận này. <br><br>

                Cuối cùng, chúng em xin gửi lời cảm ơn đến gia đình, bạn bè và các thành viên trong nhóm đã luôn
                đồng hành, ủng hộ và tạo động lực cho chúng em trong suốt thời gian qua. Chúng em xin chân thành cảm ơn!
            </p>
        </div>
        <div class="about-img">
            <img src="images/about/about.jpg">
        </div>
    </div>

    <div class="stats-row">
        <div class="stat-box">
            <img src="images/about/hotel.svg">
            <h4>100+ PHÒNG</h4>
        </div>
        <div class="stat-box">
            <img src="images/about/customers.svg">
            <h4>200+ KHÁCH HÀNG</h4>
        </div>
        <div class="stat-box">
            <img src="images/about/rating.svg">
            <h4>150+ ĐÁNH GIÁ</h4>
        </div>
        <div class="stat-box">
            <img src="images/about/staff.svg">
            <h4>50+ NHÂN SỰ</h4>
        </div>
    </div>

    <h3 class="team-title h-font">CÁC THÀNH VIÊN TRONG NHÓM</h3>

    <div class="team-wrap">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper" style="margin-bottom:30px;">
                <?php 
          $about_r = selectAll('team_details');
          $path = ABOUT_IMG_PATH;
          while($row = mysqli_fetch_assoc($about_r)){
            echo<<<data
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="$path$row[picture]" class="w-100">
                <h5 class="mt-2">$row[name]</h5>
              </div>
            data;
          }
        ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        slidesPerView: 3,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            320: { slidesPerView: 1 },
            640: { slidesPerView: 1 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 3 },
        }
    });
    </script>

</body>

</html>