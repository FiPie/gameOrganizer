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

function showDatabases(){
     $query = "SHOW DATABASES";
     return $query;
}

function createUserTable(){
    $query = "CREATE TABLE IF NOT EXISTS users (
userID int(11) NOT NULL AUTO_INCREMENT,
userName varchar(30) NOT NULL,
password varchar(255) NOT NULL,
isAdmin tinyint(1) NOT NULL DEFAULT '0',
PRIMARY KEY (userID),
UNIQUE KEY (userName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}

?>