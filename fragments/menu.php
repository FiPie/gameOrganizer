<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<nav>
    <a href="/gameOrganizer/index.php">Strona Glowna</a>



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
        echo '<a href="/gameOrganizer/views/signUpForm.php">Rejestracja</a>&nbsp;';
        
    } else {

        echo '<a href="/gameOrganizer/views/timetable.php">Terminarz</a>&nbsp;';
        echo '<a href="/gameOrganizer/views/payment.php">Oplaty</a>&nbsp;&nbsp;';
        echo '<a href="/gameOrganizer/views/attendance.php">Obecnosc</a>&nbsp;';
        echo '<a href="/gameOrganizer/views/team.php">Sklad</a>&nbsp;';
        echo '<a href="/gameOrganizer/views/scores.php">Wyniki</a>&nbsp;';
        echo '<a href="/gameOrganizer/controllers/logoutHandler.php">Logout</a>&nbsp;';
        echo "user: <b>".$_SESSION["userName"]."</b>&nbsp;";
    }
    ?>
    <a href="/gameOrganizer/views/legalNote.php">Notka Prawna</a>
</nav>
