<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Obecnosc</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if ($logged == FALSE) {
                header('Location: /gameOrganizer/index.php');
            }
            ?>
            <div class="container">
                <div class='row justify-content-center'>
                    <h1>Obecnosc</h1>
                </div>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      
    </body>
</html>