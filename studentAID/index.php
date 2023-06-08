<?php
session_start();

require_once "./Config/server.php";

if (isset($_POST["Sign_In"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM `students` WHERE `email` = '$email'";
  
  $result = mysqli_query($conn,$query);

  if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
  }else{
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $verifyPassword = $row['password'];
    
        if (password_verify($password, $verifyPassword)) {
          $_SESSION['username'] = $row['name'];
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['student_id'] = $row['student_id'];

          header("Location: homepage.php");
        }else {
          $_SESSION['messeage'] = "<div class='red'>Invalid email or password.</div>";
        }
    }
}

  // mysqli_stmt_close($stmt);
  // mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Css/SignUp.css" />
    <style>
      .green{
        background: #ccffcc;
        padding: 10px;
        border-radius: 10px;
      }
      .red{
        background: #ffcccb;
        padding: 10px;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <!-- <div class="header">
        <div class="main-logo">
            <img src="./images/logo.png" alt="easyclass" />
            <h4 id="AID">Student AID</h4>
        </div>
        <div class="navbar">
            <a href="Home.html">Home</a>
            <a href="Maintenance.html">Maintenance</a>
            <a href="WhereAbout.html">WhereAbout</a>
            <a href="About.html">About</a>
            <a href="Contact.html">Contact</a>
        </div>
        <div class="signup">
            <a id="Signup" href="SignUp.html">Sign up</a>
        </div>
    </div> -->
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
            <form method="post" action="" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="./images/logo.png" alt="easyclass" />
                <h4>Student AID</h4>
              </div>
              <div class="heading">
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <?php

                    if(empty($_SESSION['messeage'])){
                      echo '';
                    }else{
                      echo $_SESSION['messeage'];
                      $_SESSION['messeage'] = '';
                    }
                
                ?>
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="email"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="password"
                    required
                  />
                  <label>Password</label>
                </div>

                <button type="submit" name="Sign_In" class="sign-btn">Sign In</button>

                <p class="text">
                  Forgotten your password or your login datails?
                  <a href="forgot.php">Get help</a> signing in
                </p>
              </div>
            </form>

            <form id="myForm" action="signup-proc.php" autocomplete="off" class="sign-up-form" method="post">
              <div class="logo">
                <img src="./images/logo.png" alt="easyclass" />
                <h4>Student AID</h4>
              </div>
              <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
              </div>
              <?php
                  if(empty($_SESSION['messeage'])){
                    echo '';
                  }else{
                    echo $_SESSION['messeage'];
                    $_SESSION['messeage'] = '';
                  }
              ?>
              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="email"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    class="input-field"
                    autocomplete="off"
                    name="password"
                    required
                  />
                  <label>Password</label>
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

                <button type="submit" name="Sign_up" class="sign-btn">Sign Up</button>
                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
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
      <?php
          if(empty($_SESSION['invalid'])){
            echo '';
          }else{
            echo $_SESSION['invalid'];
            $_SESSION['invalid'] = '';
          }
      ?>
    </main>
  

    <!-- Javascript file -->

    <script src="./Javascript/signup.js"></script>
  </body>
</html>