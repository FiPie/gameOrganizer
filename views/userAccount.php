<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Uzytkownik</title>
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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php'; ?>
            <div class="container">
                <!-- Insert/Drop Grid Row codes below -->
                <div class='row justify-content-center'>
                       
                </div>
                <div class="row justify-content-center"> 
                    <form>
                        <div class="form-group">
                            <?php
                            if ($logged == FALSE) {
                                header('Location: /gameOrganizer/index.php');
                            } else {
                                echo "<div class='form-group'>
                                        <h1>Konto Uzytkownika : " . $_SESSION['userName'] . "</h1>
                                      </div>";
                                echo "<div class='form-group'>
                                    <label>Name</label><input class='form-control' type='text' readonly='true' value='".$_SESSION['userName']."'></div>";
                                echo "<div class='form-group'>
                                    <label>ID</label><input class='form-control' type='text' readonly='true' value='" . $_SESSION['userID'] . "'>
                                  </div>";
                                echo "<div class='form-group'>
                                    <label>isAdmin</label><input class='form-control' type='text' readonly='true' value='" . ($_SESSION['isAdmin'] ? 'TRUE' : 'FALSE') . "' >
                                  </div>";
                                echo "<div class='form-group'>
                                    <label>Email</label><input class='form-control' type='email' readonly='true' value='" . $_SESSION['userEmail'] . "' >
                                  </div>";
                                echo "<div class='form-group'>
                                    <label>Phone</label><input class='form-control' type='tel' readonly='true' value='" . $_SESSION['userPhone'] . "' >
                                  </div>";
                                echo '<div class="form-group">
                                    <a class="btn btn-primary" role="button" href="/gameOrganizer/views/userEdit.php">Edit</a>
                                  </div>';
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      
    </body>
</html>