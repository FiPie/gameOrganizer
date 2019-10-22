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

            echo "<h2 style='color:green;'>Dear " . $_SESSION['userName'] . " you have successfully logged in!</h2><br>";
            echo "<a href='/gameOrganizer/index.php'>Homepage</a><br>";
            echo "<a href='/gameOrganizer/controllers/logoutHandler.php'>Logout</a><br>";
        } else if ($_SESSION['logged'] == FALSE or isset($_SESSION['logged']) == FALSE) {
            header('Location: /gameOrganizer/views/loginForm.php');
        }
        ?>
    </body>
</html>
