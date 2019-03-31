<?php
    session_start();

//VERBINDING MAKEN MET DE SQL SERVER
$servername = "mysql.sanitairvanhoucke.be";
$username = "sanitairvanhouck";
$password = "OceaanBodem135";
$dbname = "sanitairvanhouck";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo $POST['username'];

//GEGEVENS UIT DE DATABASE HALEN
$current = mysqli_query($conn,"SELECT * FROM Gebruikers 
WHERE username = '". $_POST['sendusername']."'
AND password = '". $_POST['sendpassword']."'
LIMIT 1");

while($current_row = mysqli_fetch_array($current)) {
	$username_local = $current_row['username'];
	$password_local = $current_row['password'];
}

$count_rows = $current->num_rows;

if ($count_rows == 1) {
   $_SESSION['username'] = $username_local;
   $_SESSION['password'] = $password_local;

   header('Location: menu.php');
   }
else {
	echo "fout";
}
?>