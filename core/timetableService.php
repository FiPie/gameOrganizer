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
eventID int(11) NOT NULL AUTO_INCREMENT,
eventTitle varchar(30) latin1_polish_ci NOT NULL DEFAULT 'Piłka nożna',
start_event datetime NOT NULL,
end_event datetime NOT NULL,
created datetime NOT NULL,
modified datetime NOT NULL,
active tinyint(1) NOT NULL DEFAULT '1',
PRIMARY KEY (eventID),
UNIQUE KEY (start_event)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}

?>