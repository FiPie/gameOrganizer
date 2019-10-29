<?php
session_start();
?>

<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
};


if (isset($_POST['save'])) {
    $name = test_input(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
    $data = test_input(filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_var($data, FILTER_SANITIZE_EMAIL, 517);
    $phone = test_input(filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS));
    $id = $_SESSION["userID"];
    $result = $connection->query("SELECT * FROM organizer_db.users WHERE userID=$id") or die($connection->error());
    $row = $result->fetch_assoc();
    $message = "User <b>" . $row['userName'] . "</b>, id:<b>" . $row['userID'] . "</b>, email:<b>" . $row['email'] . "</b>, phone:<b>" . $row['phone'] . "</b> was successfully updated!";

    $connection->query("UPDATE organizer_db.users SET userName='$name', email='$email', phone='$phone' WHERE userID='$id'") or die($connection->error);

    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "success";

    $_SESSION["userName"] = $name;
    $_SESSION['userEmail'] = $email;
    $_SESSION['userPhone'] = $phone;
    mysqli_close($connection);
    header('Location: /gameOrganizer/views/userAccount.php');
}

if ((isset($_GET['delete'])) && ($_SESSION['isAdmin'] == true)) {
    $id = $_GET['delete'];
    $result = $connection->query("SELECT * FROM organizer_db.users WHERE userID=$id") or die($connection->error());
    $row = $result->fetch_assoc();

    $message = "User <b>" . $row['userName'] . "</b>, id:<b>" . $row['userID'] . "</b>, email:<b>" . $row['email'] . "</b>, phone:<b>" . $row['phone'] . "</b> has successfully deleted from database!";
    $connection->query("DELETE FROM organizer_db.users WHERE userID=$id") or die($connection->error());

    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";

    mysqli_close($connection);
    header('Location: /gameOrganizer/views/team.php');
} else if ((isset($_GET['delete'])) && ($_SESSION['isAdmin'] != true)) {
    $message = "<b>" . $_SESSION["userName"] . "</b>, you do not have the proper permission to perform delete operations on others!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
    mysqli_close($connection);
    header('Location: /gameOrganizer/views/team.php');
}

if ((isset($_GET['edit'])) && ($_SESSION['isAdmin'] == true)) {
    $id = $_GET['edit'];
    $result = $connection->query("SELECT * FROM organizer_db.users WHERE userID=$id") or die($connection->error());
    
    $row = $result->fetch_assoc();
    $name = $row['userName'];
    $email = $row['email'];
    $phone = $row['phone'];
    $admin = $row['isAdmin'];
    
    header("Location: ../views/adminUserEdit.php?id=$id&userName=$name&email=$email&phone=$phone&isAdmin=$admin");
}
if(isset($_POST['update']) && ($_SESSION['isAdmin'] == true)){
    $upId = $_POST['userID'];
    $name = $_POST['userName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $admin = $_POST['isAdmin'];
    
    $connection->query("UPDATE organizer_db.users SET userName='$name', email='$email', phone='$phone', isAdmin='$admin' WHERE userID='$upId'") or die ($connection->error);

    $message = "The user: <b>$name</b>, id: <b>$upId</b> has been updated by Admin: ".$_SESSION['userName'];
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
    
    header('Location: /gameOrganizer/views/team.php');
}

?>
