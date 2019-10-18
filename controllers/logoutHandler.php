<?php
session_start();

unset($_SESSION['logged']);
unset($_SESSION['name']);
//You can also call
//session_destroy();
//but this will delete other data from your session
header('Location: /gameOrganizer/index.php');
?>