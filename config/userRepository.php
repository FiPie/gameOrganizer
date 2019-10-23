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

function editUser(){
    $query = "";
    return $query;
}
?>