<?php
session_start();
?>

<?php
function createUserTable(){
    $query = "CREATE TABLE IF NOT EXISTS users (
userID int(11) NOT NULL AUTO_INCREMENT,
userName varchar(30) NOT NULL,
password varchar(255) NOT NULL,
phone varchar(50) NOT NULL,
email varchar(50) NOT NULL,
isAdmin tinyint(1) NOT NULL DEFAULT '0',
PRIMARY KEY (userID),
UNIQUE KEY (userName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}

//SHOULD I SEND ARGUMENTS TO THE FUNCTION BELOW OR MAKE IT WITH GLOBAL VARIABLES LIKE IN CONNECTION?
function editUser(){
    $userID = $_SESSION['userID'];
    $userName = test_input($_POST['userName']);
    $userEmail = test_input($_POST['userEmail']);
    $userPhone= test_input($_POST['userPhone']);
    $query = "UPDATE `organizer_db`.`users` u WHERE u.userID=$userID (userName, email, phone) VALUES ($userName, $userEmail, $userPhone)";
    return $query;
}
?>