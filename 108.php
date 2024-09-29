<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <!-- นำเข้า Google Fonts และ Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
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
    font-family: 'Prompt', sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* การจัดวางปก */
.cover {
    width: 100%;
    max-width: 1000px;
    background-color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    border-radius: 8px;
    overflow: hidden;
}

/* รูปปกไลน์ */
.cover-photo {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

/* ส่วนของโปรไฟล์ */
.profile-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: -60px;
}

.profile-photo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.profile-info {
    margin-left: 20px;
    text-align: left;
}

.profile-info h1 {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.profile-info p {
    font-size: 1rem;
    font-weight: 300;
    margin-bottom: 5px;
}

/* ลิงก์โซเชียลมีเดีย */
.social-links {
    margin-top: 20px;
}

.social-links a {
    font-size: 2rem;
    color: #333;
    margin: 0 10px;
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #1da1f2;
}

        </style>
</head>
<body>
    <div class="cover">
        
            <!-- รูปโปรไฟล์ -->
            <div class="profile-photo">
                <img src="imge/459368736_903962701637023_8242035061663190445_n.jpg" alt="โปรไฟล์">
            </div>
            <div class="profile-info">
                <h1>ทัศน์พล ยอดใจ</h1>
                <p>654274108</p>
                <p>ชื่อเล่น: แบงค์</p>
                <p>วันเกิด: 15 กันยายน 2003</p>
                <p>คติประจำใจ : มาช้าดีกว่าไม่มา</p>
            </div>
        </div>
        <!-- ลิงก์โซเชียลมีเดีย -->
        <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=100004501577944" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/thatphonn_46/?fbclid=IwY2xjawFTd4JleHRuA2FlbQIxMAABHX4czciEX-rXRGpmozXWe6bF5Pk3qg7KH5GBUuSFgapIyga6JrG4L8gZ3A_aem_QGTC0bcyS_b7ATAF2hPHww" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</body>
</html>
