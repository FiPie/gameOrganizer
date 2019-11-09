<?php
date_default_timezone_set('Europe/London');
//create.php

//include_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';
//
//$connection = connectDatabase();
//if (!$connection) {
//    die("Connection error: " . mysqli_connect_errno());
//};

$connect = new PDO('mysql:host=localhost:3306;dbname=organizer_db', 'organizator', 'organizatorPassword');
if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
 
}
?>