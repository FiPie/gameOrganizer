<?php
date_default_timezone_set('Europe/London');
//include_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';
//
//$connection = connectDatabase();
//if (!$connection) {
//    die("Connection error: " . mysqli_connect_errno());
//};
//delete.php
if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost:3306;dbname=organizer_db', 'organizator', 'organizatorPassword');
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}
?>