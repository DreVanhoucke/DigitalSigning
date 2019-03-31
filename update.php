<?php

session_start();
if(!isset($_SESSION['username'])) {
	header("Location: login.php");
}

$servername = "mysql.sanitairvanhoucke.be";
$username = "sanitairvanhouck";
$password = "OceaanBodem135";
$dbname = "sanitairvanhouck";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//-------------------------mysql upload----------------

$Name_Event = $_POST['post_Name_Event'];
$Date_Event = $_POST['post_Date_Event'];
$Start_Date = $_POST['post_Start_Date'];
$End_Date = $_POST['post_End_Date'];
$Interval = $_POST['post_Interval'];
$ID = $_POST['post_ID'];

$sql = "UPDATE Kenzo 
SET Name_Event = '" . $Name_Event . "', Date_Event = '" . $Date_Event . "', Start_Date = '" . $Start_Date . "', End_Date = '" . $End_Date . "', Interval = '" . $Interval . "' 
WHERE ID='" . $ID . "'
LIMIT 1";

if ($conn->query($sql) === TRUE) {
    echo "Succesvol bewerkt <a href='menu.php'>Terug naar menu</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>