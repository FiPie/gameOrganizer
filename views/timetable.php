<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Terminarz</title>
    </head>
    <body>
        <?php
        include '../fragments/menu.php';
        if($logged == FALSE){
            header('Location: /gameOrganizer/index.php');
        }
        ?>
        <h1>Terminarz</h1>
        
        <?php include '../fragments/footer.php'; ?>      
        <script src="js/gameScript.js" charset="utf-8"></script>
    </body>
</html>