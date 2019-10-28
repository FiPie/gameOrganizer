<?php
session_start();
?>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
};


if (isset($_POST['save'])) {
    $name = test_input(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
    $data = test_input(filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_var($data, FILTER_SANITIZE_EMAIL);
    $phone = test_input(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS));
    $id = $_SESSION["userID"];

    $connection->query("UPDATE organizer_db.users SET userName='$name', email='$email', phone='$phone' WHERE userID='$id'") or die($connection->error);
    $message = "Dear <b>".$_SESSION['userName']."</b> you have successfully updated your personal info!";
    $_SESSION["promptMessage"] = $message;
    mysqli_close($connection);
    $_SESSION["userName"] = $name;
    $_SESSION['userEmail'] = $email;
    $_SESSION['userPhone'] = $phone;
    header('Location: /gameOrganizer/views/userAccount.php');
}


mysqli_close($connection);
?>
