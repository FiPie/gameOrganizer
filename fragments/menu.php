<!-- Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Optional Bootstrap Theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<?php
echo '<style>';
include $_SERVER['DOCUMENT_ROOT'] . "/gameOrganizer/css/styles.css";
echo '</style>';
?>

<nav>
    <ul>
        <li><a href="/gameOrganizer/index.php">Strona Glowna</a></li>

        <?php
        if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
            $logged = TRUE;
        } elseif ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == FALSE)) {
            $logged = FALSE;
        } else {
            $logged = FALSE;
        }

        if ($logged == FALSE) {
            echo '<li><a href="/gameOrganizer/views/loginForm.php">Login </a></li>';
            echo '<li><a href="/gameOrganizer/views/signUpForm.php">Rejestracja </a></li>';
        } else {
            echo '<li><a href="/gameOrganizer/views/timetable.php">Terminarz </a></li>';
            echo '<li><a href="/gameOrganizer/views/payment.php">Oplaty </a></li>';
            echo '<li><a href="/gameOrganizer/views/attendance.php">Obecnosc </a></li>';
            echo '<li><a href="/gameOrganizer/views/team.php">Sklad </a></li>';
            echo '<li><a href="/gameOrganizer/views/scores.php">Wyniki </a></li>';
            echo "<li><a href='/gameOrganizer/views/userAccount.php'>user: <b>" . $_SESSION['userName'] . " </b></a></li>";
            echo '<li><a href="/gameOrganizer/controllers/logoutHandler.php">Logout </a></li>';
        }
        ?>

        <li><a href="/gameOrganizer/views/legalNote.php">Notka Prawna</a></li>
    </ul>
</nav>
