<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Nieuw Evenement</title>
	</head>

	<body>

		<a href="menu.php">Terug naar menu</a>
		
		<form action="new_script.php" method="POST" enctype="multipart/form-data">
			<label for="post_Name_Event">Naam evenement:</label>
			<input type="text" name="post_Name_Event" id="post_Name_Event" required=""><br>

			<label for="post_Date_Event">Datum evenement:</label>
			<input type="date" name="post_Date_Event" id="post_Date_Event" required=""><br>

			<label for="post_Start_Date">Startdatum weergave:</label>
			<input type="date" name="post_Start_Date" id="post_Start_Date" required=""><br>

			<label for="post_End_Date">Einddatum weergave:</label>
			<input type="date" name="post_End_Date" id="post_End_Date" required=""><br>

			<label for="post_Interval">Aantal seconden in weergave:</label>
			<input type="text" name="post_Interval" id="post_Interval" placeholder="15" required=""><br>

			<label for="post_Img">Upload:</label>
			<input type="file" name="post_Img" id="post_Img"><br>

			<input type="submit" value="uploaden">
			<input type="reset" value="reset">

		</form>

	</body>

</html>