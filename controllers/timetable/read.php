<?php
date_default_timezone_set('Europe/London');
//read.php

//include_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';
//
//$connection = connectDatabase();
//if (!$connection) {
//    die("Connection error: " . mysqli_connect_errno());
//};
$connect = new PDO('mysql:host=localhost:3306;dbname=organizer_db', 'organizator', 'organizatorPassword');

$data = array();
$query = "SELECT * FROM events ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}
echo json_encode($data);
?>