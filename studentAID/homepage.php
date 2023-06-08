<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/STUDENTAID/Css/home.css">
</head>
<body>
    <div class="header">
        <div class="main-logo">
            <img src="./images/logo.png" alt="easyclass" />
            <h4 id="AID">Student AID</h4>
        </div>
        <div class="navbar">
            <a href="#">Home</a>
            <a href="dashboard.php">Maintenance</a>
            <a href="whereAbout.html">WhereAbout</a>
            <a href="admin-dash.php">Admin</a>
        </div>
        <div class="signup">
            <a id="Signup" href="signout.php">Sign Out</a>
        </div>
    </div>
    <div class="hero"></div>
    <div class="container">
        <div class="content">
            <h1 id="h1">STUDENT AID</h1>
            <p>why have have miserable university life experiance, let's improve that with the student aid. student lifes first</p>
        </div>
    </div>
    <div class="social-links">
        <a class="links" href=""><img id="img1" src="./images/NicePng_black-and-white-facebook_3211139.png" alt=""></a>
        <a class="links" href=""><img id="img2" src="./images/NicePng_twitter-icon-png_209794.png" alt=""></a>
        <a class="links" href=""><img id="img3" src="./images/NicePng_twitter-logo-png-transparent_41495.png" alt=""></a>
        <a class="links" href=""><img id="img4" src="./images/NicePng_white-youtube-logo-png_1990174.png" alt=""></a>
    </div>
    <div class="top-mid-section">
        <div class="mission">
            <h1>Our Mission</h1>
            <p>At Student Aid, our mission is to empower students with the knowledge and tools they need to thrive in a safe and secure environment. We strive to provide timely maintenance services and crime hotspot alerts, ensuring the well-being and peace of mind of students in their daily lives. Through our user-friendly platform, we aim to create a supportive community where students can actively engage, report incidents, and contribute to a safer campus environment.</p>
            <!-- <div class="readmore">
                <a href="">Read More</a>
            </div> -->
        </div>
        <div class="signin">
            <div class="info-contn">
                <h1>Hello Student:</h1>
                <span><?php echo $_SESSION['email'] ?></span>
            </div>
        </div>
        <div class="news">
            <h1>Latest News</h1>
            <p>"Student-Led Initiative Raises Funds for Underprivileged Children's Education"

A group of compassionate students from a local high school has taken the initiative to raise funds for underprivileged children's education in their community. Recognizing the importance of education and the barriers faced by disadvantaged students, these young individuals organized various fundraising events, including a charity auction and a community bake sale. Their efforts have garnered significant support from the community, with local businesses and organizations also contributing to the cause. The funds raised will be used to provide educational resources, scholarships, and mentorship programs for underprivileged children, empowering them to pursue their dreams and break the cycle of poverty.</p>
        </div>
        <div class="subscribe">
            <h1>Subscribe</h1>
            <form class="form" action="">
                <label for="">Subscribe to Our Newsletters</label><br>
                <input type="email" placeholder="Enter your email here*"><br>
                <a href="">Join</a>
            </form>
        </div>
    </div>
    <div class="features">
        <h1>features</h1>
    </div>
    <div class="mid-section">
        <a class="whereAbouts" href="whereAbout.html">
                <div class="whereAbouts-img"></div>
                <p>Whereabouts is a powerful feature that allows users to input their location information and obtain relevant data regarding safety and crime rates. This feature provides users with valuable insights and guidance to ensure their well-being and make informed decisions about their movements.</p>
                <h1>WhereAbout</h1>
        </a>
        <a class="maintenance" href="dashboard.php">
                <div class="maintance-img"></div>
                <p>Maintenance refers to the process of keeping something in proper working condition or preserving its intended functionality. It involves performing routine tasks, inspections, repairs, and upgrades to prevent or address any potential issues that may arise.</p>
                <h1>Maintenance</h1>
        </a>
    </div>
    <div class="hug">
        <div class="contain">
            <div class="overlay">
                <h1>Have a fun experience With StudentAID</h1>
            </div>
        </div>
    </div>
    <div class="new-header">
        <h1>Latest News</h1>
    </div>
    <div class="news-feeds">

    </div>
    <div class="footer">
        <div class="contact">
            <h1>Contact Us</h1>
            <p>Sonneblom street</p>
            <p>Jan Hofmeyer, Johannesburg, 2141</p>
            <p>KundaiMhandu67@gmail.com</p>
        </div>
        <div class="connect">
            <h1>Connect With Us</h1>
            <a href="">Facebook</a>
            <a href="">Twitter</a>
            <a href="">Instagram</a>
            <a href="">YouTube</a>
        </div>
        <div class="subscribe-f">
            <h1>Subscribe</h1>
            <form class="form2" action="">
                <input type="email" placeholder="Email here*">
                <a href="">Join</a>
            </form>
        </div>
    </div>
    <div class="footer2">
        <h1>Improve your Unversity Life With the Student Aid</h1>
    </div>
    <div class="copy-rights">
        <p>© 2023 by Student Aid. Powered and Secured by KUNDAI</p>
    </div>
</body>
</html>