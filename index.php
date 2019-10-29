<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Strona Glowna</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            ?>
            <div class="container">
                <div class='row justify-content-center'>
                    <h1>Organizer</h1>
                </div>
                <?php
                if ($logged) {
                    echo "<div class='row justify-content-center'>"
                        . "<p>Alright then, you seem to have the proper clearance level... <br>"
                        . "Here it goes, our secret: There is no secret! <br>"
                        . "All is as it seems! Seriously.<br> If it quacks like a duck<br>"
                        . "And it looks like a duck<br>And it walks like a duck<br>"
                        . "It is most definitely your government plotting to implant you with<br>"
                        . "brainwashing TV content in order bend you towards its populistic stuffing<br>"
                        . "NOW Logout quickly or THEY will know that you know! :O</p><br>"
                    . "</div>";
                }
                ?>
            </div>
        </div>


        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      

    </body>
</html>
