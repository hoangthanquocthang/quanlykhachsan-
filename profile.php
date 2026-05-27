<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Hồ sơ cá nhân</title>
    <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

        .profile-wrap {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 16px 60px;
        }

        /* ── Header ── */
        .profile-header {
            padding: 36px 0 24px;
        }

        .profile-header h2 {
            font-weight: 700;
            font-size: 26px;
            color: #1a1208;
            margin-bottom: 6px;
        }

        .profile-header .breadcrumb {
            font-size: 14px;
            color: #888;
        }

        .profile-header .breadcrumb a {
            color: #B88B4A;
            text-decoration: none;
            font-weight: 500;
        }

        .profile-header .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ── Cards đồng bộ ── */
        .profile-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            padding: 28px;
            margin-bottom: 24px;
            transition: 0.3s;
        }

        .profile-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-card h5 {
            font-size: 15px;
            font-weight: 700;
            color: #1a1208;
            margin: 0 0 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #B88B4A;
            display: inline-block;
        }

        /* ── Grids ── */
        .form-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .form-grid-4-8 {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 16px;
        }

        .profile-bottom-row {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .profile-avatar-card {
            flex: 1 1 280px;
        }

        .profile-pass-card {
            flex: 2 1 420px;
        }

        /* ── Form inputs ── */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 4px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #666;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            color: #222;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184,139,74, 0.08);
        }

        .form-group input[type="file"] {
            padding: 8px 10px;
            cursor: pointer;
            border-radius: 8px;
            border: 1px dashed #ddd;
            background: #fafafa;
        }

        .form-group textarea {
            resize: none;
        }

        /* ── Avatar ── */
        .avatar-wrapper {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            padding: 16px;
            background: #faf8f4;
            border-radius: 10px;
            border: 1px solid #eee;
        }

        .avatar-img {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--gold);
            flex-shrink: 0;
        }

        .avatar-name {
            font-weight: 700;
            font-size: 16px;
            color: #1a1208;
        }

        .avatar-label {
            font-size: 13px;
            color: #888;
            margin-top: 2px;
        }

        /* ── Save button ── */
        .btn-save {
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
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        }

        .btn-save:hover {
            background: #174ea6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(184,139,74, 0.25);
        }

        @media (max-width: 768px) {
            .form-grid-3 {
                grid-template-columns: 1fr 1fr;
            }

            .form-grid-4-8 {
                grid-template-columns: 1fr;
            }

            .form-grid-2 {
                grid-template-columns: 1fr;
            }

            .profile-bottom-row {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .form-grid-3 {
                grid-template-columns: 1fr;
            }
        }

        /* ── Loyalty Widget ── */
        :root { --loy-accent: #B88B4A; }
        .loyalty-card {
            background: linear-gradient(135deg, #1a1208, #2e200e);
            border-radius: 14px;
            padding: 26px 28px;
            margin-bottom: 24px;
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: background 0.5s ease;
        }
        .loyalty-card::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 180px; height: 180px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--loy-accent) 12%, transparent);
        }
        .loyalty-card::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -30px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--loy-accent) 7%, transparent);
        }
        .loyalty-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            position: relative;
            z-index: 1;
        }
        .loyalty-tier-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .03em;
        }
        .loyalty-pts-big {
            font-size: 38px;
            font-weight: 800;
            color: #f0c96b;
            line-height: 1;
        }
        .loyalty-pts-lbl {
            font-size: 13px;
            color: rgba(255,255,255,.65);
            margin-top: 4px;
        }
        .loyalty-progress-wrap {
            margin-top: 18px;
            position: relative;
            z-index: 1;
        }
        .loyalty-progress-bar {
            height: 8px;
            border-radius: 8px;
            background: rgba(255,255,255,.15);
            overflow: hidden;
            margin: 6px 0;
        }
        .loyalty-progress-bar span {
            display: block;
            height: 100%;
            border-radius: 8px;
            background: linear-gradient(90deg, #B88B4A, #f0c96b);
            transition: width .8s ease;
        }
        .loyalty-progress-labels {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: rgba(255,255,255,.6);
        }
        .loyalty-history-title {
            font-size: 14px;
            font-weight: 700;
            color: #1a1208;
            margin: 18px 0 10px;
            padding-bottom: 8px;
            border-bottom: 2px solid #B88B4A;
            display: inline-block;
        }
        .loyalty-hist-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .loyalty-hist-table th {
            background: #f5f0e8;
            padding: 8px 10px;
            text-align: center;
            border: 1px solid #ece6d8;
            color: #555;
            font-weight: 600;
        }
        .loyalty-hist-table td {
            padding: 8px 10px;
            border: 1px solid #ece6d8;
            text-align: center;
            color: #333;
        }
        .loyalty-hist-table tbody tr:hover { background: rgba(255,255,255,.06); }
    </style>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }
    $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']], 's');
    if (mysqli_num_rows($u_exist) == 0) {
        redirect('index.php');
    }
    $u_fetch = mysqli_fetch_assoc($u_exist);
    ?>

    <div class="profile-wrap">

        <div class="profile-header">
            <h2>Thông tin của tôi</h2>
            <div class="breadcrumb">
                <a href="index.php">Trang chủ</a>
                <span> > </span>
                <a href="#">Hồ sơ cá nhân</a>
            </div>
        </div>

        <!-- Hạng thành viên & Điểm tích lũy -->
        <div class="loyalty-card" id="loyalty-widget">
            <div class="loyalty-top">
                <div>
                    <div id="loy-tier-badge" class="loyalty-tier-badge" style="background:rgba(255,255,255,.12);">
                        ⭐ Member
                    </div>
                    <div style="margin-top:10px;font-size:13px;color:rgba(255,255,255,.6);">Điểm hiện có</div>
                    <div class="loyalty-pts-big" id="loy-pts">—</div>
                    <div class="loyalty-pts-lbl">Tổng tích lũy: <span id="loy-total">—</span> điểm</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:rgba(255,255,255,.5);margin-bottom:4px;">Quy đổi</div>
                    <div style="font-size:13px;color:#f0c96b;font-weight:600;">50.000₫ chi tiêu = 1 điểm</div>
                    <div style="font-size:13px;color:#f0c96b;font-weight:600;">1 điểm = 1.000₫ giảm giá</div>
                </div>
            </div>
            <div class="loyalty-progress-wrap" id="loy-progress-wrap" style="display:none;">
                <div class="loyalty-progress-labels">
                    <span id="loy-cur-tier">—</span>
                    <span id="loy-next-tier">—</span>
                </div>
                <div class="loyalty-progress-bar">
                    <span id="loy-progress-fill" style="width:0%"></span>
                </div>
                <div style="font-size:12px;color:rgba(255,255,255,.55);margin-top:4px;">
                    Cần thêm <strong id="loy-need" style="color:#f0c96b;"></strong> điểm để lên hạng
                </div>
            </div>
            <div style="margin-top:18px;position:relative;z-index:1;">
                <div class="loyalty-history-title" style="color:rgba(255,255,255,.8);border-color:rgba(184,139,74,.5);">Lịch sử điểm gần nhất</div>
                <table class="loyalty-hist-table" style="color:rgba(255,255,255,.85);">
                    <thead>
                        <tr>
                            <th style="background:rgba(255,255,255,.07);border-color:rgba(255,255,255,.1);color:rgba(255,255,255,.85);">Thời gian</th>
                            <th style="background:rgba(255,255,255,.07);border-color:rgba(255,255,255,.1);color:rgba(255,255,255,.85);">Loại</th>
                            <th style="background:rgba(255,255,255,.07);border-color:rgba(255,255,255,.1);color:rgba(255,255,255,.85);">Điểm</th>
                            <th style="background:rgba(255,255,255,.07);border-color:rgba(255,255,255,.1);color:rgba(255,255,255,.85);">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody id="loy-hist-body">
                        <tr><td colspan="4" style="text-align:center;padding:14px;color:rgba(255,255,255,.35);">Đang tải...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Thông tin cơ bản -->
        <div class="profile-card">
            <form id="info-form">
                <h5>Thông tin cơ bản</h5>
                <div class="form-grid-3">
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="name" type="text" value="<?php echo $u_fetch['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input name="phonenum" type="number" value="<?php echo $u_fetch['phonenum'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày tháng năm sinh</label>
                        <input name="dob" type="date" value="<?php echo $u_fetch['dob'] ?>" required>
                    </div>
                </div>
                <div class="form-grid-4-8" style="margin-top:14px;">
                    <div class="form-group">
                        <label>Mã định danh</label>
                        <input name="pincode" type="number" value="<?php echo $u_fetch['pincode'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea name="address" rows="1" required><?php echo $u_fetch['address'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn-save">Lưu thay đổi</button>
            </form>
        </div>

        <!-- Ảnh đại diện + Đổi mật khẩu -->
        <div class="profile-bottom-row">

            <div class="profile-avatar-card">
                <div class="profile-card" style="margin-bottom:0;">
                    <form id="profile-form">
                        <h5>Ảnh đại diện</h5>
                        <div class="avatar-wrapper">
                            <img src="<?php echo USERS_IMG_PATH . $u_fetch['profile'] ?>" class="avatar-img">
                            <div>
                                <div class="avatar-name"><?php echo $u_fetch['name'] ?></div>
                                <div class="avatar-label">Ảnh hiện tại</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cập nhật ảnh mới</label>
                            <input name="profile" type="file" accept=".jpg,.jpeg,.png,.webp" required>
                        </div>
                        <button type="submit" class="btn-save">Lưu thay đổi</button>
                    </form>
                </div>
            </div>

            <div class="profile-pass-card">
                <div class="profile-card" style="margin-bottom:0;">
                    <form id="pass-form">
                        <h5>Đổi mật khẩu</h5>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input name="new_pass" type="password" required>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu mới</label>
                                <input name="confirm_pass" type="password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-save">Lưu thay đổi</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <?php require('inc/footer.php'); ?>

    <script>
        let info_form = document.getElementById('info-form');

        info_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let data = new FormData();
            data.append('info_form', '');
            data.append('name', info_form.elements['name'].value);
            data.append('phonenum', info_form.elements['phonenum'].value);
            data.append('address', info_form.elements['address'].value);
            data.append('pincode', info_form.elements['pincode'].value);
            data.append('dob', info_form.elements['dob'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'phone_already') {
                    alert('error', "Số điện thoại này đã được đăng ký!");
                } else if (this.responseText == 0) {
                    alert('error', "Không có thay đổi ghi nhận!");
                } else {
                    alert('success', 'Cập nhật thành công!');
                }
            }

            xhr.send(data);
        });

        let profile_form = document.getElementById('profile-form');

        profile_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let data = new FormData();
            data.append('profile_form', '');
            data.append('profile', profile_form.elements['profile'].files[0]);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'inv_img') {
                    alert('error', "Chỉ hỗ trợ định dạng JPG, WEBP & PNG!");
                } else if (this.responseText == 'upd_failed') {
                    alert('error', "Tải hình ảnh thất bại!");
                } else if (this.responseText == 0) {
                    alert('error', "Cập nhật thất bại!");
                } else {
                    window.location.href = window.location.pathname;
                }
            }

            xhr.send(data);
        });

        let pass_form = document.getElementById('pass-form');

        pass_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let new_pass = pass_form.elements['new_pass'].value;
            let confirm_pass = pass_form.elements['confirm_pass'].value;

            if (new_pass != confirm_pass) {
                alert('error', 'Mật khẩu không trùng khớp!');
                return false;
            }

            let data = new FormData();
            data.append('pass_form', '');
            data.append('new_pass', new_pass);
            data.append('confirm_pass', confirm_pass);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'mismatch') {
                    alert('error', "Mật khẩu không trùng khớp!");
                } else if (this.responseText == 0) {
                    alert('error', "Cập nhật thất bại!");
                } else {
                    alert('success', 'Cập nhật thành công!');
                    pass_form.reset();
                }
            }

            xhr.send(data);
        });
    </script>
    <script>
    // ── Loyalty widget ──────────────────────────────────────
    (function loadLoyalty() {
        const TIERS = [
            { name: 'Member',   icon: '⭐', color: '#6c757d', cardBg: 'linear-gradient(135deg,#1c1f25,#2e333d)', min: 0,     max: 999   },
            { name: 'Silver',   icon: '🥈', color: '#7a8fa6', cardBg: 'linear-gradient(135deg,#111820,#1e2e3d)', min: 1000,  max: 4999  },
            { name: 'Gold',     icon: '🥇', color: '#B88B4A', cardBg: 'linear-gradient(135deg,#1a1208,#2e200e)', min: 5000,  max: 14999 },
            { name: 'Platinum', icon: '💎', color: '#5b6ee1', cardBg: 'linear-gradient(135deg,#0e0e24,#1a1a3e)', min: 15000, max: null  },
        ];

        function getTier(total) {
            for (let i = TIERS.length - 1; i >= 0; i--) {
                if (total >= TIERS[i].min) return { idx: i, ...TIERS[i] };
            }
            return { idx: 0, ...TIERS[0] };
        }

        let data = new FormData();
        data.append('get_loyalty_info', '');
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/loyalty.php', true);
        xhr.onload = function () {
            try { var d = JSON.parse(this.responseText); } catch(e) { return; }
            if (d.error) return;

            // Điểm & hạng
            document.getElementById('loy-pts').textContent   = d.points.toLocaleString('vi-VN');
            document.getElementById('loy-total').textContent = d.total_earned.toLocaleString('vi-VN');

            let tier = getTier(d.total_earned);
            let badge = document.getElementById('loy-tier-badge');
            badge.textContent = tier.icon + ' ' + tier.name;
            badge.style.background = tier.color + '99';
            badge.style.border = '1.5px solid ' + tier.color;

            // Đổi màu nền card theo hạng
            let card = document.getElementById('loyalty-widget');
            if (card) card.style.background = tier.cardBg;
            // Đổi màu accent (vòng trang trí ::before / ::after) — ghi đè qua CSS variable
            document.documentElement.style.setProperty('--loy-accent', tier.color);

            // Progress bar
            let nextTier = TIERS[tier.idx + 1];
            if (nextTier) {
                let progress = Math.min(100, ((d.total_earned - tier.min) / (nextTier.min - tier.min)) * 100);
                document.getElementById('loy-cur-tier').textContent  = tier.icon + ' ' + tier.name;
                document.getElementById('loy-next-tier').textContent = nextTier.icon + ' ' + nextTier.name;
                document.getElementById('loy-progress-fill').style.width = progress.toFixed(1) + '%';
                document.getElementById('loy-need').textContent = (nextTier.min - d.total_earned).toLocaleString('vi-VN');
                document.getElementById('loy-progress-wrap').style.display = 'block';
            }

            // Lịch sử
            let tbody = document.getElementById('loy-hist-body');
            if (!d.history || d.history.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" style="text-align:center;padding:12px;color:rgba(255,255,255,.35);">Chưa có giao dịch nào</td></tr>';
                return;
            }
            tbody.innerHTML = '';
            const TIER_COLORS = {
                'Member':   { pos: '#a8b5be', neg: '#e07a7a' },
                'Silver':   { pos: '#b0cce0', neg: '#d4a0b0' },
                'Gold':     { pos: '#f0c96b', neg: '#e07b4a' },
                'Platinum': { pos: '#8b9ff5', neg: '#c47ae0' },
            };
            let tc = TIER_COLORS[tier.name] || { pos: '#6fe69e', neg: '#ff7a7a' };
            d.history.forEach(function (h) {
                let sign  = h.points >= 0 ? '+' : '';
                let color = h.points >= 0 ? tc.pos : tc.neg;
                let label = { earn: '🎯 Tích điểm', redeem: '🎁 Dùng điểm', adjust: '⚙️ Điều chỉnh' }[h.type] || h.type;
                let date  = h.created_at.substring(0, 16).split(' ').reverse().join(' ');
                tbody.innerHTML += `<tr style="border-color:rgba(255,255,255,.1);">
                    <td style="border-color:rgba(255,255,255,.1);font-size:12px;color:rgba(255,255,255,.9);">${date}</td>
                    <td style="border-color:rgba(255,255,255,.1);color:rgba(255,255,255,.9);">${label}</td>
                    <td style="border-color:rgba(255,255,255,.1);font-weight:700;color:${color};">${sign}${parseInt(h.points).toLocaleString('vi-VN')}</td>
                    <td style="border-color:rgba(255,255,255,.1);font-size:12px;color:rgba(255,255,255,.85);">${h.note || ''}</td>
                </tr>`;
            });
        };
        xhr.send(data);
    })();
    </script>

</body>

</html>