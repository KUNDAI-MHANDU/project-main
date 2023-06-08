<?php
session_start();
require "./Config/server.php";
require_once "functions.php";

$verification = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = sanitizeInput($_POST["password"]);
    $password2 = sanitizeInput($_POST["password2"]);
    $email =  $_SESSION['femail'];

    if ($password == $password2) {
        
        $hashedPassword = password_hash($password2, PASSWORD_DEFAULT);

        $sql = "UPDATE students SET password = '$hashedPassword' WHERE email = '$email'";

        if (mysqli_query($conn, $sql)){

            header("Location: succ_change.php");
        }else{

            $verification = "<div class='red'>This email Account doesnot exists you need to create an account</div>";
        }
    } else{

        $verification = "<div class='red'>Passwords do not match</div>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Css/SignUp.css" />
    <style>
       .red{
        background: #ffcccb;
        padding: 10px;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
  <div class="header">
        <div class="main-logo">
            <img src="./images/logo.png" alt="easyclass" />
            <h4 id="AID">Student AID</h4>
        </div>
        <div class="navbar">
            <a href="homepage.php">Home</a>
            <a href="dashboard.php">Maintenance</a>
            <a href="whereAbout.html">WhereAbout</a>
            <a href="admin-dash.php">Admin</a>
        </div>
        <div class="signup">
            <a id="Signup" href="signout.php">Sign Out</a>
        </div>
    </div>
    <div class="social-links">
        <a class="links" href=""><img id="img1" src="./images/NicePng_black-and-white-facebook_3211139.png" alt=""></a>
        <a class="links" href=""><img id="img2" src="./images/NicePng_twitter-icon-png_209794.png" alt=""></a>
        <a class="links" href=""><img id="img3" src="./images/NicePng_twitter-logo-png-transparent_41495.png" alt=""></a>
        <a class="links" href=""><img id="img4" src="./images/NicePng_white-youtube-logo-png_1990174.png" alt=""></a>
    </div>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="" autocomplete="off" class="sign-in-form" method="post">
                <div class="logo">
                    <img src="./images/logo.png" alt="easyclass" />
                    <h4>Student AID</h4>
                </div>
                <h2>Change Your Password</h2>
                <h6>Forgot Your Password Create a new Password</h6>
                <?php
                    echo $verification;
                ?> 
                <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="password"
                    required
                  />
                  <label>New Password</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="password2"
                    required
                  />
                  <label>Confirm Password</label>
                </div>

              </div>
              <input type="submit" value="Verify" class="sign-btn" />
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./images/image1.png" class="image img-1 show" alt="" />
              <img src="./images/image2.png" class="image img-2" alt="" />
              <img src="./images/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Know the safety of your surroundings</h2>
                  <h2>Maximize your university experience</h2>
                  <h2>Empowering students. Students life first</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="./Javascript/signup.js"></script>
  </body>
</html>
