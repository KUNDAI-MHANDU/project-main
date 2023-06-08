<?php
function generateOTP() {

    $otp = random_int(100000, 999999);

    return $otp;
}


function student_id(){
    $student_id = random_int(1000000, 9999999);

    return $student_id;
}

function request_id(){
    $request_id = random_int(10000, 99999);

    return $request_id;
}

function attachment_id(){
    $attachment_id = random_int(10000, 99999);

    return $attachment_id;
}

function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function validateNotEmpty($input, $fieldName)
{
    if (empty($input)) {
        return "$fieldName is required.";
    }
    return "";
}

?>