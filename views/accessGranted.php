<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>success</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php'; ?>
            <div class="container">
                
                    <?php
                    if ($_SESSION['logged'] == TRUE) {
                        
                        echo "<br><div class='row justify-content-center'> <h1 style='color:white;'>" . $_SESSION["promptMessage"] . "</h1></div>";
                        unset($_SESSION["promptMessage"]);
                        echo "<div class='row justify-content-center'><div btn-group-vertical>"
                        . "<br><label>Press to continue...</label>"
                        . "<a class='btn btn-primary btn-block' role='button' href='/gameOrganizer/index.php'>Strona Glowna</a>";
                        echo "<label>Press to logout</label>"
                        . "<a class='btn btn-primary btn-block' role='button' href='/gameOrganizer/controllers/logoutHandler.php'>Logout</a>"
                        . "</div></div>";
                    } else if ($_SESSION['logged'] == FALSE or isset($_SESSION['logged']) == FALSE) {
                        header('Location: /gameOrganizer/views/loginForm.php');
                    }
                    ?>
                
            </div>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>
    </body>
</html>
