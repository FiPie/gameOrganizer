<?php

session_start();

include_once '../config/config.php';


//Get the new values of the record

if (isset($_POST['userName'], $_POST['userPswd'], $_POST['userPswd2'])) {
    if ($_POST['userPswd'] == $_POST['userPswd2']) {
        $user = $_POST['userName'];
        $password = $_POST['userPswd'];
    }
} else {
    echo 'Non valid data';
    exit();
}

//We try to conect the database
$connection = connectDatabase();
if (!$connection) {
    echo 'We have problems when connecting the database<br>';
    echo 'Check your network connection<br>';
    echo 'Is your MySQL server working at this time?<br>';
    echo 'Is there organizer_db database?<br>';
    echo 'Try to log in with phpMyAdminFirst<br>';
    exit();  //This fuction is equivalent to die();
};

//Connection ok. We update the data

$salt_temp = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
$salt = '$2a$10$' . substr($salt_temp, 0, 22);

$hash = crypt($password, $salt);
$query = "INSERT INTO users (userName, password, isAdmin) VALUES ('$user', '$hash', 0)";
$result = mysqli_query($connection, $query);

mysqli_close($connection);


header('Location: /gameOrganizer/index.php');
?>