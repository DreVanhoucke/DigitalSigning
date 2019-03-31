<?php

session_start();
if(!isset($_SESSION['username'])) {
	header("Location: login.php");
}

//VERBINDING MAKEN MET DE SQL SERVER
$servername = "mysql.sanitairvanhoucke.be";
$username = "sanitairvanhouck";
$password = "OceaanBodem135";
$dbname = "sanitairvanhouck";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//GEGEVENS VOOR DE EERSTE TABEL MET ALLE EVENEMENTEN OPHALEN UIT DE DATABASE
$result = mysqli_query($conn,"SELECT * FROM Kenzo
	ORDER BY Date_Event");

//BASIS HTML STRUCTUUR
echo "<a href='menu.php'>Terug naar menu</a>";

//EERSTE TABEL MAKEN MET ALLE EVENEMENTEN
echo "<h2>Alle evenementen:</h2>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Naam Event</th>
<th>Datum Event</th>
<th>Startdatum Viewer</th>
<th>Einddatum Viewer</th>
<th>Interval</th>
<th>Uploadnaam</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
	echo "<td>" . $row['Name_Event'] . "</td>";
	echo "<td>" . $row['Date_Event'] . "</td>";
	echo "<td>" . $row['Start_Date'] . "</td>";
	echo "<td>" . $row['End_Date'] . "</td>";
	echo "<td>" . $row['Interval'] . "</td>";
	echo "<td>" . $row['Img'] . "</td>";
	echo "</tr>";
}
echo "</table>";

//GEGEVENS VOOR DE TWEEDE TABEL MET HUIDIGE EVENEMENTEN OPHALEN UIT DE DATABASE
$current = mysqli_query($conn,"SELECT * FROM Kenzo 
	WHERE Start_Date <= CURRENT_DATE 
	AND End_Date >= CURRENT_DATE()
	ORDER BY Date_Event");

//TWEEDE TABEL MAKEN MET HUIDIGE EVENEMENTEN
echo "<h2>Volgende evenementen worden momenteel weergegeven:</h2>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Naam Event</th>
<th>Datum Event</th>
<th>Startdatum Viewer</th>
<th>Einddatum Viewer</th>
<th>Interval</th>
<th>Uploadnaam</th>
</tr>";

while($current_row = mysqli_fetch_array($current)) {
	echo "<tr>";
	echo "<td>" . $current_row['ID'] . "</td>";
	echo "<td>" . $current_row['Name_Event'] . "</td>";
	echo "<td>" . $current_row['Date_Event'] . "</td>";
	echo "<td>" . $current_row['Start_Date'] . "</td>";
	echo "<td>" . $current_row['End_Date'] . "</td>";
	echo "<td>" . $current_row['Interval'] . "</td>";
	echo "<td>" . $current_row['Img'] . "</td>";
	echo "</tr>";
}
echo "</table>";

echo "</div><div id='edit'>";

//SELECT FORM VOOR EDIT
echo "<form action='edit.php' method='POST'>";
echo "<select name='Event' id='Event'>";
$select = mysqli_query($conn, "SELECT Name_Event FROM Kenzo");

while ($select_row = $select->fetch_assoc()) {
echo "<option value=" . $select_row['Name_Event'] . ">" . $select_row['Name_Event'] . "</option>";
}
echo "</select>";;
echo "<input type='submit' name='action' value='Bewerken'>";
echo "<input type='submit' name='action' value='Verwijderen'>";
echo "</form>";

//SQL VERBINDING SLUITEN
	mysqli_close($conn);
?>