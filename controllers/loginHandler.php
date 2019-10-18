<?php
session_start();

$users = array(
    "Filip" => "filip",
    "Nata" => "nata",
    "Tomasz" => "tomasz"
);
?>
<?php
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userPswd = filter_input(INPUT_POST, "userPswd", FILTER_SANITIZE_SPECIAL_CHARS);
        echo "user: $userName<br>pswd: $userPswd";
        $_SESSION['logged'] = FALSE;
        foreach ($users as $key => $value) {
            echo "key:$key ";
            echo "value:$value <br>";
            if ($key == $userName && $value == $userPswd) {
                $_SESSION['logged'] = TRUE;
                $_SESSION['name'] = $userName;
//                echo "Hello $userName You are logged in <br>";
                header('Location: /gameOrganizer/views/accessGranted.php');
            }
        }
        if($_SESSION['logged'] == FALSE){
            header('Location: /gameOrganizer/views/accessDenied.php');
        }
        ?>