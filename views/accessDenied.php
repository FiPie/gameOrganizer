<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>echec</title>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Optional Bootstrap Theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <?php
        echo '<style>';
        include $_SERVER['DOCUMENT_ROOT'] . "/gameOrganizer/css/styles.css";
        echo '</style>';
        ?>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php
            if (isset($_SESSION['logged']) == FALSE || $_SESSION['logged'] == FALSE) {
                echo "<br><div class='container text-center'><h1 style='color:white;'>" . $_SESSION["promptMessage"] . "</h1></div><br>";
                unset($_SESSION["promptMessage"]);
                echo "<div class='container text-center'><label>Why don't you give it another try?</label>
            <a class='btn btn-primary' role='button' href='/gameOrganizer/views/loginForm.php'>Login</a></div>";
            }
            ?>


        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?></body>
</body>
</html>
