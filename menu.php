<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
	
	<head>
            <title>Index</title>
            <link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
            <section id="container">
                <a class="ButtonLink" href="viewer.php">
                    <div class="IndexButton">
                        <h2 class="TitleButton">Viewer</h2>
                    </div>
                </a>

                <a class="ButtonLink" href="new.php">
                    <div class="IndexButton">
                        <h2 class="TitleButton">Nieuw evenement</h2>
                    </div>
                </a>

                <a class="ButtonLink" href="modify.php">
                    <div class="IndexButton">
                        <h2 class="TitleButton">Overzicht</h2>
                    </div>
                </a>
            </section>
	</body>

</html>