<?php
session_start();
?>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
};

function createAttendanceTable() {
    $query = "CREATE TABLE IF NOT EXISTS attendance (
eventID int(11) NOT NULL,
users_unspecified text,
users_present text,
users_absent text,
users_contusion text,
users_sick text,
PRIMARY KEY (eventID),
UNIQUE KEY (eventID),
FOREIGN KEY(eventID) REFERENCES events(id)
ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}



?>
