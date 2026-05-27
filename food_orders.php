<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> - Lịch sử đặt món</title>
    <style>
    :root {
        --gold:       #B88B4A;
        --gold-dark:  #9a7035;
        --gold-light: #fdf6e9;
        --ink:        #1a1208;
        --muted:      #6b7280;
        --border:     #e8e0d5;
        --bg:         #f7f5f2;
        --white:      #ffffff;
        --radius-lg:  14px;
        --radius-md:  8px;
        --shadow:     0 4px 24px rgba(0,0,0,.08);
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--ink); font-family: 'DM Sans', sans-serif; }

    .fo-wrap {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }

    /* ── Header ── */
    .fo-header {
        padding: 36px 0 24px;
        border-bottom: 1px solid var(--border);
        margin-bottom: 32px;
    }
    .fo-header h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(24px, 3vw, 34px);
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 8px;
    }
    .breadcrumb-row { display:flex; align-items:center; gap:6px; font-size:13px; color:var(--muted); }
    .breadcrumb-row a { color:var(--muted); text-decoration:none; } 
    .breadcrumb-row a:hover { color:var(--gold); }
    .breadcrumb-row .bc-cur { color:var(--gold); font-weight:500; }

    /* ── Filter tabs ── */
    .fo-filters {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }
    .fo-tab {
        padding: 7px 18px;
        border-radius: 20px;
        border: 1px solid var(--border);
        background: var(--white);
        color: var(--ink);
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: .2s;
    }
    .fo-tab.active, .fo-tab:hover {
        background: var(--gold);
        color: #fff;
        border-color: var(--gold);
    }

    /* ── Order cards ── */
    .fo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }

    .fo-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform .2s, box-shadow .2s;
    }
    .fo-card:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,.12); }

    .fo-card-head {
        background: linear-gradient(135deg, #1a1208, #2e200e);
        padding: 14px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .fo-order-code {
        font-size: 12px;
        font-weight: 700;
        color: var(--gold);
        letter-spacing: .3px;
    }
    .fo-status-badge {
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }
    .fo-status-badge.pending   { background:#fff3cd; color:#856404; }
    .fo-status-badge.confirmed { background:#d1ecf1; color:#0c5460; }
    .fo-status-badge.preparing { background:#d4edda; color:#155724; }
    .fo-status-badge.delivered { background:#B88B4A22; color:#92650a; }
    .fo-status-badge.cancelled { background:#f8d7da; color:#721c24; }

    .fo-card-body { padding: 16px 18px; flex: 1; }

    .fo-room-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: var(--muted);
        margin-bottom: 10px;
    }
    .fo-room-row strong { color: var(--ink); }

    .fo-items-list {
        list-style: none;
        padding: 0;
        margin: 0 0 12px;
        border-top: 1px solid #f0ebe0;
        border-bottom: 1px solid #f0ebe0;
        padding: 8px 0;
    }
    .fo-items-list li {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        padding: 3px 0;
        color: var(--ink);
    }
    .fo-items-list li span { color: var(--muted); }

    .fo-total-row {
        display: flex;
        justify-content: space-between;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    .fo-total-row .amount { color: var(--gold); }

    .fo-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 6px;
    }
    .fo-pay-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        border: 1px solid;
    }
    .fo-pay-chip.qr       { background:#e8f4fd; color:#0369a1; border-color:#bae6fd; }
    .fo-pay-chip.cod      { background:#fefce8; color:#92400e; border-color:#fde68a; }
    .fo-pay-chip.checkout { background:#f0fdf4; color:#166534; border-color:#bbf7d0; }
    .fo-pay-chip.pending  { background:#f3f4f6; color:#6b7280; border-color:#e5e7eb; }

    .fo-pay-status {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    .fo-pay-status.paid   { background:#d4edda; color:#155724; }
    .fo-pay-status.unpaid { background:#fff3cd; color:#856404; }

    /* Con dấu hoàn thành */
    .fo-card { position: relative; overflow: hidden; }
    .fo-stamp {
        position: absolute;
        top: 22px; right: -28px;
        transform: rotate(35deg);
        background: transparent;
        border: 4px solid #dc2626;
        color: #dc2626;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        padding: 4px 36px;
        border-radius: 4px;
        opacity: 0.75;
        pointer-events: none;
        text-transform: uppercase;
        z-index: 10;
    }

    /* Like button trên item */
    .like-item-btn {
        display: inline-flex; align-items: center; gap: 4px;
        background: none; border: 1px solid #e5e7eb;
        border-radius: 20px; padding: 3px 10px;
        font-size: 12px; cursor: pointer; color: #6b7280;
        transition: all .2s; margin-top: 4px;
    }
    .like-item-btn:hover { border-color: #e53935; color: #e53935; }
    .like-item-btn.liked { border-color: #e53935; color: #e53935; background: #fff5f5; }
    .like-item-btn:disabled { opacity: 0.45; cursor: default; }

    .fo-time {
        font-size: 12px;
        color: var(--muted);
        margin-top: 6px;
    }

    .fo-note {
        font-size: 12px;
        color: var(--muted);
        font-style: italic;
        margin-top: 6px;
        padding: 6px 10px;
        background: #faf8f4;
        border-radius: 6px;
        border-left: 2px solid var(--gold);
    }

    /* ── Tái đặt QR ── */
    .fo-card-foot {
        padding: 12px 18px;
        border-top: 1px solid #f0ebe0;
        display: flex;
        gap: 8px;
    }
    .fo-btn-qr {
        flex: 1;
        padding: 9px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: #fff;
        border: none;
        border-radius: var(--radius-md);
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }
    .fo-btn-qr:hover { opacity: .88; }

    /* ── Empty state ── */
    .fo-empty {
        text-align: center;
        padding: 60px 20px;
        grid-column: 1 / -1;
    }
    .fo-empty-icon { font-size: 52px; margin-bottom: 14px; }
    .fo-empty h3 { font-size: 20px; font-weight: 700; color: var(--ink); margin-bottom: 6px; }
    .fo-empty p  { font-size: 14px; color: var(--muted); margin-bottom: 20px; }
    .fo-empty a  { padding: 10px 28px; background: var(--gold); color: #fff; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 14px; }

    /* ── Loading skeleton ── */
    .fo-skeleton {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        overflow: hidden;
        height: 220px;
        position: relative;
    }
    .fo-skeleton::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent 30%, rgba(255,255,255,.6) 50%, transparent 70%);
        background-size: 200% 100%;
        animation: shimmer 1.4s infinite;
    }
    @keyframes shimmer { from { background-position: -200% 0; } to { background-position: 200% 0; } }

    /* ── QR Modal ── */
    #fo-qr-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.55); z-index:9998; }
    #fo-qr-modal {
        display: none;
        position: fixed;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        width: min(360px, 92vw);
        background: #fff;
        border-radius: var(--radius-lg);
        z-index: 9999;
        box-shadow: 0 20px 60px rgba(0,0,0,.3);
        overflow: hidden;
    }
    #fo-qr-modal .modal-head {
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        padding: 16px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #fo-qr-modal .modal-head span { color:#fff; font-weight:700; font-size:15px; }
    #fo-qr-modal .modal-head button { background:none; border:none; color:#fff; font-size:22px; cursor:pointer; }
    #fo-qr-modal .modal-body { padding:20px; text-align:center; }

    @media(max-width:600px) {
        .fo-grid { grid-template-columns: 1fr; }
    }
    </style>
</head>
<body>
<?php
  require('inc/header.php');
  if(!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
      redirect('index.php');
  }
?>

<div class="fo-wrap">
    <div class="fo-header">
        <h2>🍽️ Lịch sử đặt món</h2>
        <div class="breadcrumb-row">
            <a href="index.php">Trang chủ</a>
            <span class="bc-sep">›</span>
            <a href="profile.php">Hồ sơ</a>
            <span class="bc-sep">›</span>
            <span class="bc-cur">Lịch sử đặt món</span>
        </div>
    </div>

    <!-- Bộ lọc trạng thái -->
    <div class="fo-filters">
        <button class="fo-tab active" data-filter="all">Tất cả</button>
        <button class="fo-tab" data-filter="pending">Chờ xác nhận</button>
        <button class="fo-tab" data-filter="confirmed">Đã xác nhận</button>
        <button class="fo-tab" data-filter="preparing">Đang chuẩn bị</button>
        <button class="fo-tab" data-filter="delivered">Đã giao</button>
        <button class="fo-tab" data-filter="cancelled">Đã huỷ</button>
    </div>

    <!-- Danh sách đơn -->
    <div class="fo-grid" id="fo-grid">
        <div class="fo-skeleton"></div>
        <div class="fo-skeleton"></div>
        <div class="fo-skeleton"></div>
    </div>
</div>

<!-- QR Modal -->
<div id="fo-qr-overlay" onclick="closeQR()"></div>
<div id="fo-qr-modal">
    <div class="modal-head">
        <span>Quét mã QR thanh toán</span>
        <button onclick="closeQR()">×</button>
    </div>
    <div class="modal-body">
        <div style="font-size:13px;color:#666;margin-bottom:4px;">Nội dung chuyển khoản:</div>
        <div id="fo-qr-content" style="font-weight:700;font-size:14px;color:#1a1208;background:#faf8f4;padding:8px 12px;border-radius:6px;margin-bottom:12px;"></div>
        <img id="fo-qr-img" src="" alt="QR" style="width:200px;height:200px;border-radius:8px;border:1px solid #eee;margin-bottom:10px;">
        <div style="font-size:12px;color:#888;margin-bottom:4px;">MB Bank · <span id="fo-qr-acc"></span></div>
        <div style="font-size:12px;color:#888;margin-bottom:10px;">NGUYEN ANH KIET</div>
        <div style="font-weight:700;color:#B88B4A;font-size:14px;" id="fo-qr-amount"></div>
        <div style="margin-top:8px;font-size:11px;color:#c07a3a;background:#fff8ec;border-radius:6px;padding:7px 10px;">
            ⚠️ Nhập đúng nội dung khi chuyển khoản để hệ thống tự xác nhận.
        </div>
        <button onclick="closeQR()" style="margin-top:12px;width:100%;background:#f0ebe0;border:none;padding:11px;border-radius:8px;font-size:14px;font-weight:700;cursor:pointer;">✅ Tôi đã chuyển khoản xong</button>
    </div>
</div>

<?php require('inc/footer.php'); ?>

<script>
const IS_LOGIN = <?php echo (isset($_SESSION['login']) && $_SESSION['login'] == true) ? 'true' : 'false'; ?>;
const BANK = { code:'MB', acc:'0914762614', name:'NGUYEN ANH KIET' };

const STATUS_LABEL = { pending:'Chờ xác nhận', confirmed:'Đã xác nhận', preparing:'Đang chuẩn bị', delivered:'Đã giao', cancelled:'Đã huỷ' };
const PAY_LABEL    = { qr:'💳 Thanh toán QR', cod:'💵 Tiền mặt (COD)', checkout:'🏨 Khi trả phòng', pending:'—' };
const PAY_CLASS    = { qr:'qr', cod:'cod', checkout:'checkout', pending:'pending' };

let allOrders = [];
let activeFilter = 'all';

fetch('ajax/food_order.php?fetch_my_orders=1')
    .then(r => r.json())
    .then(data => {
        allOrders = data || [];
        renderOrders();
    })
    .catch(() => {
        document.getElementById('fo-grid').innerHTML = '<div class="fo-empty"><div class="fo-empty-icon">⚠️</div><h3>Không thể tải dữ liệu</h3><p>Vui lòng thử lại sau.</p></div>';
    });

// Filter tabs
document.querySelectorAll('.fo-tab').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.fo-tab').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        activeFilter = this.dataset.filter;
        renderOrders();
    });
});

function renderOrders() {
    const grid = document.getElementById('fo-grid');
    const filtered = activeFilter === 'all' ? allOrders : allOrders.filter(o => o.status === activeFilter);

    if (filtered.length === 0) {
        grid.innerHTML = `<div class="fo-empty">
            <div class="fo-empty-icon">🍽️</div>
            <h3>Chưa có đơn nào</h3>
            <p>${activeFilter === 'all' ? 'Bạn chưa đặt món nào.' : 'Không có đơn ở trạng thái này.'}</p>
            <a href="food.php">Khám phá thực đơn</a>
        </div>`;
        return;
    }

    grid.innerHTML = filtered.map(o => {
        const st  = o.status || 'pending';
        const pm  = o.payment_method || 'pending';
        const ps  = o.payment_status || 'unpaid';
        const items = o.items || [];
        const dt  = (o.datentime || '').substring(0,16).replace('T',' ');
        const total = Number(o.total_amount || 0);

        const isDelivered = st === 'delivered';
        const itemsHtml = items.map(i => {
            const canLike = isDelivered;
            const liked = (window._likedItems || {})[i.id] || false;
            const likeBtn = IS_LOGIN && canLike
                ? `<button class="like-item-btn ${liked?'liked':''}" id="like-ord-${o.id||o.order_code}-${i.id}" onclick="toggleLikeItem(${i.id}, this)">${liked?'❤️':'🤍'} Thích <span>${i.like_count||0}</span></button>`
                : '';
            return `<li><span>${i.name} × ${i.qty}</span><span>${Number(i.subtotal||i.price*i.qty).toLocaleString('vi-VN')} VND</span>${likeBtn}</li>`;
        }).join('');

        const noteHtml = o.note ? `<div class="fo-note">📝 ${o.note}</div>` : '';

        // Chỉ hiện nút QR nếu chưa thanh toán và phương thức là QR
        const footHtml = (pm === 'qr' && ps === 'unpaid' && st !== 'cancelled')
            ? `<div class="fo-card-foot">
                <button class="fo-btn-qr" onclick="openQR('${o.order_code}', ${total})">💳 Xem QR để thanh toán</button>
               </div>`
            : '';

        const stampHtml = isDelivered ? `<div class="fo-stamp">Hoàn thành</div>` : '';
        return `<div class="fo-card" data-status="${st}">
            ${stampHtml}
            <div class="fo-card-head">
                <div class="fo-order-code">${o.order_code || '—'}</div>
                <span class="fo-status-badge ${st}">${STATUS_LABEL[st] || st}</span>
            </div>
            <div class="fo-card-body">
                <div class="fo-room-row">
                    🏠 Phòng: <strong>${o.room_no || 'Không có'}</strong>
                </div>
                <ul class="fo-items-list">${itemsHtml}</ul>
                <div class="fo-total-row">
                    <span>Tổng cộng</span>
                    <span class="amount">${total.toLocaleString('vi-VN')} VND</span>
                </div>
                <div class="fo-meta">
                    <span class="fo-pay-chip ${PAY_CLASS[pm]}">${PAY_LABEL[pm]}</span>
                    <span class="fo-pay-status ${ps}">${ps === 'paid' ? '✅ Đã thanh toán' : '⏳ Chưa thanh toán'}</span>
                </div>
                ${noteHtml}
                <div class="fo-time">🕐 ${dt}</div>
            </div>
            ${footHtml}
        </div>`;
    }).join('');
}

async function toggleLikeItem(foodId, btn) {
    btn.disabled = true;
    const fd = new FormData();
    fd.append('toggle_like', '1');
    fd.append('food_id', foodId);
    try {
        const res = await fetch('ajax/food_order.php', {method:'POST', body:fd}).then(r=>r.json());
        if (res.status == 1) {
            if (!window._likedItems) window._likedItems = {};
            window._likedItems[foodId] = res.liked;
            const countEl = btn.querySelector('span');
            if (countEl) countEl.textContent = res.like_count;
            if (res.liked) { btn.classList.add('liked'); btn.innerHTML = btn.innerHTML.replace('🤍','❤️'); }
            else            { btn.classList.remove('liked'); btn.innerHTML = btn.innerHTML.replace('❤️','🤍'); }
        } else if (res.msg === 'no_delivered_order') {
            alert('Chỉ có thể thích món sau khi đơn được giao!');
        } else if (res.msg === 'not_login') {
            alert('Vui lòng đăng nhập để thích món!');
        }
    } catch(e) {}
    btn.disabled = false;
}

function openQR(orderCode, total) {
    const content = 'THANHTOAN ' + orderCode;
    const qrUrl = 'https://img.vietqr.io/image/' +
        encodeURIComponent(BANK.code) + '-' +
        encodeURIComponent(BANK.acc) +
        '-compact2.png?amount=' + encodeURIComponent(Math.round(total)) +
        '&addInfo=' + encodeURIComponent(content) +
        '&accountName=' + encodeURIComponent(BANK.name);
    document.getElementById('fo-qr-img').src = qrUrl;
    document.getElementById('fo-qr-content').textContent = content;
    document.getElementById('fo-qr-acc').textContent = BANK.acc;
    document.getElementById('fo-qr-amount').textContent = total.toLocaleString('vi-VN') + ' VND';
    document.getElementById('fo-qr-overlay').style.display = 'block';
    document.getElementById('fo-qr-modal').style.display = 'block';
}

function closeQR() {
    document.getElementById('fo-qr-overlay').style.display = 'none';
    document.getElementById('fo-qr-modal').style.display = 'none';
}
</script>
</body>
</html>
