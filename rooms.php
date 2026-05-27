<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phòng</title>

    <?php require('inc/links.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

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
    }

    .title {
        font-family: 'Cormorant Garamond', serif;
        letter-spacing: 1.5px;
        text-align: center;
        font-size: 26px;
        margin-top: 30px;
    }

    .line {
        width: 80px;
        height: 3px;
        background: #000;
        margin: 10px auto 30px;
    }

    /* BỐ CỤC CHÍNH */
    .container {
        width: 98%; 
        max-width: 1800px;
        margin: auto;
        display: flex;
        gap: 25px;
        align-items: flex-start; /* BẮT BUỘC để sidebar có thể dính */
    }

    /* BỘ LỌC CỐ ĐỊNH BÊN TRÁI */
    .sidebar {
        width: 260px;
        min-width: 260px;
        background: #fff;
        padding: 15px;
        border: 1px solid var(--border);
        border-radius: 10px;
        position: sticky;
        top: 90px; 
        align-self: flex-start;
        max-height: calc(100vh - 100px); 
        overflow-y: auto;
    }

    .box {
        border: 1px solid var(--border);
        background: #fafafa;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
    }

    .box h4 {
        font-size: 16px;
        margin-bottom: 12px;
        color: #B88B4A;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    /* DANH SÁCH TẦNG */
    .floor-menu {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: 0 6px 22px rgba(184,139,74,0.08);
        margin-bottom: 15px;
    }

    .floor-menu-title {
        background: #B88B4A;
        color: #fff;
        padding: 20px;
        font-size: 18px;
        font-weight: 700;
    }

    .floor-btn {
        width: 100%;
        border: none;
        background: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        color: #222;
        border-bottom: 1px solid #ececec;
        transition: .25s;
        position: relative;
        overflow: hidden;
        text-decoration: none;
    }

    .floor-btn::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: #B88B4A;
        transform: scaleY(0);
        transition: .25s;
    }

    .floor-btn:last-child { border-bottom: none; }
    .floor-btn:hover { background: rgba(184,139,74,0.08); color: #7a5c2e; }

    .floor-btn.active {
        background: rgba(184,139,74,0.12) !important;
        color: #7a5c2e !important; font-weight:700;
    }
    .floor-btn.active::before {
        transform: scaleY(1);
    }
    .content {
        flex: 1; 
        display: grid;
        grid-template-columns: repeat(4, minmax(260px, 1fr));
        gap: 20px; 
    }

    .room-card {
        display: flex;
        flex-direction: column; 
        justify-content: space-between;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 0; 
        margin-bottom: 0;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(184,139,74,0.06);
        transition: 0.3s;
    }
    
    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(184,139,74,0.15);
    }

    .room-img {
        width: 100%;
        height: 180px;
    }

    .room-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .room-info {
        padding: 15px;
        flex: 1;
    }

    .room-info h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #B88B4A;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        background: #ffffff;
        color: #111;
        border: 1px solid #d0d0d0;
        border-radius: 20px;
        font-size: 12px;
        margin: 3px;
        font-weight: 500;
    }

    .room-side {
        width: 100%;
        text-align: center;
        padding: 15px;
        background: #fdfdfd;
        border-top: 1px solid #eee; 
    }

    .price {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .btn-book {
        width: 100%;
        padding: 10px;
        background: #B88B4A; 
        color: #fff;         
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-bottom: 8px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-book:hover:not(:disabled) {
        background: #9a7035; 
    }

    .btn-book:disabled {
        background: #999; 
        cursor: not-allowed;
    }

    .btn-detail {
        display: block;
        padding: 8px;
        border: 1px solid #B88B4A;
        text-decoration: none;
        color: #B88B4A;
        border-radius: 6px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-detail:hover {
        background: #B88B4A;
        color: #fff;
    }

    .error {
        text-align: center;
        color: red;
        grid-column: 1 / -1; 
    }

    @media(max-width: 1500px) { .content { grid-template-columns: repeat(4, minmax(0, 1fr)); } }
    @media(max-width: 1200px) { .content { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
    @media(max-width: 991px) {
        .container { flex-direction: column; }
        .sidebar { width: 100%; position: static; max-height: none; }
        .content { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media(max-width: 575px) { .content { grid-template-columns: 1fr; } }

    .room-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 12px;
    }
    .fs-avail    { background: #fdf6e9; color: #7a5c2e; }
    .fs-booked   { background: #fde8e8; color: #c0392b; }
    .fs-maintain { background: #fff3d9; color: #996500; }
    .fs-cleaning { background: #fff3d9; color: #7a5c2e; }
    .fs-occupied { background: #fde8e8; color: #c0392b; }
    .fs-reserved { background: #ede9fe; color: #9a7035; }
    .floor-room-card { width: 100%; border: 1px solid var(--border); border-radius: 10px; overflow: hidden; background: #fff; }
.floor-room-img { width: 100%; height: 160px; object-fit: cover; }
.floor-room-body { padding: 10px; }
/* TẠO FLEXBOX ĐỂ 2 NÚT NẰM NGANG NHAU CÂN ĐỐI */
    .action-buttons {
        display: flex;
        gap: 10px;
        width: 100%;
        margin-top: 10px;
    }
    
    /* NÚT ĐẶT NGAY (MÀU XANH) */
    .btn-action-primary {
        flex: 1; /* Chia đều 50% chiều rộng */
        background-color: #B88B4A;
        color: #fff;
        border: none;
        padding: 9px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-action-primary:hover:not(:disabled) {
        background-color: #9a7035;
    }
    .btn-action-primary:disabled {
        background-color: #999;
        cursor: not-allowed;
    }

    /* NÚT CHI TIẾT (VIỀN XÁM, NỀN TRẮNG) */
    .btn-action-outline {
        flex: 1; /* Chia đều 50% chiều rộng */
        background-color: #fff;
        color: #333;
        border: 1px solid #ccc;
        padding: 9px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 14px;
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }
    .btn-action-outline:hover {
        border-color: #B88B4A;
        color: #B88B4A;
    }
    </style>
</head>

<body style="background:#faf8f4;">

<?php 
require('inc/header.php'); 

$checkin_default="";
$checkout_default="";
$adult_default="";
$children_default="";

if(isset($_GET['check_availability']))
{
    $frm_data = filteration($_GET);
    $checkin_default = $frm_data['checkin'];
    $checkout_default = $frm_data['checkout'];
    $adult_default = $frm_data['adult'];
    $children_default = $frm_data['children'];
}
?>

<h2 class="title">DANH SÁCH PHÒNG</h2>
<div class="line"></div>

<div class="container">

    <div class="sidebar">

        <div class="floor-menu">
            <div class="floor-menu-title">Danh sách tầng</div>
            <button class="floor-btn active" data-floor="all"><span>Tất cả các phòng</span></button>
            <button class="floor-btn" data-floor="1"><span>Tầng 1</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="2"><span>Tầng 2</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="3"><span>Tầng 3</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="4"><span>Tầng 4</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="5"><span>Tầng 5</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="6"><span>Tầng 6</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="7"><span>Tầng 7</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="8"><span>Tầng 8</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="9"><span>Tầng 9</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
            <button class="floor-btn" data-floor="10"><span>Tầng 10</span> <span style="font-size: 13px; font-weight: 500;">10 phòng</span></button>
        </div>

        <div class="box">
            <h4>Kiểm tra phòng</h4>
            <label>Nhận phòng</label>
            <input type="date" id="checkin" class="form-control" value="<?php echo $checkin_default ?>">
            <label>Trả phòng</label>
            <input type="date" id="checkout" class="form-control" value="<?php echo $checkout_default ?>">
        </div>

        <div class="box">
            <h4>Khách</h4>
            <input type="number" id="adults" class="form-control" placeholder="Người lớn" value="<?php echo $adult_default ?>">
            <input type="number" id="children" class="form-control" placeholder="Trẻ em" value="<?php echo $children_default ?>">
            <div style="background:#fffbeb; border:1px solid #fde68a; border-radius:6px; padding:10px 12px; font-size:12px; color:#78350f; line-height:1.8; margin-top:4px;">
                <div style="font-weight:700; margin-bottom:2px;">
                    <i class="bi bi-info-circle-fill" style="color:#d97706;"></i> Chính sách trẻ em
                </div>
                <div>• Dưới 10 tuổi: <strong>miễn phí</strong></div>
                <div>• Từ 10–16 tuổi: <strong>+7% giá phòng / đêm / trẻ</strong></div>
                <div>• Trên 16 tuổi: tính như <strong>người lớn</strong></div>
            </div>
        </div>

        <div class="box">
            <h4>Tiện ích</h4>
            <?php 
            $facilities_q = selectAll('facilities');
            while($row = mysqli_fetch_assoc($facilities_q))
            {
                echo "
                <div>
                    <input type='checkbox' name='facilities' value='$row[id]'> $row[name]
                </div>";
            }
            ?>
        </div>

    </div>

    <div class="content" id="rooms-data"></div>

</div>

<script>
let rooms_data = document.getElementById('rooms-data');
let checkin = document.getElementById('checkin');
let checkout = document.getElementById('checkout');
let adults = document.getElementById('adults');
let children = document.getElementById('children');

// Khai báo biến lưu tầng hiện tại
let selected_floor = 'all';

// XỬ LÝ KHI CLICK VÀO CÁC TẦNG
document.querySelectorAll('.floor-btn').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); 
        
        // Đổi màu nút
        document.querySelectorAll('.floor-btn').forEach(el => el.classList.remove('active'));
        this.classList.add('active');
        
        // Cập nhật giá trị tầng và gọi hàm tải lại phòng
        selected_floor = this.getAttribute('data-floor');
        fetch_rooms(); 
    });
});

// TỰ ĐỘNG CHỌN TẦNG NẾU CÓ ?floor=N TRONG URL
(function(){
    var params = new URLSearchParams(window.location.search);
    var floor = params.get('floor');
    if(floor){
        var link = document.querySelector('.floor-btn[data-floor="' + floor + '"]');
        if(link){
            document.querySelectorAll('.floor-btn').forEach(el => el.classList.remove('active'));
            link.classList.add('active');
            selected_floor = floor;
        }
    }
})();

function fetch_rooms(){
    let chk_avail = JSON.stringify({
        checkin: checkin.value,
        checkout: checkout.value
    });

    let guests = JSON.stringify({
        adults: adults.value,
        children: children.value
    });

    let facility_list = {facilities:[]};
    document.querySelectorAll('[name="facilities"]:checked').forEach(el=>{
        facility_list.facilities.push(el.value);
    });
    facility_list = JSON.stringify(facility_list);

    let xhr = new XMLHttpRequest();
    
    // ĐÃ THÊM BIẾN &floor=... VÀO URL GỬI ĐI
    xhr.open("GET","ajax/rooms.php?fetch_rooms&chk_avail="+chk_avail+"&guests="+guests+"&facility_list="+facility_list+"&floor="+selected_floor, true);

    xhr.onprogress = function(){
        rooms_data.innerHTML = "<div class='error'>Loading...</div>";
    }

    xhr.onload = function(){
        rooms_data.innerHTML = this.responseText;
    }

    xhr.send();
}

// Sync header picker → sidebar khi header picker thay đổi
document.addEventListener('headerDateChanged', function(e) {
    if (e.detail && e.detail.checkin)  checkin.value  = e.detail.checkin;
    if (e.detail && e.detail.checkout) checkout.value = e.detail.checkout;
    fetch_rooms();
});

window.onload = function() {
    setTimeout(function() {
        // Sync ngày từ sessionStorage nếu sidebar trống
        var _ci = sessionStorage.getItem('ks_checkin');
        var _co = sessionStorage.getItem('ks_checkout');
        if (!checkin.value  && _ci) checkin.value  = _ci;
        if (!checkout.value && _co) checkout.value = _co;
        // Sync số khách từ sessionStorage nếu sidebar trống
        var _ad = sessionStorage.getItem('ks_adult');
        var _ch = sessionStorage.getItem('ks_children');
        if (!adults.value   && _ad) adults.value   = _ad;
        if (children.value === '' && _ch !== null) children.value = _ch;
        fetch_rooms();
    }, 50);
};

checkin.addEventListener('change', fetch_rooms);
checkout.addEventListener('change', fetch_rooms);
adults.addEventListener('input', fetch_rooms);
children.addEventListener('input', fetch_rooms);

document.querySelectorAll('[name="facilities"]').forEach(checkbox => {
    checkbox.addEventListener('change', fetch_rooms);
});

function getActiveCheckin() {
    // Ưu tiên sidebar, nếu trống thì lấy từ header picker
    var val = document.getElementById('checkin').value;
    if (!val && typeof checkinDate !== 'undefined' && checkinDate) {
        var d = checkinDate;
        val = d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0');
    }
    return val;
}
function getActiveCheckout() {
    var val = document.getElementById('checkout').value;
    if (!val && typeof checkoutDate !== 'undefined' && checkoutDate) {
        var d = checkoutDate;
        val = d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0');
    }
    return val;
}

function checkLoginToBook(status, room_id, room_no) {
    if (status) {
        var checkin_val  = getActiveCheckin();
        var checkout_val = getActiveCheckout();
        var adult_val    = document.getElementById('adults').value
                           || sessionStorage.getItem('ks_adult') || 1;
        var children_el  = document.getElementById('children');
        var children_val = (children_el && children_el.value !== '')
                           ? children_el.value
                           : (sessionStorage.getItem('ks_children') || 0);
        var url = 'confirm_booking.php?id=' + room_id + '&room_no=' + room_no;
        if (checkin_val)  url += '&checkin='  + checkin_val;
        if (checkout_val) url += '&checkout=' + checkout_val;
        url += '&adult=' + adult_val + '&children=' + children_val;
        window.location.href = url;
    } else {
        openModal('loginModal');
    }
}
</script>

<?php require('inc/footer.php'); ?>

</body>
</html>