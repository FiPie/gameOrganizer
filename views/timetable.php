<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Terminarz</title>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.css" />
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
                    <h1>Terminarz</h1>
                </div>

                <!--<div data-provide="calendar">
                
                                </div>-->
                <div class='row justify-content-center'>
                    <div class="calendar">

                    </div>
                </div>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>  </body>
    <script src="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.js"></script>
    <script src="/gameOrganizer/js/jsYearCalendar.js"  type="text/javascript" charset="utf-8"></script>
    <script>
        new Calendar('.calendar');
        document.querySelector('.calendar').addEventListener('clickDay', function (e) {
            alert('Click on day ' + e.date.toString());
            console.log("Click on day: " + e.date + " (" + e.events.length + " events)");
        });
    </script>

</html>