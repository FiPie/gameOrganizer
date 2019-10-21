<?php

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







<!--MySQLi Object-Oriented-->
<?php
//$host = "localhost:3306";
//$username = "organizator";
//$password = "organizatorPassword";
//$dataBase = "organizer_db";
//// Create connection
//$conn = new mysqli($host, $username, $password, $dataBase);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully with MySQLi Object-Oriented<br>";

?> 

<!--MySQLi Procedural-->
<?php
//$host = "localhost:3306";
//$username = "organizator";
//$password = "organizatorPassword";
//$dataBase = "organizer_db";
//
//// Create connection
//$conn = mysqli_connect($host, $username, $password, $dataBase);
//
//// Check connection
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully with MySQLi Procedural<br>";
?> 

<!--PDO-->
<?php
//$host = "localhost:3306";
//$username = "organizator";
//$password = "organizatorPassword";
//$dataBase = "organizer_db";
//
//try {
//    $conn = new PDO("mysql:host=$host;dbname=$dataBase", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully with PDO<br>";
//} catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
?> 
<!--The following PDO example create a database named "myDBPDO":-->

<?php
//$host = "localhost:3306";
//$username = "organizator";
//$password = "organizatorPassword";
//
//try {
//    $conn = new PDO("mysql:host=$host", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "CREATE DATABASE myDemoDB";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Database created successfully<br>";
//    }
//catch(PDOException $e)
//    {
//    echo $sql . "<br>" . $e->getMessage();
//    }
//
//$conn = null;
?>