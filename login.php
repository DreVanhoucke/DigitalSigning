<!DOCTYPE html>
<html>
	
	<head>
            <title>Login</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="style-login.css">
	</head>

	<body>

		<div class="container">
		<div class="login">

            <form action="login_script.php" method="POST"> 

				  <div class="input-container">
				    <i class="fa fa-user icon"></i>
				    <input class="input-field" type="text" placeholder="Gebruikersnaam" name="sendusername" id="sendusername">
				  </div>
  
				  <div class="input-container">
				    <i class="fa fa-key icon"></i>
				    <input class="input-field" type="password" placeholder="Wachtwoord" name="sendpassword" id="sendpassword">
				  </div>

				  <div class="show">
				  <label for "showpw">wachtwoord tonen</label>
				  <input type="checkbox" name="showpw" id="showpw" onclick="myFunction()">

						<script>

			            	function myFunction() {
			  				var x = document.getElementById("sendpassword");
			  				if (x.type === "password") {
			    				x.type = "text";
			  				} 
			  				else {
			    				x.type = "password";
			  				}
							}

		            	</script>

				  </div>

  				<input type="submit" value="Inloggen" class="btn">
			</form>

        </div>
    	</div>
	</body>

</html>