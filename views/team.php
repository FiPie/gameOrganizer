<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sklad</title>
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
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
                    <h1>Sklad</h1>
                </div>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
                                        <a href="#?edit=<?php echo $row['userID']; ?>" 
                                           class="btn btn-info">Edit</a>
                                        <a href="#?delete=<?php echo $row['userID']; ?>" 
                                           class="btn btn-danger">Delete</a>
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