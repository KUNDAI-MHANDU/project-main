<?php
session_start();
require "./Config/server.php";
require_once "functions.php";

$email = $_SESSION['email'];

$number = '';
if (isset($_POST["s_submit"])) {

    $title = sanitizeInput($_POST["title"]);
    $fullName = sanitizeInput($_POST["fullName"]);
    $surname = sanitizeInput($_POST["surname"]);
    $maidenName = sanitizeInput($_POST["maidenName"]);
    $citizen = sanitizeInput($_POST["citizen"]);
    $idNum = sanitizeInput($_POST["idNum"]);
    $passport = sanitizeInput($_POST["passport"]);
    $ethnicity = sanitizeInput($_POST["ethnicity"]);
    $maritalStatus = sanitizeInput($_POST["maritalStatus"]);
    $homeLanguage = sanitizeInput($_POST["HL"]);
    $residence = sanitizeInput($_POST["s_residence"]);
    $address = sanitizeInput($_POST["Address"]);
    $city = sanitizeInput($_POST["city"]);
    $province = sanitizeInput($_POST["province"]);
    $postalCode = sanitizeInput($_POST["postalCode"]);
    $number = sanitizeInput($_POST["saNumber"]);

    $errors = array();

    $errors[] = validateNotEmpty($fullName, "Full Name");
    $errors[] = validateNotEmpty($surname, "Surname");
    $errors[] = validateNotEmpty($address, "Address");
    $errors[] = validateNotEmpty($city, "City");
    $errors[] = validateNotEmpty($province, "Province");
    $errors[] = validateNotEmpty($postalCode, "Postal Code");

    // Remove empty error messages
    $errors = array_filter($errors);

    // If there are no validation errors, proceed with further processing
    if (empty($errors)) {
            

        $query = "UPDATE `students` SET
                    `name` = '$fullName',
                    `surname` = '$surname',
                    `contact` = '$number',
                    `sa_citizen` = '$citizen',
                    `idNumber` = '$idNum',
                    `passport` = '$passport',
                    `Ethnicity` = '$ethnicity',
                    `marital_status` = '$maritalStatus',
                    `home_language` = '$homeLanguage',
                    `residence` = '$residence'
                WHERE `email` = '$email'";

        if (mysqli_query($conn, $query)){
            
            $sql = "INSERT INTO student_address (email, home_address, city, province, postal_code)
            VALUES ('$email', '$address', '$city', '$province', '$postalCode')";

            if (mysqli_query($conn, $sql)){

                $_SESSION['username'] = $fullName;

                $_SESSION['surname'] = $surname;

                header("Location: dashboard.php");
            }else {

                echo "an error has accured please try again" . mysqli_error($conn);
            }
        }else {

            echo "an error has accured please try again  " . mysqli_error($conn);
        }
    }
}


?>
