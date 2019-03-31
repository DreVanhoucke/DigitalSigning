<!DOCTYPE html>

<?php

//VERBINDING MAKEN MET DE SQL SERVER
$servername = "mysql.sanitairvanhoucke.be";
$username = "sanitairvanhouck";
$password = "OceaanBodem135";
$dbname = "sanitairvanhouck";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//GEGEVENS UIT DE DATABASE HALEN
$current = mysqli_query($conn,"SELECT * FROM Kenzo 
WHERE Start_Date <= CURRENT_DATE() 
AND End_Date >= CURRENT_DATE()
AND Display = '1'
ORDER BY Date_Event
LIMIT 1");

while($current_row = mysqli_fetch_array($current)) {
	$Name_Event_local = $current_row['Name_Event'];
	$Interval_local = $current_row['Interval'];
	$Img_local = $current_row['Img'];
}

//ALS ALLE EVENEMENTEN WEERGEGEVEN ZIJN (=DISPLAY=0) => VARIABELE VAN ALLE EVENEMENTEN 1 MAKEN
$count_rows = $current->num_rows;

if($count_rows == 0) {
	$upd = "UPDATE Kenzo SET Display='1' WHERE cte=1";

	if ($conn->query($upd) === TRUE) {
	}	
	else {
		echo "Error updating record: " . $conn->error;
	}
	header("refresh:0; url=viewer.php");
}

//NADAT HET EVENEMENT WEERGEGEVEN IS VARIABELE DISPLAY OP 0 ZETTEN
else {
	$updone = "UPDATE Kenzo SET Display='0' WHERE Display=1 ORDER BY Date_Event LIMIT 1" ;

	if ($conn->query($updone) === TRUE) {
	}	
	else {
		echo "Error updating record: " . $conn->error;
	}
}

?>

<html>
	<head>
		<?php echo "<meta http-equiv='refresh' content='". $Interval_local ."'>";?>
		<link rel='stylesheet' type='text/css' href='style.css'>
		<?php echo "<title>". $Name_Event_local ."</title>";?>
	</head>

	<body>
		<?php echo "<img id='image' src='". $Img_local . "' alt='img'></img>";?>
	</body>
</html>


<?php
	//SQL CONNECTIE AFSLUITEN
	mysqli_close($con);
?>