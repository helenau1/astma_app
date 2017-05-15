<?php	

//This part will be executed if the user presses the submit button 
	if(isset($_POST['change-password'])) {
		
		//Checking if the new password is confirmed correctly
		if ($_POST['password-new1']!== $_POST['password-new2']) { $errormessage = "The passwords don't match!"; }
	
		//if there are no error messages, the new password is updated to the database
		if(!isset($errormessage)) {
			
			$cryptedpassword =password_hash($_POST['password-new1'], PASSWORD_DEFAULT);
			$checker=$_COOKIE['userId'];
			
		//getting the info needed for database connection from an include file
		require_once('dbinfo.php'); 
		
		$databaseconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //preparing the database connection
		if ($query = mysqli_query ($databaseconnection,"UPDATE user SET password='$cryptedpassword' WHERE userId='$checker'")) {
			 
				$successmessage = "Your password was changed successfully!";
				$errormessage="";}
				
				 else {
				$errormessage = "There was a problem while changing the password. Please try again!";
			}
			//closing the connections
			$databaseconnection->close();
			}
	}
	
	?>  

<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Account</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
<body>
<?php require './navigation.php'; ?> <!-- Getting navigation bar from include file -->

<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	
<p style="padding-bottom:1.5em;">Go to sports diary to add data, check your previous sports events on statistics tab or update your info here. </p>

	<form method="post" action="" style="padding-bottom:2em"> <!-- Form for changing password-->
	
	<div class="form-group">
    	<h4>New password</h4>
    	<input type="password" name="password-new1" class="form-control" id="newpwd">
  	</div>
  
  	<div class="form-group">
    	<h4>Confirm new password</h4>
    	<input type="password" name="password-new2" class="form-control" id="newpwdconfirm">
  	</div>
	  	<button type="submit" name="change-password" class="btn btn-default">Change password</button>
</form>
<pre> <?php if ($_POST) { print_r($_POST); } ?> </pre>

<div style = "padding-top:1.5; color:blue;" class="error-message"><?php if(isset($errormessage)) { echo $errormessage; } ?></div>
<div style = "padding-top:1.5; color:blue;" class="success-message"><?php if(isset($successmessage)) { echo $successmessage; } ?></div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
	
</div>

</body>
</html>



