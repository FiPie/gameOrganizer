<?php
session_start();

unset($_SESSION['logged']);
unset($_SESSION['name']);
unset($_SESSION['userID']);
unset($_SESSION['userName']);
unset($_SESSION['isAdmin']);

//You can also call
//session_destroy();
//but this will delete other data from your session
header('Location: /gameOrganizer/index.php');
?>