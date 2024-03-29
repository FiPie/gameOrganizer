<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Obecnosc</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php if (isset($_SESSION['promptMessage'])): ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php
                    echo $_SESSION['promptMessage'];
                    unset($_SESSION["promptMessage"]);
                    unset($_SESSION["msg_type"]);
                    ?>
                </div>
            <?php endif; ?>

            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
            if ($logged == FALSE) {
                header('Location: /gameOrganizer/index.php');
            }
            ?>

            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';
            $connection = connectDatabase();
            if (!$connection) {
                die("Connection error: " . mysqli_connect_errno());
            };
            $nextEventResult = $connection->query("SELECT * FROM organizer_db.events WHERE start_event >= CURDATE() ORDER BY start_event ASC  LIMIT 1") or die($connection->error);
            $eventRow = $nextEventResult->fetch_assoc();
            $eventID = $eventRow['id'];


            $teamResult = $connection->query("SELECT * FROM organizer_db.users")or die($connection->error);
            $usersResult = $connection->query("SELECT * FROM organizer_db.users")or die($connection->error);
            $teamIDs = array();
            while ($user = $usersResult->fetch_assoc()) {
                //$teamIDs .= $user['userID'] . ",";
                array_push($teamIDs, $user['userID']);
            }
            $teamIDs = implode(",", $teamIDs);
            echo "<h1>$teamIDs</h1>";

            $connection->query("INSERT IGNORE INTO organizer_db.attendance (eventID, users_unspecified) VALUES ('$eventID', '$teamIDs')")or die($connection->error);


//            $attendanceResult = $connection->query("SELECT * FROM organizer_db.attendance WHERE eventID='$eventID'") or die($connection->error);
//            $attendanceRow = $attendanceResult->fetch_assoc();
            ?>

            <div class="container">
                <div class='row justify-content-center'>
                    <h1>Obecność</h1>
                </div>

                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>nazwa</th>
                                <th>start</th>
                                <th>koniec</th>
                                <th colspan="3">Action</th>

                            </tr>
                        </thead>

                        <tr>
                            <td><?php
                                echo $eventRow['id'];
                                ?></td>
                            <td><?php echo "<b>" . $eventRow['title'] . "</b>" ?></td>
                            <td><?php echo substr($eventRow['start_event'], 0, 11) . "<b>" . substr($eventRow['start_event'], 11, 5) . "</b>"; ?></td>
                            <td><?php echo substr($eventRow['end_event'], 0, 11) . "<b>" . substr($eventRow['end_event'], 11, 5) . "</b>"; ?></td>
                            <?php
                            if ((isset($_SESSION['isAdmin']) == TRUE) && ($_SESSION['isAdmin'] == TRUE)) {
                                ?>
                                <td>
                                    <a href="/gameOrganizer/core/attendanceService.php?edit=<?php echo $eventRow['id']; ?>" 
                                       class="btn btn-info">Edytuj</a>
                                    <a href="/gameOrganizer/core/attendanceService.php?delete=<?php echo $eventRow['id']; ?>" 
                                       class="btn btn-danger">Usuń</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr><td colspan="5"></td></tr>    
                        <?php while ($userRow = $teamResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $userRow['userID']; ?></td>
                                <td><?php echo $userRow['userName']; ?></td>
                                <?php echo '<th colspan="2"></th>'; ?>
                                <?php
                                if ((isset($_SESSION['userID']) == TRUE) && ($_SESSION['userID'] == $userRow['userID']) || ((isset($_SESSION['isAdmin']) == TRUE) && ($_SESSION['isAdmin'] == TRUE))) {
                                    ?>
                                    <td>
                                        <a href="/gameOrganizer/core/attendanceService.php?present=<?php echo $userRow['userID'] . "&eventID=$eventID"; ?>" 
                                           class="btn btn-info">Będę</a>
                                        <a href="/gameOrganizer/core/attendanceService.php?absent=<?php echo $userRow['userID'] . "&eventID=$eventID"; ?>" 
                                           class="btn btn-danger">Nie będę</a>
                                        <a href="/gameOrganizer/core/attendanceService.php?unspecified=<?php echo $userRow['userID'] . "&eventID=$eventID"; ?>" 
                                           class="btn btn-warning">Nie Wiem</a>
                                    </td>
                                <?php } else {
                                    echo "<td></td>";
                                }
                                ?>
                            </tr>
<?php endwhile; ?>        
                    </table>
                </div>
            </div>
        </div>















<?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      
    </body>
</html>