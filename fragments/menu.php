<!-- Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Optional Bootstrap Theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<?php
echo '<style>';
include $_SERVER['DOCUMENT_ROOT'] . "/gameOrganizer/css/styles.css";
echo '</style>';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/gameOrganizer/index.php">Game Organizer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MENU
                    </a>
                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">

                        <?php
                        if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
                            $logged = TRUE;
                        } elseif ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == FALSE)) {
                            $logged = FALSE;
                        } else {
                            $logged = FALSE;
                        }

                        if ($logged == FALSE) {
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/loginForm.php">Login</a>';
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/signUpForm.php">Rejestracja</a>';
                        } else {
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/timetable.php">Terminarz</a>';
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/payment.php">Oplaty</a>';
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/attendance.php">Obecnosc</a>';
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/team.php">Sklad</a>';
                            echo '<a class="dropdown-item" href="/gameOrganizer/views/scores.php">Wyniki</a>';
                            echo "<a class='dropdown-item' href='/gameOrganizer/views/userAccount.php'>user: <b>" . $_SESSION['userName'] . "</b></a>";
                            echo '<a class="dropdown-item" href="/gameOrganizer/controllers/logoutHandler.php">Logout</a>';
                        }
                        ?>
                        <div class="dropdown-divider"></div>    
                        <a class="dropdown-item" href="/gameOrganizer/views/legalNote.php">Notka Prawna</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
