<?php

session_start();


if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
    header('Location: /gameOrganizer/index.php');
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

if (isset($_POST['userName'], $_POST['userPswd'])) {

    $userName = test_input(filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS));
    $userPswd = test_input(filter_input(INPUT_POST, "userPswd", FILTER_SANITIZE_SPECIAL_CHARS));
//    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
//    $userPswd = filter_input(INPUT_POST, "userPswd", FILTER_SANITIZE_SPECIAL_CHARS);
} else {
    echo 'Invalid data';
    header('Location: /gameOrganizer/views/loginForm.php');
    exit();
}


$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
    echo 'We have problems when connecting the database<br>';
    echo 'Check your network connection<br>';
    echo 'Is your MySQL server working at this time?<br>';
    echo 'Is there organizer_db database?<br>';
    echo 'Try to log in with phpMyAdminFirst<br>';
    exit();  //This fuction is equivalent to die();
}
$query = "SELECT * FROM users WHERE userName='$userName'";
$result = mysqli_query($connection, $query);
$noRecords = mysqli_num_rows($result);

if ($noRecords < 1) {
    $success = FALSE;
    $message = "brak użytkownika o podanej nazwie : $userName";
    $_SESSION["promptMessage"] = $message;
    header('Location: /gameOrganizer/views/accessDenied.php');
} else {
    $row = mysqli_fetch_array($result);
    $userID = $row["userID"];
    $userName = $row["userName"];
    $hash = $row["password"];
    $isAdmin = $row["isAdmin"];
    $userEmail = $row["email"];
    $userPhone = $row["phone"];


    if ($hash == crypt($userPswd, $hash)) {
        $success = TRUE;
        //Now we use the session
        //Do not forget to use session_start on top of this script
        $_SESSION['logged'] = TRUE;
        $_SESSION["userID"] = $userID;
        $_SESSION["userName"] = $userName;
        $_SESSION["isAdmin"] = $isAdmin;
        $_SESSION['userEmail'] = $userEmail;
        $_SESSION['userPhone'] = $userPhone;
        $message = "Witaj <b>" . $_SESSION['userName'] . "</b> , jesteś zalogowany!";
        $_SESSION["promptMessage"] = $message;
        header('Location: /gameOrganizer/views/accessGranted.php');
    } else {
        $success = FALSE;
        $message = "Podane hasło jest nieprawidłowe!";
        $_SESSION["promptMessage"] = $message;
        header('Location: /gameOrganizer/views/accessDenied.php');
    }
}

mysqli_close($connection);
?>