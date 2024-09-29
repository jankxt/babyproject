<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
    <!-- นำเข้า Google Fonts และ Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
/* ตั้งค่าพื้นฐาน */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    font-family: 'Roboto', sans-serif;
    background-color:#D8BFD8 ;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* การจัดวางโปรไฟล์ทวิตเตอร์ */
.twitter-profile {
    width: 100%;
    max-width: 600px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    position: relative;
}

/* ส่วนปก */
.cover-photo img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* รูปโปรไฟล์ */
.profile-details {
    position: relative;
    padding: 20px;
    background-color: white;
}

.profile-photo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid white;
    position: absolute;
    top: -60px;
    left: 20px;
    object-fit: cover;
}

/* ข้อมูลโปรไฟล์ */
.profile-info {
    margin-top: 70px;
    text-align: left;
    padding-left: 150px;
}

.profile-info h1 {
    font-size: 1.5rem;
    font-weight: 700;
}

.profile-info p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

/* ลิงก์โซเชียลมีเดีย */
.social-links {
    margin-top: 15px;
    text-align: 9eft;
}

.social-links a {
    font-size: 2rem;
    color: #1da1f2;
    margin-right: 15px;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #0d8bcd;
}

        </style>
</head>
<body>
<div class="twitter-profile">
        <!-- ส่วนปก -->
        <div class="cover-photo">
            <img src="imge/8dfa5882659e0c92dd74aef2a5ef3db9.jpg" alt="รูปปก">
        </div>
        <!-- รูปโปรไฟล์ -->
        <div class="profile-details">
            <div class="profile-photo">
                <img src="imge/307319845_1749703322069707_87284461336951236_n.jpg" alt="รูปโปรไฟล์">
            </div>
            <!-- ข้อมูลโปรไฟล์ -->
            <div class="profile-info">
                <h1>นายศักดิธัส มิตรดี (ปาย)</h1>
                <p>@pai_ii</p>
                <p>654274116</p>
                <p>อายุ: 20 ปี</p>
                <p>ที่อยู่973/5 ถ.บุรีรมย์ อ.ชะอำ จ.เพชรบุรี 76120</p>
                <p>เวลาว่าง ชอบออกกำลังกาย เช่น วิ่ง เตะตะกร้อ วาดรูป </p>
                <!-- ลิงก์โซเชียล -->
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100010901684765" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="https://www.instagram.com/__pai.i_/?fbclid=IwY2xjawFTedFleHRuA2FlbQIxMAABHUiGGW4sagF1s0i0nyjzkJKrc2d0lDGFyviL3uJGIs8mXAqr24fEz2vRJw_aem_a5oNK2_PmwIIRnhpkQ1PhA" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>