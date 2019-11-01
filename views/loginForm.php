<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if (isset($_SESSION["promptMessage"])) {
                echo "<h2 style='color:green;'>" . $_SESSION["promptMessage"] . "</h2><br>";
                unset($_SESSION["promptMessage"]);
            }
            ?>
            <div class="container">
                <!-- Insert/Drop Grid Row codes below -->

                <div class="row justify-content-center"> 
                    <form action="/gameOrganizer/controllers/loginHandler.php" method="POST" name="login">
                        <div class="form-group"> 
                            <label>Nazwa użytkownika</label>
                            <input autofocus="true" class="form-control" type="text" name="userName" required="TRUE" placeholder="Podaj nazwę użytkownika:">
                        </div>
                        <div class="form-group"> 
                            <label>Hasło użytkownika</label>
                            <input class="form-control" type="password" name="userPswd" required="TRUE" placeholder="Podaj hasło użytkownika:">
                        </div>
                        <div class="form-group"> 
                            <label>Login</label>
                            <input class="btn btn-primary form-control" type="submit" value="Login">
                        </div>
                        <div class="form-group">   
                            <label>Rejestracja</label>
                            <a class="btn btn-secondary form-control" role="button" href="/gameOrganizer/views/signUpForm.php">Zarejestruj się</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>
    </body>
</html>
