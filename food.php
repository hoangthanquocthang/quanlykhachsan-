<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?php echo $settings_r['site_title'] ?> Quản lý Ẩm thực</title>
    <style>
    :root {
        --ink:        #1a1208;
        --gold:       #B88B4A;
        --gold-light: #d4aa6a;
        --cream:      #faf8f4;
        --white:      #ffffff;
        --border:     rgba(184,139,74,0.15);
    }

        .food-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px 60px;
        }

        .food-header {
            padding: 40px 0 24px;
        }

        .food-header h2 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .breadcrumb {
            font-size: 14px;
            color: #666;
        }

        .breadcrumb a {
            color: #666;
            text-decoration: none;
        }

        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 28px;
        }

        .cat-tab {
            padding: 8px 18px;
            border-radius: 20px;
            border: 1px solid #B88B4A;
            background: #fff;
            color: #333;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: .2s;
        }

        /* ĐÃ SỬA: Thêm !important để không bị Bootstrap ghi đè */
        .cat-tab.active,
        .cat-tab:hover {
            background: #B88B4A !important;
            color: #ffffff !important;
            border-color: #B88B4A !important;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 22px;
        }

        .food-card-wrap {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .food-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .07);
            overflow: hidden;
            transition: .25s;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .food-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
        }

        .food-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .food-card-no-img {
            width: 100%;
            height: 180px;
            background: #f0f7f4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .food-body {
        font-family: 'DM Sans', sans-serif;
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .food-name {
            font-weight: 700;
            font-size: 16px;
            margin: 0 0 6px;
        }

        .food-cat {
            font-size: 12px;
            color: #888;
            margin-bottom: 8px;
        }

        .food-desc {
            font-size: 13px;
            color: #555;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .food-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }

        /* ===== Stats: lượt đặt + lượt thích ===== */
        .food-stats {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
            font-size: 12px;
            color: #888;
        }
        .stat-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .stat-item svg { flex-shrink: 0; }

        /* Nút thích */
        .btn-like {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            color: #aaa;
            font-size: 12px;
            padding: 0;
            transition: color .2s;
        }
        .btn-like.liked { color: #e53935; }
        .btn-like:disabled { cursor: default; opacity: 0.5; }

        /* ===== Best seller badge ===== */
        .food-card-wrap {
            position: relative;
        }
        .badge-bestseller {
            position: absolute;
            top: 10px;
            left: 10px;
            background: linear-gradient(135deg, #e53935, #ff7043);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px 3px 6px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 2px 8px rgba(229,57,53,.4);
            z-index: 2;
            letter-spacing: .3px;
        }
        .badge-bestseller .fire { font-size: 14px; }

        .food-price {
            font-weight: 700;
            color: #B88B4A;
            font-size: 16px;
        }

        .btn-add-cart {
            background: #fff;
            color: #B88B4A;
            border: 1px solid #B88B4A;
            padding: 7px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-add-cart:hover {
            background: linear-gradient(135deg,#B88B4A,#9a7035);
            color: #fff;
        }

        .qty-ctrl {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .qty-ctrl button {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid #ccc;
            background: #fff;
            cursor: pointer;
            font-size: 16px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-ctrl span {
            font-weight: 700;
            min-width: 20px;
            text-align: center;
        }

        /* Cart sidebar */
        .cart-toggle {
            position: fixed;
            bottom: 90px;
            right: 24px;
            background: linear-gradient(135deg,#B88B4A,#9a7035);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 14px 20px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(184,139,74, .4);
            z-index: 900;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-badge {
            background: #dc3545;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .cart-panel {
            position: fixed;
            right: -400px;
            top: 0;
            width: 380px;
            height: 100%;
            background: #fff;
            box-shadow: -5px 0 20px rgba(0, 0, 0, .15);
            z-index: 9999;
            transition: .35s;
            display: flex;
            flex-direction: column;
        }

        .cart-panel.open {
            right: 0;
        }

        .cart-head {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-head h5 {
            margin: 0;
            font-weight: 700;
        }

        .cart-close {
            border: none;
            background: none;
            font-size: 24px;
            cursor: pointer;
            color: #888;
        }

        .cart-body {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            gap: 10px;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            font-size: 14px;
        }

        .cart-item-price {
            font-size: 12px;
            color: #888;
        }

        .cart-item-ctrl {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .cart-item-ctrl button {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: #faf8f4;
            cursor: pointer;
            font-size: 14px;
        }

        .cart-item-ctrl span {
            min-width: 18px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
        }

        .cart-item-del {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 16px;
            padding: 0 4px;
        }

        .cart-foot {
            padding: 16px;
            border-top: 1px solid #eee;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .cart-form input,
        .cart-form textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 8px;
            font-family: inherit;
            outline: none;
            box-sizing: border-box;
        }

        .btn-order {
            width: 100%;
            background: linear-gradient(135deg,#B88B4A,#9a7035);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn-order:hover {
            background: #9a7035;
        }

        .btn-order:disabled {
            background: #aaa;
            cursor: not-allowed;
        }

        .cart-empty {
            text-align: center;
            color: #aaa;
            padding: 30px 0;
            font-size: 15px;
        }

        .cart-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 9998;
            display: none;
        }

        .cart-overlay.open {
            display: block;
        }

        /* Đảm bảo chatbot luôn nổi trên cart panel */
        #dc-wrap {
            z-index: 99999 !important;
        }

        /* Khi cart mở, ẩn chatbot và các nút nổi để không bị che */
        body.cart-open #dc-wrap,
        body.cart-open #policyFloatingBtn,
        body.cart-open a[href*="m.me"] {
            display: none !important;
        }

        /* Khi cart mở, ẩn nút giỏ hàng toggle */
        body.cart-open .cart-toggle {
            display: none;
        }

        @media(max-width:480px) {
            .cart-panel {
                width: 100%;
                right: -100%;
            }
        }
    </style>
</head>

<body style="background:#faf8f4;">
    <?php require('inc/header.php'); ?>

    <div class="food-page">
        <div class="food-header">
            <h2 class="h-font">Ẩm thực & Đồ uống</h2>
            <div class="breadcrumb">
                <a href="index.php">Trang chủ</a> <span> > </span> <span>Ẩm thực</span>
            </div>
        </div>

        <div class="category-tabs" id="cat-tabs">
            <button class="cat-tab active" data-cat="all">Tất cả</button>
        </div>

        <div class="food-grid" id="food-grid">
            <p style="text-align:center;color:#aaa;grid-column:1/-1;">Đang tải menu...</p>
        </div>
    <button class="cart-toggle" onclick="openCart()">
        Giỏ hàng <span class="cart-badge" id="cart-count">0</span>
    </button>

    <div class="cart-overlay" id="cart-overlay" onclick="closeCart()"></div>

    <div class="cart-panel" id="cart-panel">
        <div class="cart-head">
            <h5>Giỏ hàng của bạn</h5>
            <button class="cart-close" onclick="closeCart()">×</button>
        </div>
        <div class="cart-body" id="cart-body">
            <p class="cart-empty">Giỏ hàng trống!</p>
        </div>
        <div class="cart-foot">
            <div class="cart-total"><span>Tổng cộng:</span><span id="cart-total-text">0 VND</span></div>
            <div class="cart-form">
                <select id="order-room" style="width:100%;padding:9px 12px;border:1px solid #ccc;border-radius:6px;font-size:14px;margin-bottom:8px;outline:none;box-sizing:border-box;background:#fff;color:#333;">
                    <option value="">-- Chọn phòng đặt giao đồ ăn (nếu có) --</option>
                </select>
                <textarea id="order-note" rows="2" placeholder="Ghi chú thêm..."></textarea>
            </div>
            <button class="btn-order" id="btn-order" onclick="openPaymentModal()">Đặt món ngay</button>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script>
        const SITE_URL = '<?php echo SITE_URL; ?>';
        const IS_LOGIN = <?php echo (isset($_SESSION['login']) && $_SESSION['login'] == true) ? 'true' : 'false'; ?>;
        let cart = {};
        let menuItems = [];

        // Load menu
        fetch('ajax/food_order.php?fetch_menu=1')
            .then(r => r.json())
            .then(items => {
                menuItems = items;
                renderTabs(items);
                renderMenu(items);
            });

        // Load danh sách phòng đang đặt của user
        if (IS_LOGIN) {
            fetch('ajax/food_order.php?fetch_bookings=1')
                .then(r => r.json())
                .then(bookings => {
                    const sel = document.getElementById('order-room');
                    if (bookings.length === 0) {
                        const opt = document.createElement('option');
                        opt.value = '';
                        opt.textContent = '-- Bạn chưa có đặt phòng nào --';
                        sel.appendChild(opt);
                        return;
                    }
                    bookings.forEach(b => {
                        const opt = document.createElement('option');
                        opt.value = b.room_no || '';
                        const roomLabel = b.room_name + (b.room_no ? ' - Phòng ' + b.room_no : '');
                        opt.textContent = 'Phòng ' + b.room_no;
                        sel.appendChild(opt);
                    });
                });
        }

        function renderTabs(items) {
            const cats = [...new Set(items.map(i => i.category).filter(Boolean))];
            const tabs = document.getElementById('cat-tabs');
            cats.forEach(cat => {
                const btn = document.createElement('button');
                btn.className = 'cat-tab';
                btn.dataset.cat = cat;
                btn.textContent = cat;
                btn.onclick = () => filterCat(cat, btn);
                tabs.appendChild(btn);
            });
            tabs.querySelectorAll('.cat-tab').forEach(b => {
                b.onclick = b.onclick || (() => filterCat(b.dataset.cat, b));
            });
            tabs.querySelector('[data-cat="all"]').onclick = () => filterCat('all', tabs.querySelector('[data-cat="all"]'));
        }

        function filterCat(cat, btn) {
            document.querySelectorAll('.cat-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderMenu(cat === 'all' ? menuItems : menuItems.filter(i => i.category === cat));
        }

        function renderMenu(items) {
            const grid = document.getElementById('food-grid');
            if (items.length === 0) {
                grid.innerHTML = '<p style="text-align:center;color:#aaa;grid-column:1/-1;">Không có món nào!</p>';
                return;
            }

            // Top 3 món có order_count nhiều nhất (trong toàn bộ menuItems)
            const top3Ids = [...menuItems]
                .sort((a, b) => (b.order_count || 0) - (a.order_count || 0))
                .slice(0, 3)
                .filter(i => (i.order_count || 0) > 0)
                .map(i => i.id);

            grid.innerHTML = items.map(item => {
                const price = Number(item.price).toLocaleString('vi-VN');
                const isBestSeller = top3Ids.includes(item.id);
                const imgHtml = item.image ?
                    `<img src="${SITE_URL}images/rooms/${item.image}" alt="${item.name}">` :
                    `<div class="food-card-no-img"></div>`;
                const qty = cart[item.id] ? cart[item.id].qty : 0;
                const btnHtml = qty > 0 ?
                    `<div class="qty-ctrl">
                <button onclick="changeQty(${item.id},-1)">−</button>
                <span id="qty-${item.id}">${qty}</span>
                <button onclick="changeQty(${item.id},1)">+</button>
               </div>` :
                    `<button class="btn-add-cart" onclick="addToCart(${item.id})">+ Thêm</button>`;

                const orderCount = item.order_count || 0;
                const likeCount  = item.like_count  || 0;
                const isLiked    = item.user_liked   || false;
                const canLike    = item.can_like     || false;

                const likeBtn = IS_LOGIN
                    ? `<button class="btn-like ${isLiked ? 'liked' : ''}" id="like-btn-${item.id}"
                            ${!canLike && !isLiked ? 'disabled title="Chỉ người đã đặt và nhận món mới có thể thích"' : ''}
                            onclick="toggleLike(${item.id})">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="${isLiked ? 'currentColor' : 'none'}" stroke="currentColor" stroke-width="2.2">
                              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                            <span id="like-count-${item.id}">${likeCount}</span>
                        </button>`
                    : `<span class="stat-item" title="Lượt thích">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#aaa" stroke-width="2">
                              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                            ${likeCount}
                        </span>`;

                return `
        <div class="food-card-wrap">
            ${isBestSeller ? `<div class="badge-bestseller"><span class="fire">🔥</span> Best Seller</div>` : ''}
            <div class="food-card" id="card-${item.id}">
                ${imgHtml}
                <div class="food-body">
                    <div class="food-name">${item.name}</div>
                    ${item.category ? `<div class="food-cat">${item.category}</div>` : ''}
                    ${item.description ? `<div class="food-desc">${item.description}</div>` : ''}
                    <div class="food-stats">
                        <span class="stat-item" title="Lượt đặt">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                              <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>
                            </svg>
                            ${orderCount} lượt đặt
                        </span>
                        ${likeBtn}
                    </div>
                    <div class="food-bottom">
                        <div class="food-price">${price} VND</div>
                        <div id="btn-area-${item.id}">${btnHtml}</div>
                    </div>
                </div>
            </div>
        </div>`;
            }).join('');
        }

        function toggleLike(id) {
            const btn = document.getElementById('like-btn-' + id);
            if (!btn || btn.disabled) return;
            if (!IS_LOGIN) { closeCart(); openModal('loginModal'); return; }
            btn.disabled = true;
            const data = new URLSearchParams();
            data.append('toggle_like', '1');
            data.append('food_id', id);
            fetch('ajax/food_order.php', { method: 'POST', body: data })
                .then(r => r.json())
                .then(res => {
                    if (res.status == 1) {
                        const countEl = document.getElementById('like-count-' + id);
                        if (countEl) countEl.textContent = res.like_count;
                        if (res.liked) {
                            btn.classList.add('liked');
                            btn.querySelector('svg').setAttribute('fill', 'currentColor');
                        } else {
                            btn.classList.remove('liked');
                            btn.querySelector('svg').setAttribute('fill', 'none');
                        }
                        // Cập nhật menuItems để giữ state đúng khi filter
                        const mi = menuItems.find(i => i.id == id);
                        if (mi) { mi.user_liked = res.liked; mi.like_count = res.like_count; }
                    } else if (res.msg === 'not_login') {
                        openModal('loginModal');
                    } else if (res.msg === 'no_delivered_order') {
                        alert('error', 'Bạn chỉ có thể thích món sau khi đơn đã được giao thành công!');
                    }
                    btn.disabled = false;
                })
                .catch(() => { btn.disabled = false; });
        }

        function addToCart(id) {
            const item = menuItems.find(i => i.id == id);
            if (!item) return;
            if (!cart[id]) cart[id] = {
                ...item,
                qty: 0
            };
            cart[id].qty++;
            updateCardBtn(id);
            updateCartUI();
        }

        function changeQty(id, delta) {
            if (!cart[id]) return;
            cart[id].qty += delta;
            if (cart[id].qty <= 0) delete cart[id];
            updateCardBtn(id);
            updateCartUI();
        }

        function updateCardBtn(id) {
            const area = document.getElementById('btn-area-' + id);
            if (!area) return;
            const qty = cart[id] ? cart[id].qty : 0;
            area.innerHTML = qty > 0 ?
                `<div class="qty-ctrl"><button onclick="changeQty(${id},-1)">−</button><span id="qty-${id}">${qty}</span><button onclick="changeQty(${id},1)">+</button></div>` :
                `<button class="btn-add-cart" onclick="addToCart(${id})">+ Thêm</button>`;
        }

        function updateCartUI() {
            const items = Object.values(cart);
            const total = items.reduce((s, i) => s + i.price * i.qty, 0);
            document.getElementById('cart-count').textContent = items.reduce((s, i) => s + i.qty, 0);
            document.getElementById('cart-total-text').textContent = total.toLocaleString('vi-VN') + ' VND';

            const body = document.getElementById('cart-body');
            if (items.length === 0) {
                body.innerHTML = '<p class="cart-empty">Giỏ hàng trống!</p>';
                return;
            }
            body.innerHTML = items.map(i => `
    <div class="cart-item">
        <div class="cart-item-info">
            <div class="cart-item-name">${i.name}</div>
            <div class="cart-item-price">${Number(i.price).toLocaleString('vi-VN')} VND × ${i.qty}</div>
        </div>
        <div class="cart-item-ctrl">
            <button onclick="changeQty(${i.id},-1)">−</button>
            <span>${i.qty}</span>
            <button onclick="changeQty(${i.id},1)">+</button>
        </div>
        <button class="cart-item-del" onclick="removeItem(${i.id})">🗑</button>
    </div>`).join('');
        }

        function removeItem(id) {
            delete cart[id];
            updateCardBtn(id);
            updateCartUI();
        }

        function openCart() {
            document.getElementById('cart-panel').classList.add('open');
            document.getElementById('cart-overlay').classList.add('open');
            document.body.classList.add('cart-open');
        }

        function closeCart() {
            document.getElementById('cart-panel').classList.remove('open');
            document.getElementById('cart-overlay').classList.remove('open');
            document.body.classList.remove('cart-open');
        }

        function placeOrder() {
            if (!IS_LOGIN) {
                closeCart();
                openModal('loginModal');
                return;
            }
            const items = Object.values(cart);
            if (items.length === 0) {
                alert('error', 'Giỏ hàng trống!');
                return;
            }

            const btn = document.getElementById('btn-order');
            btn.disabled = true;
            btn.textContent = 'Đang đặt...';

            const cartArr = items.map(i => ({
                id: i.id,
                qty: i.qty
            }));
            const data = new URLSearchParams();
            data.append('place_order', '1');
            data.append('cart', JSON.stringify(cartArr));
            data.append('room_no', document.getElementById('order-room').value.trim());
            data.append('note', document.getElementById('order-note').value.trim());

            fetch('ajax/food_order.php', {
                    method: 'POST',
                    body: data
                })
                .then(r => r.json())
                .then(res => {
                    btn.disabled = false;
                    btn.textContent = 'Đặt món ngay';
                    if (res.status == 1) {
                        cart = {};
                        updateCartUI();
                        renderMenu(menuItems.filter(i => document.querySelector('.cat-tab.active')?.dataset.cat === 'all' || i.category === document.querySelector('.cat-tab.active')?.dataset.cat));
                        closeCart();
                        alert('success', 'Đặt món thành công! Chúng tôi sẽ phục vụ bạn sớm nhất.');
                    } else if (res.msg === 'not_login') {
                        openModal('loginModal');
                    } else {
                        alert('error', 'Đặt món thất bại, vui lòng thử lại!');
                    }
                });
        }
    </script>

    <!-- Modal xác nhận & chọn thanh toán -->
    <div id="payment-modal-overlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:19998;" onclick="closePaymentModal()"></div>
    <div id="payment-modal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:min(420px,94vw);background:#fff;border-radius:14px;z-index:19999;box-shadow:0 20px 60px rgba(0,0,0,.25);overflow:hidden;">
        <div style="background:linear-gradient(135deg,#B88B4A,#9a7035);padding:18px 22px;display:flex;justify-content:space-between;align-items:center;">
            <span style="color:#fff;font-weight:700;font-size:16px;">Xác nhận đặt món</span>
            <button onclick="closePaymentModal()" style="background:none;border:none;color:#fff;font-size:22px;cursor:pointer;line-height:1;">×</button>
        </div>
        <div style="padding:20px 22px;">
            <div id="pm-summary" style="background:#faf8f4;border-radius:8px;padding:12px 14px;margin-bottom:16px;font-size:14px;line-height:1.8;"></div>
            <div style="font-weight:700;font-size:14px;margin-bottom:10px;color:#1a1208;">Chọn phương thức thanh toán:</div>
            <!-- Phương thức 1: QR -->
            <label id="pm-opt-qr" style="display:flex;align-items:flex-start;gap:10px;padding:12px;border:2px solid #e8e0d5;border-radius:8px;cursor:pointer;margin-bottom:8px;transition:.2s;" onclick="selectPayMethod('qr')">
                <input type="radio" name="pay_method" value="qr" style="margin-top:3px;accent-color:#B88B4A;">
                <div>
                    <div style="font-weight:700;font-size:14px;">💳 Thanh toán ngay qua QR</div>
                    <div style="font-size:12px;color:#888;margin-top:2px;">Quét mã QR chuyển khoản ngay, đơn được xác nhận sau khi thanh toán</div>
                </div>
            </label>
            <!-- Phương thức 2: COD -->
            <label id="pm-opt-cod" style="display:flex;align-items:flex-start;gap:10px;padding:12px;border:2px solid #e8e0d5;border-radius:8px;cursor:pointer;margin-bottom:8px;transition:.2s;" onclick="selectPayMethod('cod')">
                <input type="radio" name="pay_method" value="cod" style="margin-top:3px;accent-color:#B88B4A;">
                <div>
                    <div style="font-weight:700;font-size:14px;">💵 Tiền mặt khi nhận hàng (COD)</div>
                    <div style="font-size:12px;color:#888;margin-top:2px;">Trả tiền mặt trực tiếp khi nhân viên giao đồ ăn</div>
                </div>
            </label>
            <!-- Phương thức 3: Trả khi checkout -->
            <label id="pm-opt-checkout" style="display:flex;align-items:flex-start;gap:10px;padding:12px;border:2px solid #e8e0d5;border-radius:8px;cursor:pointer;margin-bottom:16px;transition:.2s;" onclick="selectPayMethod('checkout')">
                <input type="radio" name="pay_method" value="checkout" style="margin-top:3px;accent-color:#B88B4A;">
                <div>
                    <div style="font-weight:700;font-size:14px;">🏨 Thanh toán khi trả phòng</div>
                    <div style="font-size:12px;color:#888;margin-top:2px;">Cộng vào hóa đơn phòng, thanh toán chung khi check-out</div>
                </div>
            </label>
            <button id="pm-confirm-btn" onclick="confirmOrder()" style="width:100%;background:linear-gradient(135deg,#B88B4A,#9a7035);color:#fff;border:none;padding:13px;border-radius:8px;font-size:15px;font-weight:700;cursor:pointer;transition:.2s;" disabled>Xác nhận đặt món</button>
        </div>
    </div>

    <!-- Modal QR thanh toán -->
    <div id="qr-modal-overlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:20998;"></div>
    <div id="qr-modal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:min(360px,92vw);background:#fff;border-radius:14px;z-index:20999;box-shadow:0 20px 60px rgba(0,0,0,.3);overflow:hidden;">
        <div style="background:linear-gradient(135deg,#B88B4A,#9a7035);padding:16px 20px;display:flex;justify-content:space-between;align-items:center;">
            <span style="color:#fff;font-weight:700;font-size:15px;">Quét mã QR thanh toán</span>
            <button onclick="closeQRModal()" style="background:none;border:none;color:#fff;font-size:22px;cursor:pointer;">×</button>
        </div>
        <div style="padding:18px 20px;text-align:center;">
            <div style="font-size:13px;color:#666;margin-bottom:4px;">Nội dung chuyển khoản:</div>
            <div id="qr-transfer-content" style="font-weight:700;font-size:15px;color:#1a1208;background:#faf8f4;padding:8px 12px;border-radius:6px;margin-bottom:12px;letter-spacing:.5px;"></div>
            <img id="qr-img" src="" alt="QR thanh toán" style="width:200px;height:200px;border-radius:8px;border:1px solid #eee;margin-bottom:10px;">
            <div style="font-size:12px;color:#888;margin-bottom:4px;">MB Bank · <span id="qr-account-no"></span></div>
            <div style="font-size:12px;color:#888;margin-bottom:14px;">NGUYEN ANH KIET</div>
            <div style="font-size:13px;font-weight:700;color:#B88B4A;" id="qr-amount-text"></div>
            <div style="margin-top:12px;font-size:12px;color:#999;">Sau khi chuyển khoản, đơn sẽ được xác nhận tự động</div>
            <div style="margin-top:8px;font-size:11px;color:#c07a3a;background:#fff8ec;border-radius:6px;padding:7px 10px;">
                ⚠️ Nhập <strong>đúng nội dung</strong> khi chuyển khoản để hệ thống tự xác nhận. Nếu không nhập đúng, vui lòng báo lễ tân.
            </div>
            <button onclick="closeQRModal()" style="margin-top:14px;width:100%;background:#f0ebe0;color:#1a1208;border:none;padding:11px;border-radius:8px;font-size:14px;font-weight:700;cursor:pointer;">✅ Tôi đã chuyển khoản xong</button>
        </div>
    </div>

    <script>
    // Thông tin ngân hàng (giống bookings.php)
    const PAYMENT_BANK = { bankCode: 'MB', accountNo: '0914762614', accountName: 'NGUYEN ANH KIET' };

    let _pendingCart = null;
    let _pendingRoom = '';
    let _pendingNote = '';
    let _selectedPayMethod = null;

    function openPaymentModal() {
        if (!IS_LOGIN) { closeCart(); openModal('loginModal'); return; }
        const items = Object.values(cart);
        if (items.length === 0) { alert('error', 'Giỏ hàng trống!'); return; }
        const roomSel = document.getElementById('order-room');
        const roomVal = roomSel ? roomSel.value.trim() : '';
        // Phải chọn phòng (chỉ phòng đang check-in)
        if (!roomVal) { alert('error', 'Vui lòng chọn phòng đang check-in để đặt món!'); return; }

        _pendingCart = items;
        _pendingRoom = roomVal;
        _pendingNote = document.getElementById('order-note').value.trim();

        const total = items.reduce((s, i) => s + i.price * i.qty, 0);
        const roomLabel = roomSel.options[roomSel.selectedIndex]?.text || roomVal;
        let summaryHtml = `<div style="margin-bottom:6px;"><strong>Phòng:</strong> ${roomLabel}</div>`;
        summaryHtml += items.map(i => `<div>${i.name} × ${i.qty} = <strong>${(i.price*i.qty).toLocaleString('vi-VN')} VND</strong></div>`).join('');
        summaryHtml += `<div style="margin-top:8px;padding-top:8px;border-top:1px solid #e8e0d5;font-size:15px;"><strong>Tổng:</strong> <strong style="color:#B88B4A;">${total.toLocaleString('vi-VN')} VND</strong></div>`;
        document.getElementById('pm-summary').innerHTML = summaryHtml;

        // Reset
        selectPayMethod(null);
        document.querySelectorAll('input[name="pay_method"]').forEach(r => r.checked = false);
        document.getElementById('payment-modal-overlay').style.display = 'block';
        document.getElementById('payment-modal').style.display = 'block';
    }

    function closePaymentModal() {
        document.getElementById('payment-modal-overlay').style.display = 'none';
        document.getElementById('payment-modal').style.display = 'none';
    }

    function selectPayMethod(method) {
        _selectedPayMethod = method;
        ['qr','cod','checkout'].forEach(m => {
            const el = document.getElementById('pm-opt-' + m);
            if (el) el.style.borderColor = (m === method) ? '#B88B4A' : '#e8e0d5';
            if (el) el.style.background = (m === method) ? '#fdf6e9' : '#fff';
            const radio = el ? el.querySelector('input[type=radio]') : null;
            if (radio) radio.checked = (m === method);
        });
        const btn = document.getElementById('pm-confirm-btn');
        btn.disabled = !method;
        btn.style.opacity = method ? '1' : '0.5';
    }

    function confirmOrder() {
        if (!_selectedPayMethod || !_pendingCart) return;
        const btn = document.getElementById('pm-confirm-btn');
        btn.disabled = true; btn.textContent = 'Đang đặt...';

        const cartArr = _pendingCart.map(i => ({ id: i.id, qty: i.qty }));
        const data = new URLSearchParams();
        data.append('place_order', '1');
        data.append('cart', JSON.stringify(cartArr));
        data.append('room_no', _pendingRoom);
        data.append('note', _pendingNote);
        data.append('payment_method', _selectedPayMethod);

        fetch('ajax/food_order.php', { method: 'POST', body: data })
            .then(r => r.json())
            .then(res => {
                btn.disabled = false; btn.textContent = 'Xác nhận đặt món';
                if (res.status == 1) {
                    closePaymentModal();
                    cart = {};
                    updateCartUI();
                    const activeCat = document.querySelector('.cat-tab.active')?.dataset.cat;
                    renderMenu(activeCat === 'all' || !activeCat ? menuItems : menuItems.filter(i => i.category === activeCat));
                    closeCart();

                    if (_selectedPayMethod === 'qr') {
                        openQRModal(res.order_code, res.total);
                    } else if (_selectedPayMethod === 'cod') {
                        alert('success', `Đặt món thành công! Mã đơn: <strong>${res.order_code}</strong><br>Nhân viên sẽ mang đồ ăn và thu tiền mặt tại phòng.`);
                    } else if (_selectedPayMethod === 'checkout') {
                        alert('success', `Đặt món thành công! Mã đơn: <strong>${res.order_code}</strong><br>Tiền đồ ăn sẽ được cộng vào hóa đơn khi trả phòng.`);
                    }
                } else if (res.msg === 'not_login') {
                    openModal('loginModal');
                } else {
                    alert('error', 'Đặt món thất bại, vui lòng thử lại!');
                }
            })
            .catch(() => { btn.disabled = false; btn.textContent = 'Xác nhận đặt món'; alert('error', 'Lỗi kết nối!'); });
    }

    function openQRModal(orderCode, total) {
        const transferContent = 'THANHTOAN ' + orderCode;
        const qrUrl = 'https://img.vietqr.io/image/' +
            encodeURIComponent(PAYMENT_BANK.bankCode) + '-' +
            encodeURIComponent(PAYMENT_BANK.accountNo) +
            '-compact2.png?amount=' + encodeURIComponent(Math.round(total)) +
            '&addInfo=' + encodeURIComponent(transferContent) +
            '&accountName=' + encodeURIComponent(PAYMENT_BANK.accountName);
        document.getElementById('qr-img').src = qrUrl;
        document.getElementById('qr-transfer-content').textContent = transferContent;
        document.getElementById('qr-account-no').textContent = PAYMENT_BANK.accountNo;
        document.getElementById('qr-amount-text').textContent = Number(total).toLocaleString('vi-VN') + ' VND';
        document.getElementById('qr-modal-overlay').style.display = 'block';
        document.getElementById('qr-modal').style.display = 'block';
    }

    function closeQRModal() {
        document.getElementById('qr-modal-overlay').style.display = 'none';
        document.getElementById('qr-modal').style.display = 'none';
    }
    </script>

</body>

</html>