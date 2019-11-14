<?php

session_start();
?>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/gameOrganizer/config/config.php';

$connection = connectDatabase();
if (!$connection) {
    die("Connection error: " . mysqli_connect_errno());
};

function createAttendanceTable() {
    $query = "CREATE TABLE IF NOT EXISTS attendance (
eventID int(11) NOT NULL,
users_unspecified text,
users_present text,
users_absent text,
users_contusion text,
users_sick text,
PRIMARY KEY (eventID),
UNIQUE KEY (eventID),
FOREIGN KEY(eventID) REFERENCES events(id)
ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    return $query;
}

if (isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];

    if (isset($_GET['present'])) {
        $userID = $_GET['present'];
    } else if (isset($_GET['absent'])) {
        $userID = $_GET['absent'];
    } else if (isset($_GET['unspecified'])) {
        $userID = $_GET['unspecified'];
    }
    
    $resultUser = $connection->query("SELECT * FROM organizer_db.users WHERE userID=$userID") or die($connection->error());
    $userRow = $resultUser->fetch_assoc();
    $userName = $userRow['userName'];
    $resultEvent = $connection->query("SELECT * FROM organizer_db.events WHERE id=$eventID") or die($connection->error());
    $eventRow = $resultEvent->fetch_assoc();
    $eventName = $eventRow['title'];
    $resultAttendance = $connection->query("SELECT * FROM organizer_db.attendance WHERE eventID=$eventID") or die($connection->error());
    $attendanceRow = $resultAttendance->fetch_assoc();
    
    $usersUnspecified = ($attendanceRow['users_unspecified'] === null || empty($attendanceRow['users_unspecified'])) ? [] : explode(",", $attendanceRow['users_unspecified']);
    $usersPresent = ($attendanceRow['users_present'] === null || empty($attendanceRow['users_present'])) ? [] : explode(",", $attendanceRow['users_present']);
    $usersAbsent = ($attendanceRow['users_abscent'] === null || empty($attendanceRow['users_abscent'])) ? [] : explode(",", $attendanceRow['users_abscent']);
}

//PRESENT
if ((isset($_GET['present'])) && (($_SESSION['isAdmin'] == true) || ($_SESSION['userID'] == $_GET['present']))) {


    if (($key = array_search($userID, $usersPresent)) === false) {
        array_push($usersPresent, $userID);

        if (($key = array_search($userID, $usersUnspecified)) !== false) {
            unset($usersUnspecified[$key]);
        }
        if (($key = array_search($userID, $usersAbsent)) !== false) {
            unset($usersAbsent[$key]);
        }
    }

    $message = "Użytkownik: <b>$userName</b>, weźmie udział w przyszłym spotkaniu: $eventName";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "success";
}

//ABSENT
if ((isset($_GET['absent'])) && (($_SESSION['isAdmin'] == true) || ($_SESSION['userID'] == $_GET['absent']))) {


    if (($key = array_search($userID, $usersAbsent)) === false) {
        array_push($usersAbsent, $userID);

        if (($key = array_search($userID, $usersUnspecified)) !== false) {
            unset($usersUnspecified[$key]);
        }
        if (($key = array_search($userID, $usersPresent)) !== false) {
            unset($usersPresent[$key]);
        }
    }
    $message = "Użytkownik: <b>$userName</b>, nie weźmie udziału w przyszłym spotkaniu: $eventName";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
}

//UNSPECIFIED
if ((isset($_GET['unspecified'])) && (($_SESSION['isAdmin'] == true) || ($_SESSION['userID'] == $_GET['unspecified']))) {

    
    if (($key = array_search($userID, $usersUnspecified)) === false) {
        array_push($usersUnspecified, $userID);
        
        if (($key = array_search($userID, $usersAbsent)) !== false) {
            unset($usersAbsent[$key]);
        }
        if (($key = array_search($userID, $usersPresent)) !== false) {
            unset($usersPresent[$key]);
        }
    }
    $message = "Użytkownik: <b>$userName</b>, nie jest pewien, czy weźmie udział w przyszłym spotkaniu: $eventName";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
}


$usersUnspecified = (count($usersUnspecified) < 2 ? implode("", $usersUnspecified) : implode(",", $usersUnspecified));
$usersPresent = (count($usersPresent) < 2 ? implode("", $usersPresent) : implode(",", $usersPresent));
$usersAbsent = (count($usersAbsent) < 2 ? implode("", $usersAbsent) : implode(",", $usersAbsent));

echo "users_unspecified =$usersUnspecified</br>";
echo "users_present=$usersPresent</br>";
echo "users_abscent=$usersAbsent</br>";

$connection->query("UPDATE organizer_db.attendance SET users_unspecified='$usersUnspecified', users_present='$usersPresent', users_abscent='$usersAbsent' WHERE eventID='$eventID'") or die($connection->error);

header('Location: /gameOrganizer/views/attendance.php');
