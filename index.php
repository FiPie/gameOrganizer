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
        <?php 
            
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
        ?>
        <h1>Organizer</h1>
        <?php
        if ($logged) {
            echo "<p>Alright then, you seem to have the proper clearance... <br>"
            . "Here it goes, our secret: There is no secret! <br>"
            . "All is as it seems! Seriously.<br> If it quacks like a duck<br>"
            . "And it looks like a duck<br>And it walks like a duck<br>"
            . "It is most definitely your government plotting to implant you with<br>"
            . "brainwashing TV content in order bend you towards its populistic stuffing<br>"
            . "NOW Logout quickly or THEY will know that you know! :O</p><br>";
        }
        ?>



        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      

    </body>
</html>
