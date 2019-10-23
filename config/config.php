<?php
//header('Location: /gameOrganizer/index.php');

define("HOST", "localhost:3306");
define("USER", "organizator");
define("PASSWORD", "organizatorPassword");
define("DATA_BASE", "organizer_db");

function connectDatabase() {
    global $host, $user, $password, $dataBase;
    $conn = mysqli_connect(HOST, USER, PASSWORD, DATA_BASE);
    mysqli_set_charset($conn,"utf8");
    return $conn;
}
?>