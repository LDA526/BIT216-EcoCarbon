<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once '../dbh.inc.php';
    require_once 'custsignup_model.inc.php';
    require_once 'custsignup_contr.inc.php';
    require_once '../config_session.inc.php';
    
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $contactno = $_POST["contactno"];
    $commute = $_POST["commute"];
    $energy = $_POST["energy"];
    $diet = $_POST["diet"];

    $errors = [];

    // if(!is_contactno_valid($contactno)) {
    //     $errors["invalid_number"] = "Contact Number must be numbers!";
    // }
    if(is_input_empty($username, $fullname, $email, $contactno, $commute, $energy, $diet)) {
        $errors["empty_input"] = "Fill in all fields!";
    }
    if(is_email_invalid($email)) {
        $errors["invalid_email"] = "Invalid email used!";
    }
    if(is_username_taken($mysqli, $username)) {
        $errors["taken_username"] = "Username is already taken!";
    }
    if(is_email_registered($mysqli, $email)) {
        $errors["taken_email"] = "Email is already registered!";
    }

    if (!empty($errors)) {
        $_SESSION["error_signup"] = $errors;
        $signupData = [
            "username" => $username,
            "fullname" => $fullname,
            "email" => $email,
            "contactno" => $contactno,
            "commute" => $commute,
            "energy" => $energy,
            "diet" => $diet
        ];
        $_SESSION["signup_data"] = $signupData;
        header("Location: ../../cust_registration.php");
        die();
    }

    $pwd = "default";

    create_user($mysqli, $username, $pwd, $email, $contactno, $commute, $energy, $diet);

    // send mail
    $to = $email;
    $subject = "User Account Confirmation";
    $message = "Thank you for registering to EcoCarbon. \r\n \r\n
                
                Your username is " . $username . ".\r\n
                Your new password is " . $pwd . ".";

    $headers = "From: ecocarbon@helplive.edu.my\r\n";
    $headers .= "Reply-To: ecocarbon@helplive.edu.my\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully";
    }
    else {
        echo "Failed to send email";
    }

    header("Location: ../../signupsuccess.php");
    die();

    $mysqli = null;
    $stmt = null;

} else {
    header("Location: ../../cust_registration.php");
    die();
}