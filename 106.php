<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติส่วนตัวของฉัน</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* ตั้งค่าเบื้องต้น */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* การออกแบบ Header */
header {
    background: #b0e0e6 ;
    color: white;
    padding: 20px;
    text-align: center;
}

header .container {
    max-width: 1200px;
    margin: 0 auto;
}

.profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 3px solid white;
    margin-top: 10px;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 4px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline;
}

/* การออกแบบ Main Content */
main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
}

section {
    background: white;
    padding: 20px;
    margin-bottom: 1px;
    border-radius: 1px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* การออกแบบ Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: relative;
    bottom: 0;
    width: 100%;
}
</style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Nichaphat Khamphuang</h1>
            <img src="imge/456614543_508233468820163_7225155231032955045_n.jpg" alt="Profile Picture" class="profile-img">
            <nav>
                <ul>
                    <li><a href="#about">About me</a></li>
                    <li><a href="#education">my sky</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="about">
            <h2>About me</h2>
            <p>นางสาวณิชาภัทร ขำพวง (น้องเนม) 
                (654274106) อายุ 20 ขวบ    
                งานอดิเรก : ดูหนัง ฟังเพลง และนอนวันละ 24 ชั่วโมง  
                คติประจำใจ : ถ้าคนอื่นทำได้ให้เขาทำไปเลย
            </p>
        </section>
        <section id="portfolio">
            <h2>my sky</h2>
            <img src="imge/457729498_484111081188056_8243891721011319547_n.jpg">
            <img src="imge/457788028_1628393618035075_3384873250116526866_n.jpg">
            <img src="imge/457788028_1628393618035075_3384873250116526866_n.jpg">
        </section>
        <section id="contact">
            <h2>contact</h2>
            <a href="https://www.facebook.com/profile.php?id=100025268011780" target="_blank" title="Facebook">
      <span class="material-icons">facebook</span> <!-- Facebook icon -->
    </a>
    <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F_u%2Fxnncp_%3Ffbclid%3DIwZXh0bgNhZW0CMTAAAR1_BFfzVeLXh0qyBo1EPAv-FG68I6v4sQAKTnmukbG9D2jgO4V2663G2YY_aem_ugjQrB6kiTjE55lOh7DEIA&h=AT3n1n5gOVUti4OmkqHLAmHGIdUljBKFlLWhbEYuvFTcUEBja31HeN_XISKK-DNx_s5-J1gT1OnxeXwXa3YA-cLPRNBjjNB8ScpXNcKEW7hS2QHAERP5g9uj9Ng2Z7jusT9t44jcS72JBhya" target="_blank" title="Instagram">
      <span class="material-icons">instagram</span> <!-- Instagram icon -->
    </a>
        </section>
    </main>
</body>
</html>
