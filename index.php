<?php
session_start();
?>

<!--MySQLi Object-Oriented-->
//<?php
//$servername = "localhost";
//$username = "username";
//$password = "password";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//?> 

<!--MySQLi Procedural-->
//<?php
//$servername = "localhost";
//$username = "username";
//$password = "password";
//
//// Create connection
//$conn = mysqli_connect($servername, $username, $password);
//
//// Check connection
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
//?> 

<!--PDO-->
<?php
$servername = "localhost";
$username = "root";
$password = "coderslab";
$dbName = "organizer_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> 
<!--The following PDO example create a database named "myDBPDO":-->
         
    <?php
//$servername = "localhost";
//$username = "root";
//$password = "coderslab";
//
//try {
//    $conn = new PDO("mysql:host=$servername", $username, $password);
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Strona Glowna</title>
    </head>
    <body>

        
<?php
if ((isset($_SESSION['logged']) == FALSE) || ($_SESSION['logged'] == FALSE)) {
    echo '<h1>Organizer</h1>';
    echo '<form name="login" method="POST" action="/gameOrganizer/controllers/loginHandler.php">
            <input type="text" name="userName" required="TRUE" placeholder="Please enter your user name:"><br>
            <input type="password" name="userPswd" required="TRUE" placeholder="Please enter your user password:"><br>
            <input type="submit" value="Login">
        </form>';
} else if ($_SESSION['logged'] == TRUE) {
    echo '<h1>Organizer</h1>';
    include 'fragments/menu.php';
    echo "Alright then, you seem to have the proper clearance... <br>"
    . "Here it goes, our secret: There is no secret! <br>"
    . "All is as it seems! Seriously.<br> If it quacks like a duck<br>"
    . "And it looks like a duck<br>And it walks like a duck<br>"
    . "It is most definitely your government plotting to implant you with<br>"
    . "brainwashing TV content in order bend you towards its populistic stuffing<br>"
    . "NOW Logout quickly or THEY will know that you know! :O<br>";
    echo "<br><a href='/gameOrganizer/controllers/logoutHandler.php'>Logout</a><br>";
}
?>



<?php include 'fragments/footer.php'; ?>      
        <script src="js/gameScript.js" charset="utf-8"></script>
    </body>
</html>
