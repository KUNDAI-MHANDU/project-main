<?php
session_start();
require "./Config/server.php";
require_once "functions.php";

$studentId = student_id();
$verification = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $otp = $_POST['otp'];

    if (isset($_SESSION['otp'])) {
     
        if ($_SESSION['otp'] == $otp) {

            $code =  mysqli_real_escape_string($conn, $_SESSION['otp']);
            $email = mysqli_real_escape_string($conn, $_SESSION['email']);
            $hashedPassword = password_hash($_SESSION['password'], PASSWORD_BCRYPT);
            $password = mysqli_real_escape_string($conn, $hashedPassword);

            $query = "INSERT INTO `students` (`student_id`, `email`, `code`, `password`, `date`) 
            VALUES ('$studentId', '$email', '$code', '$password', NOW())";

            if (mysqli_query($conn, $query)){

              header("Location: created.php");
              exit();
            }else {

              echo "an error has accured please try again" . mysqli_error($conn);
          }
 
        } else {
            
            $verification = "<div class='red'>Incorrect verification code</div>";
        }
    } else {
        // Display an error message if the OTP session variable is not set
        echo 'OTP session variable not set'. '<br/>';
    }

    // echo $otp . '<br/>';
}

// echo $_SESSION['otp']. '<br/>';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verification</title>
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
                <?php
                    echo $verification;
                ?> 
                <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    name="otp"
                    required
                  />
                  <label>Enter verification code here</label>
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
