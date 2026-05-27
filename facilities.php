<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Tiện ích</title>

    <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

    body {
        font-family: 'DM Sans', sans-serif;
        background: #faf8f4;
        margin: 0;
        font-family: 'DM Sans', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 15px;
    }

    .text-center {
        text-align: center;
    }

    .fw-bold {
        font-weight: bold;
    }

    .my-5 {
        margin: 50px 0;
    }

    .mt-3 {
        margin-top: 15px;
    }

    .mb-5 {
        margin-bottom: 30px;
    }

    .px-4 {
        padding: 0 20px;
    }

    /* title line */
    .h-line {
        width: 150px;
        height: 2px;
        background: #B88B4A;
        margin: 10px auto;
    }

    /* row */
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        flex: 0 0 calc(25% - 15px);
        max-width: calc(25% - 15px);
        box-sizing: border-box;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 18px rgba(184,139,74,0.06);
        transition: 0.3s;
    }

    @media (max-width: 1100px) {
        .card { flex: 0 0 calc(33.33% - 14px); max-width: calc(33.33% - 14px); }
    }

    @media (max-width: 768px) {
        .card { flex: 0 0 calc(50% - 10px); max-width: calc(50% - 10px); }
    }

    @media (max-width: 480px) {
        .card { flex: 0 0 100%; max-width: 100%; }
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .flex {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eee;
    }

    .icon {
        width: 36px;
        height: 36px;
        object-fit: contain;
        flex-shrink: 0;
    }

    .flex h5 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: #B88B4A;
    }

    p {
        margin: 0;
        font-size: 13.5px;
        color: #555;
        line-height: 1.6;
    }
    </style>
</head>

<body style="background:#faf8f4;">

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4 text-center">
        <h2 class="fw-bold">TIỆN ÍCH</h2>
        <div class="h-line"></div>
        <p class="mt-3">
            Khách sạn cung cấp đầy đủ tiện nghi hiện đại như Wi-Fi tốc độ cao, máy lạnh, truyền hình, và máy nước nóng.
            <br>
            Quý khách có thể thư giãn tại spa, tận hưởng không gian ban công thoáng mát, hoặc sử dụng khu bếp tiện nghi
            và ghế sofa êm ái. <br>
            Chúng tôi cam kết mang đến trải nghiệm nghỉ dưỡng thoải mái và trọn vẹn.
        </p>
    </div>

    <div class="container mb-5">
        <div class="row">
            <?php 
        $res = selectAll('facilities');
        $path = FACILITIES_IMG_PATH;

        while($row = mysqli_fetch_assoc($res)){
          echo<<<data
            <div class="card">
              <div class="flex">
                <img src="$path$row[icon]" class="icon">
                <h5>$row[name]</h5>
              </div>
              <p>$row[description]</p>
            </div>
          data;
        }
      ?>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

</body>

</html>