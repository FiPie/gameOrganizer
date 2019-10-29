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
        <title>Edit user by Admin</title>        
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if (($logged == FALSE) || ($_SESSION['isAdmin'] != TRUE)) {
                header('Location: /gameOrganizer/index.php');
            }
            require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/core/userService.php';
            ?>

            <div class="container">
                <!-- Insert/Drop Grid Row codes below -->

                <div class="row justify-content-center"> 
                    <form action="/gameOrganizer/core/userService.php" method="POST">
                        <div class="form-group"> 

                            <input class="form-control" type="hidden" name="userID" value="<?= $_GET["id"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Name</label>
                            <input class="form-control" type="text" name="userName" value="<?= $_GET["userName"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $_GET["email"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Phone no.</label>
                            <input class="form-control" type="text" name="phone" value="<?= $_GET["phone"] ?>">
                        </div>
                        <div class="form-group"> 
                            <label>Admin privilege</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="isAdmin" value="0" checked="true">false
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="isAdmin" value="1">true
                                </label>
                            </div>
                        </div>
                        <div class="form-group">     
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?></body>
</html>
