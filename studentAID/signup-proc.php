<?php
session_start();
require "./Config/server.php";
require "mail.php";
require_once "functions.php";


// Usage example
$_SESSION['otp'] = generateOTP();

$invalid = $success = $Einvalid = '';

if(isset($_POST['Sign_up'])){

    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $password1 = sanitizeInput($_POST['password2']);
    

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){

        if($password === $password1 && !empty($password) && !empty($password1)){

            $checkSql = "SELECT * FROM `students` WHERE `email` = '$email'";

            $checkResult = mysqli_query($conn, $checkSql);
    
            if (mysqli_num_rows($checkResult) > 0){
    
                $_SESSION['messeage'] = "<div class='red'>The email already exists</div>";
                header("Location: index.php");
            }else{

                $_SESSION['password'] = $password1;
                $_SESSION['email'] = $email;
                $message = "your code ". $_SESSION['otp'];
                $subject = "Email verification";
                $recipient = $email;
                send_mail($recipient,$subject,$message);
                header("Location: sent.php");
            }    

        }else{
            $_SESSION['invalid'] = "<div class='red'>Passwords do not match</div>";
        }
    }else{
        $Einvalid = "<div class='red'>The email '$email' is valid</div>";
    }


}


?>