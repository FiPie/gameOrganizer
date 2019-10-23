<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>success</title>
    </head>
    <body>
        <?php
        
        
        if ($_SESSION['logged'] == TRUE) {

            echo "<h2 style='color:green;'>".$_SESSION["promptMessage"]."</h2><br>";
            unset($_SESSION["promptMessage"]);
            echo "<button><a href='/gameOrganizer/index.php'>Homepage</a></button>";
            echo "<button><a href='/gameOrganizer/controllers/logoutHandler.php'>Logout</a></button><br>";
        } else if ($_SESSION['logged'] == FALSE or isset($_SESSION['logged']) == FALSE) {
            header('Location: /gameOrganizer/views/loginForm.php');
        }
        ?>
    </body>
</html>
