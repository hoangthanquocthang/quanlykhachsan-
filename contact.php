<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <title><?php echo $settings_r['site_title'] ?> - Liên hệ</title>
  <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

  .contact-wrap {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 16px 60px;
  }

  .contact-title {
        font-family: 'Cormorant Garamond', serif; letter-spacing:1px;
    text-align: center;
    margin: 50px 0 30px;
    padding: 0 16px;
  }

  .contact-title p {
    margin-top: 12px;
    line-height: 1.8;
    color: #555;
  }

  .contact-row {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
  }

  /* ── Cards đồng bộ với rooms / facilities ── */
  .contact-left,
  .contact-right {
    flex: 1 1 420px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    box-shadow: 0 4px 18px rgba(184,139,74,0.06);
    padding: 28px;
    transition: 0.3s;
  }

  .contact-left:hover,
  .contact-right:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 28px rgba(184,139,74,0.15);
  }

  /* Map */
  .contact-left iframe {
    width: 100%;
    height: 260px;
    border: none;
    border-radius: 8px;
    display: block;
    margin-bottom: 20px;
  }

  /* Info rows */
  .contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
  }

  .contact-info-item:last-of-type {
    border-bottom: none;
  }

  .contact-info-icon {
    width: 36px; height: 36px;
    background: #faf8f4;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    color: #B88B4A;
    flex-shrink: 0;
  }

  .contact-info-text label {
    display: block;
    font-size: 11px;
    font-weight: 600;
    color: #999;
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-bottom: 3px;
  }

  .contact-info-text a,
  .contact-info-text span {
    font-size: 14px;
    color: #222;
    text-decoration: none;
    line-height: 1.5;
  }

  .contact-info-text a:hover { color: #B88B4A; }

  /* Social */
  .social-icons {
    display: flex;
    gap: 10px;
    margin-top: 4px;
  }

  .social-icons a {
    width: 36px; height: 36px;
    border-radius: 8px;
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 17px;
    color: #444;
    text-decoration: none;
    transition: 0.2s;
  }

  .social-icons a:hover {
    background: linear-gradient(135deg,#B88B4A,#9a7035);
    border-color: var(--gold);
    color: #fff;
  }

  /* Form title */
  .form-title {
    font-size: 17px;
    font-weight: 700;
    color: #B88B4A;
    margin: 0 0 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid #eee;
  }

  /* Form */
  .form-group {
    display: flex;
    flex-direction: column;
    margin-top: 14px;
  }

  .form-group label {
    font-weight: 500;
    margin-bottom: 6px;
    font-size: 13px;
    color: #555;
  }

  .form-group input,
  .form-group textarea {
    padding: 10px 13px;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 14px;
    font-family: inherit;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    color: #222;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(184,139,74,0.08);
  }

  .form-group textarea { resize: none; }

  .btn-submit {
    margin-top: 18px;
    padding: 11px 28px;
    background: linear-gradient(135deg,#B88B4A,#9a7035);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: background 0.2s, transform 0.15s;
  }

  .btn-submit:hover {
    background: #174ea6;
    transform: translateY(-2px);
  }
  </style>
</head>
<body style="background:#faf8f4;">

  <?php require('inc/header.php'); ?>

  <div class="contact-title">
    <h2 class="fw-bold h-font">LIÊN HỆ</h2>
    <div class="h-line"></div>
    <p>
      Chúng tôi luôn sẵn sàng hỗ trợ bạn! <br>
      Liên hệ ngay qua hotline, email, hoặc biểu mẫu trực tuyến để được tư vấn và giải đáp thắc mắc. <br>
      Đội ngũ của chúng tôi sẽ phản hồi nhanh chóng, đảm bảo mang đến sự hài lòng cho quý khách.
    </p>
  </div>

  <div class="contact-wrap">
    <div class="contact-row">

      <!-- Thông tin liên hệ -->
      <div class="contact-left">
        <iframe src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>

        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
          <div class="contact-info-text">
            <label>Địa chỉ</label>
            <a href="<?php echo $contact_r['gmap'] ?>" target="_blank"><?php echo $contact_r['address'] ?></a>
          </div>
        </div>

        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="bi bi-telephone-fill"></i></div>
          <div class="contact-info-text">
            <label>Tổng đài viên</label>
            <a href="tel:+<?php echo $contact_r['pn1'] ?>">+<?php echo $contact_r['pn1'] ?></a>
          </div>
        </div>

        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="bi bi-envelope-fill"></i></div>
          <div class="contact-info-text">
            <label>Email</label>
            <a href="mailto:<?php echo $contact_r['email'] ?>"><?php echo $contact_r['email'] ?></a>
          </div>
        </div>

        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="bi bi-share-fill"></i></div>
          <div class="contact-info-text">
            <label>Theo dõi chúng tôi</label>
            <div class="social-icons">
              <?php if($contact_r['tw']!=''): ?>
                <a href="<?php echo $contact_r['tw'] ?>"><i class="bi bi-twitter"></i></a>
              <?php endif; ?>
              <a href="<?php echo $contact_r['fb'] ?>"><i class="bi bi-facebook"></i></a>
              <a href="<?php echo $contact_r['insta'] ?>"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Form liên hệ -->
      <div class="contact-right">
        <form method="POST">
          <p class="form-title">Để lại lời nhắn</p>

          <div class="form-group">
            <label>Tên</label>
            <input name="name" type="text" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" required>
          </div>
          <div class="form-group">
            <label>Tiêu đề</label>
            <input name="subject" type="text" required>
          </div>
          <div class="form-group">
            <label>Nội dung</label>
            <textarea name="message" rows="5" required></textarea>
          </div>

          <button type="submit" name="send" class="btn-submit">Gửi</button>
        </form>
      </div>

    </div>
  </div>

  <?php 
    if(isset($_POST['send'])) {
      $frm_data = filteration($_POST);
      $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
      $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
      $res = insert($q, $values, 'ssss');
      if($res == 1){
        alert('success', 'Email đã được gửi đi!');
      } else {
        alert('error', 'Hệ thống đang được bảo trì! Hãy thử lại sau ít phút.');
      }
    }
  ?>

  <?php require('inc/footer.php'); ?>

</body>
</html>