<?php
session_start();
?>

<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
};


function createTimeTableTable(){
    $query = "CREATE TABLE IF NOT EXISTS events (
id int(11) NOT NULL AUTO_INCREMENT,
title varchar(100) NOT NULL DEFAULT 'Piłka nożna',
start_event datetime NOT NULL,
end_event datetime NOT NULL,
created timestamp DEFAULT CURRENT_TIMESTAMP,
modified timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
active tinyint(1) NOT NULL DEFAULT '1',
PRIMARY KEY (id),
UNIQUE KEY (start_event)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}
