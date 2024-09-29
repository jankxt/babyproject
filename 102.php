<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    * {
    margin: 20;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 20px;
}

/* ภาพหน้าปก */
.cover-photo img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

/* ส่วนโปรไฟล์ */
.profile-section {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0,0, 0.1);
    position: relative;
    margin-top: -100px;
}

.profile-photo img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 5px solid white;
    object-fit: cover;
}

.profile-info {
    margin-left: 20px;
}

.profile-info h1 {
    font-size: 2rem;
    margin : 28;
    margin-bottom: 10px;
}

.profile-info p {
    color: #666;
}

/* เมนูบาร์ */
.menu-bar {
    background-color: white;
    margin-top: 20px;
    padding: 10px 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.menu-bar ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
}

.menu-bar ul li {
    margin: 0 10px;
}

.menu-bar ul li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

.menu-bar ul li a:hover {
    color: #0077b5;
}

/* คลังรูปภาพ */
.gallery {
    margin-top: 20px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.gallery h2 {
    margin-bottom: 20px;
    font-size: 1.5rem;
    text-align: center;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 10px;
}

.gallery-grid img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.gallery-grid img:hover {
    transform: scale(1.05);
}
/* ช่องทางการติดต่อ */
.contact {
    margin-top: 40px;
    text-align: center;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.contact-links {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.contact-link {
    font-size: 1.2rem;
    text-decoration: none;
    color: #333;
}

.contact-link i {
    margin-right: 8px;
}

.contact-link:hover {
    color: #0077b5;
}

/* ส่วนท้าย */
footer {
    margin-top: 40px;
    text-align: center;
    color: #777;
    padding: 10px;
}
</style>
</head>
<body>
    <!-- ภาพหน้าปก -->
    <div class="cover-photo">
        <img src="imge/download (2).jpg" alt="ภาพหน้าปก">
    </div>

    <!-- ภาพโปรไฟล์และข้อมูลส่วนตัว -->
    <div class="profile-section">
        <div class="profile-photo">
            <img src="imge/458510852_864844662281536_1768440339605621693_n.jpg" alt="ภาพโปรไฟล์ของลีโอ">
        </div>
        <div class="profile-info">
            <h1>คีร์ระดา เทพพิทักษ์ (แจน)🐰</h1>
            <p>654274102| เพชรบุรี, ประเทศไทย | คติประจำใจ : ใช้ชีวิตวันต่อวันแล้วจะใช้ชีวิตดีขึ้นเสมอ |  ☎︎  : 095-7929823 </p>
        </div>
    </div>

    <!-- คลังรูปภาพ -->
    <section class="gallery">
        <h2>รูปภาพ</h2>
        <div class="gallery-grid">
            <img src="imge/458295918_3890362644554852_5032128326736628337_n.jpg" alt="ภาพ 1">
            <img src="imge/458405582_408103005291560_5078900311771031714_n.jpg" alt="ภาพ 2">
            <img src="imge/457815827_484868094449604_4678847843501786838_n.jpg" alt="ภาพ 3">
            <img src="imge/457735709_3646697678881139_5345910885302764116_n.jpg" alt="ภาพ 4">
        </div>
    </section>
    <!-- ช่องทางการติดต่อ -->
    <section class="contact">
        <h2>ช่องทางการติดต่อ</h2>
        <div class="contact-links">
            <a href="https://www.facebook.com/profile.php?id=100013182213637" target="_blank" class="contact-link">
                <i class="fab fa-facebook-square"></i> Facebook
            </a>
            <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F_u%2Fjankxt%3Ffbclid%3DIwZXh0bgNhZW0CMTAAAR3WcT8tCyLrChWmHwon0OLQ1PK5kJv8TTBDh9zxdOGuPgTzKIitRtL1erE_aem_cLBr4mulQWAZjujWABPyQw&h=AT2Tq2d1rDZ2S7jlkDK7bBuEnVq2zIaokVISzFNoxBr4hp6har5kJdH2g3nPg1PtDlKd07dw8yhhQgSeCcZIoIIBA13xmyPrtJkK0YNM8LakLASyrDDBAqS6uMlZ08YE-n5ocsttwoeXx9Nv" target="_blank" class="contact-link">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="https://mail.google.com/mail/u/0/?hl=en#inbox" class="contact-link">
                <i class="fas fa-envelope"></i> Gmail
            </a>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 jankxt. </p>
    </footer>
</body>
</html>
