<?php
        session_start();
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New User</title>
    </head>
    <body>
        <form action="/gameOrganizer/controllers/registrationHandler.php" method="POST" name="newUser">
            
            <input type="text" name="userName" required="TRUE" placeholder="Please enter your user name:"><br>
            <input type="password" name="userPswd" required="TRUE" placeholder="Please enter your password:"><br>
            <input type="password" name="userPswd2" required="TRUE" placeholder="Please re-type your password:"><br>
            
            <input type="submit" value="Add new user">&nbsp;<a href="/gameOrganizer/views/loginForm.php">Login</a><br>
        </form>
    </body>
</html>
