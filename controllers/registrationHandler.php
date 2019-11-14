<?php

session_start();
if ($_SESSION['logged'] == TRUE) {
    header('Location: /gameOrganizer/index.php');
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

//Get the new values of the record

if (isset($_POST['userName'], $_POST['userPswd'], $_POST['userPswd2'], $_POST['userEmail'], $_POST['userPhone'])) {
    if ($_POST['userPswd'] == $_POST['userPswd2']) {
        $user = test_input($_POST['userName']);
        $password = stripslashes(trim($_POST['userPswd']));
        $email = test_input($_POST['userEmail']);
        $phone = test_input($_POST['userPhone']);
    }
} else {
    $message = "Provided data invalid!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    header('Location: /gameOrganizer/views/accessDenied.php');
    exit();
}

//We try to conect the database
$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
    exit();  //This fuction is equivalent to die();
};

//Connection ok. We update the data
$salt_temp = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
$salt = '$2a$10$' . substr($salt_temp, 0, 22);

$hash = crypt($password, $salt);
$query = "INSERT INTO users (userName, password, isAdmin, email, phone) VALUES ('$user', '$hash', 0, '$email', '$phone')";
$result = mysqli_query($connection, $query);

mysqli_close($connection);
$message = "The new user account has been added to the database";
$_SESSION["promptMessage"] = $message;
header('Location: /gameOrganizer/views/accessGranted.php');
