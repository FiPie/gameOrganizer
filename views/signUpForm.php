<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>New User</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php'; ?>

            <div class="container">
                <!-- Insert/Drop Grid Row codes below -->

                <div class="row justify-content-center"> 
                    <form action="/gameOrganizer/controllers/registrationHandler.php" method="POST" name="newUser">
                        <div class="form-group"> 
                            <label>Nazwa użytkownika</label>
                            <input autofocus="true" class="form-control" type="text" name="userName" required="TRUE" placeholder="Podaj nazwę użytkownika:">
                        </div>
                        <div class="form-group"> 
                            <label>Hasło</label>
                            <input class="form-control" type="password" name="userPswd" required="TRUE" placeholder="Wprowadź hasło:">
                        </div>
                        <div class="form-group"> 
                            <label>Potwierdzenie hasła</label>
                            <input class="form-control" type="password" name="userPswd2" required="TRUE" placeholder="Wprowadź hasło jeszcze raz:">
                        </div>
                        <div class="form-group"> 
                            <label>Email</label>
                            <input class="form-control" type="email" name="userEmail" required="TRUE" placeholder="Podaj swój email:">
                        </div>
                        <div class="form-group"> 
                            <label>Telefon</label>
                            <input class="form-control" type="tel" name="userPhone" required="TRUE" placeholder="Wprowadź numer telefonu:">
                        </div>
                        <div class="form-group"> 
                            <label>Stwórz nowe konto</label>
                            <input class="btn btn-primary form-control" type="submit" value="Zarejestruj">
                        </div>
                        <div class="form-group">   
                            <label>Login</label>
                            <a class="btn btn-secondary form-control" role="button" href="/gameOrganizer/views/loginForm.php">Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>
    </body>
</html>
