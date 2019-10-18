<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Strona Glowna</title>
    </head>
    <body>
        <?php include 'fragments/menu.php'; ?>
        <h1>Organizer</h1>
        <?php
        if ((isset($_SESSION['logged']) == FALSE) || ($_SESSION['logged'] == FALSE)) {
            echo '<form name="login" method="POST" action="/gameOrganizer/controllers/loginHandler.php">
            <input type="text" name="userName" required="TRUE" placeholder="Please enter your user name:"><br>
            <input type="password" name="userPswd" required="TRUE" placeholder="Please enter your user password:"><br>
            <input type="submit" value="Login">
        </form>';
        } else if ($_SESSION['logged'] == TRUE) {
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
