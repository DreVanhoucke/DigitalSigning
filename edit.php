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

$Search = $_POST['Event'];

if ($_POST['action'] == 'Bewerken'){

$current = mysqli_query($conn,"SELECT * FROM Kenzo 
WHERE Name_Event = $Search");

echo mysqli_fetch_array($current)['Interval'];

while($current_row = mysqli_fetch_array($current)) {
	$ID_local = $current_row['ID'];
	$Name_Event_local = $current_row['Name_Event'];
	$Date_Event_local = $current_row['Date_Event'];
	$Start_Date_local = $current_row['Start_Date'];
	$End_Date_local = $current_row['End_Date'];
	$Interval_local = $current_row['Interval'];
	$Img_local = $current_row['Img'];
}

}

echo $ID_local;

if ($_POST['action'] == 'Verwijderen') {
	$del = "DELETE FROM Kenzo WHERE Name_Event = '$Search' LIMIT 1";

	if ($conn->query($del) === TRUE) {
		header("refresh:0; url=modify.php");
	}	
	else {
		echo "Error deleting record: " . $conn->error;
	}
}

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Nieuw Evenement</title>
	</head>

	<body>

		<a href="menu.php">Terug naar menu</a>
		
		<form action="update.php" method="POST" enctype="multipart/form-data">
<?php		echo "<input type='text' name='post_ID' id='post_ID' value=" . $ID_local . "><br>" ;?>

			<label for="post_Name_Event">Naam evenement:</label>
<?php		echo "<input type='text' name='post_Name_Event' id='post_Name_Event' value=" . $Name_Event_local . "><br>" ;?>

			<label for="post_Date_Event">Datum evenement:</label>
<?php		echo "<input type='text' name='post_Date_Event' id='post_Date_Event' value=" . $Date_Event_local . "><br>" ;?>

			<label for="post_Start_Date">Startdatum weergave:</label>
<?php		echo "<input type='text' name='post_Start_Date' id='post_Start_Date' value=" . $Start_Date_local . "><br>" ;?>

			<label for="post_End_Date">Einddatum weergave:</label>
<?php		echo "<input type='text' name='post_End_Date' id='post_End_Date' value=" . $End_Date_local . "><br>" ;?>

			<label for="post_Interval">Aantal seconden in weergave:</label>
<?php		echo "<input type='text' name='post_Interval' id='post_Interval' value=" . $Interval_local . "><br>" ;?>

			<input type="submit" value="opslaan">
			<input type="reset" value="reset">

		</form>

	</body>

</html>