<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($_SESSION['logged'] == TRUE) {

            echo "<h2 style='color:green;'>Dear " . $_SESSION['name'] . " you have successfully logged in!</h2><br>";
            echo "<a href='/gameOrganizer/index.php'>Homepage</a><br>";
            echo "<a href='/gameOrganizercontrollers/logoutHandler.php'>Logout</a><br>";
            
        } else {
            echo "<h2>Dear user...You're not welcome here if you're not logged in</h2><br>";
            echo "<a href='index.php'>Homepage</a>";
            if($_SESSION['logged'] == FALSE or isset($_SESSION['logged'])==FALSE){
                header('Location: /gameOrganizer/index.php');
            }
        }
        ?>
    </body>
</html>
