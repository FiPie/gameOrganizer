<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Skład</title>
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
            $result = $connection->query("SELECT * FROM organizer_db.users") or die($connection->error);
            ?>

            <div class="container">

                <div class='row justify-content-center'>
                    <h1>Skład</h1>
                </div>
                <div class='row justify-content-center'>

                </div>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nazwa</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <?php
                                if ((isset($_SESSION['isAdmin']) == TRUE) && ($_SESSION['isAdmin'] == TRUE)) {
                                    echo '<th colspan="2">Action</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php echo $row['userName'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <?php
                                if ((isset($_SESSION['isAdmin']) == TRUE) && ($_SESSION['isAdmin'] == TRUE)) {
                                    ?>
                                    <td>
                                        <a href="/gameOrganizer/core/userService.php?edit=<?php echo $row['userID']; ?>" 
                                           class="btn btn-info">Edytuj</a>
                                        <a href="/gameOrganizer/core/userService.php?delete=<?php echo $row['userID']; ?>" 
                                           class="btn btn-danger">Usuń</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endwhile; ?>        
                    </table>
                </div>

            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      
    </body>
</html>