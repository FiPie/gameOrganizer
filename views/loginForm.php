<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form name="login" method="POST" action="/gameOrganizer/controllers/loginHandler.php">
            <input type="text" name="userName" required="TRUE" placeholder="Please enter your user name:"><br>
            <input type="password" name="userPswd" required="TRUE" placeholder="Please enter your user password:"><br>
            <input type="submit" value="Login">&nbsp;<a href="/gameOrganizer/views/signUpForm.php">Sign Up</a><br>
            
          
        </form>
    </body>
</html>
