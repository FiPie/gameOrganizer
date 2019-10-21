<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<nav>
    <a href="index.php">Strona Glowna</a>
    <a href="timetable.php">Terminarz</a>
    <a href="payment">Oplaty</a>
    <a href="attendance">Obecnosc</a>
    <a href="team">Sklad</a>
    <a href="scores">Wyniki</a>
    <a href="legalNote">Notka Prawna</a>

    <?php
    if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
        $logged = TRUE;
    } elseif ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == FALSE)) {
        $logged = FALSE;
    } else {
        $logged = FALSE;
    }
    if ($logged == FALSE) {
        echo '<a href="/gameOrganizer/views/loginForm.php">Login</a>&nbsp;';
        echo '<a href="/gameOrganizer/views/signUpForm.php">Rejestracja</a>';
    } else {
        echo '<a href="/gameOrganizer/controllers/logoutHandler.php">Logout</a>';
    }
    ?>

</nav>
