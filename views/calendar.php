<?php
session_start();

date_default_timezone_set('Europe/London');
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Test Calendar</title>
        <!--        <link href='../fullcalendar/core/main.css' rel='stylesheet' />
                    <link href='../fullcalendar/daygrid/main.css' rel='stylesheet' />
                    <script src='../fullcalendar/core/main.js'></script>
                    <script src='../fullcalendar/daygrid/main.js'></script>-->

        <script src="https://cdn.jsdelivr.net/combine/npm/@fullcalendar/core@4.3.1/main.js,npm/@fullcalendar/core@4.3.1/locales-all.js,npm/@fullcalendar/daygrid@4.3.0/main.js,npm/@fullcalendar/interaction@4.3.0/main.js,npm/@fullcalendar/list@4.3.0/main.js,npm/@fullcalendar/timegrid@4.3.0/main.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/@fullcalendar/core@4.3.1/main.css,npm/@fullcalendar/daygrid@4.3.0/main.css,npm/@fullcalendar/list@4.3.0/main.css,npm/@fullcalendar/timegrid@4.3.0/main.css">

    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if ($logged == FALSE) {
                header('Location: /gameOrganizer/index.php');
            }
            ?>
            <div class="container">
                <div class='row justify-content-center'>
                    <h1>Test Calendar</h1>
                </div>

                <div class='row justify-content-center'>
                    <select id='locale-selector'></select>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>



        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>
        <script src="/gameOrganizer/js/calendarTest.js"  type="text/javascript" charset="utf-8"></script>
    </body>
</html>