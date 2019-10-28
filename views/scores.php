<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wyniki</title>
    </head>
    <body>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/fragments/menu.php';
        if($logged == FALSE){
            header('Location: /gameOrganizer/index.php');
        }
        ?>
        <h1>Wyniki</h1>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] .'/gameOrganizer/fragments/footer.php'; ?>      
        
    </body>
</html>