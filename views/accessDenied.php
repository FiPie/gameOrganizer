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
            echo "<h2 style='color:red;'>".$_SESSION["promptMessage"]."</h2><br>";
            unset($_SESSION["promptMessage"]);
            echo "Why don't you give it another try? <a href='/gameOrganizer/views/loginForm.php'>Login</a>";
        }
        ?>
    </body>
</html>
