<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Uzytkownik</title>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
        if ($logged == FALSE) {
            header('Location: /gameOrganizer/index.php');
        } else {
            echo "<h1>Konto Uzytkownika : " . $_SESSION['userName'] . "</h1>";
            echo "<h2 style='color:green;'>".$_SESSION["promptMessage"]."</h2><br>";
            unset($_SESSION["promptMessage"]);
        }
        echo "<input type='text' readonly='true' value='USER NAME : " . $_SESSION['userName'] . "'><br>";
        echo "<input type='text' readonly='true' value='ID : " . $_SESSION['userID'] . "'><br>";
        echo "<input type='text' readonly='true' value='ADMIN : " . ($_SESSION['isAdmin'] ? 'TRUE' : 'FALSE') . "' ><br>";
        echo "<input type='email' readonly='true' value='EMAIL : " . $_SESSION['userEmail'] . "' ><br>";
        echo "<input type='tel' readonly='true' value='PHONE : " . $_SESSION['userPhone'] . "' ><br>";
        echo "<br>";
        ?>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/footer.php'; ?>      

        <button class="btn btn-primary"><a href="/gameOrganizer/views/userEdit.php">Edit</a></button>
    </body>
</html>