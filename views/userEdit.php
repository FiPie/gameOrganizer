<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Edycja użytkownika</title>        
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if ($logged == FALSE) {
                header('Location: /gameOrganizer/index.php');
            }
            require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/core/userService.php';
            ?>

            <div class="container">
                <!-- Insert/Drop Grid Row codes below -->

                <div class="row justify-content-center"> 
                    <form action="/gameOrganizer/core/userService.php" method="POST">
                        <div class="form-group"> 
                            <label>Nazwa</label>
                            <input class="form-control" type="text" name="name" value="<?= $_SESSION["userName"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $_SESSION["userEmail"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Telefon</label>
                            <input class="form-control" type="text" name="phone" value="<?= $_SESSION["userPhone"] ?>">
                        </div>
                        <div class="form-group">     
                            <button class="btn btn-primary" type="submit" name="save">Zatwierdź zmiany</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?></body>
</html>
