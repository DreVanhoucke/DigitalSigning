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

//-----------------------file upload--------------------------------------

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["post_Img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 if (move_uploaded_file($_FILES["post_Img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["post_Img"]["name"]). " has been uploaded. <br>";
    } else {
        echo "Sorry, there was an error uploading your file. <br> <a href='menu.php'>Terug naar menu</a>";
    }

//-------------------------mysql upload----------------

$Name_Event = $_POST['post_Name_Event'];
$Date_Event = $_POST['post_Date_Event'];
$Start_Date = $_POST['post_Start_Date'];
$End_Date = $_POST['post_End_Date'];
$Interval = $_POST['post_Interval'];
$Img = $_FILES['post_Img']['name'];

$sql = "INSERT INTO `Kenzo` (`ID`, `Name_Event`, `Date_Event`, `Start_Date`, `End_Date`, `Interval`, `Img`) VALUES (NULL, '$Name_Event', '$Date_Event', '$Start_Date', '$End_Date', '$Interval', '$target_file');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <a href='menu.php'>Terug naar menu</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>