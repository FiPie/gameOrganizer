<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['logged']) == FALSE || $_SESSION['logged'] == FALSE) {
            echo "<h2 style='color:red;'>You see this page as a fallout of an unsuccessful attempt to log in</h2><br>";
            echo "Why don't you give it another try? <a href='/gameOrganizer/views/loginForm.php'>Login</a>";
        }
        ?>
    </body>
</html>
