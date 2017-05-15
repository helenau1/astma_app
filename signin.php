<?php
require_once('dbinfo.php');
session_start();


// Clear the error message
$message = "";

// If the user isn't logged in, try to log him/her in
if (!isset($_SESSION['userId']))
{
if(isset($_POST["sign-in"])) {
	// start connection with the database
	$databaseconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	// Getting the data the user has entered
	$email = mysqli_real_escape_string($databaseconnection, trim($_POST['email']));
	$password = mysqli_real_escape_string($databaseconnection, trim($_POST['password']));
	// Getting the userId from the database
	if (!empty($email) && !empty($password)) {
	$query = "SELECT userId, password FROM user WHERE email = '$email'";
	$data = mysqli_query($databaseconnection, $query);

	if (mysqli_num_rows($data) == 1) { 
		// Setting the userid session variable. Set the cookies. Redirect to the home page
		$row = mysqli_fetch_array($data);
		$passwordcrypted = $row['password'];
		if (password_verify($password, $passwordcrypted)){
		
		$_SESSION['userId'] = $row['userId'];
		setcookie('userId', $row['userId'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
	
		// Getting the URL of the app's home page
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
		header('Location: ' . $home_url);
		}
 else {
	$message = "Invalid Username or Password!";
		}
	}}
	else {
		$message = "Enter your email address and password and try again.";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign in</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
</head>
 
<body>
<?php require './navigation2.php'; ?>
<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	<h4>Welcome!</h4>
	<p style="padding-bottom:2em;">AsthmaApp is a sports diary for asthmatics. 
It allows you to monitor your sports activities and emergency medication use.
</p>
	
	<form style="padding-bottom:1em;" method="post" action=""> <!-- Sign in form-->
  	<div class="form-group">
    	<h4>Email address</h4>
    	<input type="email" class="form-control" name="email">
  	</div>
  	
  	<div class="form-group">
    	<h4>Password</h4>
    	<input type="password" class="form-control" name="password">
  	</div>
  	
  	<input type="submit" name="sign-in" value="Sign in" class="btn btn-default">
	</form>
	
<div style = "padding-top:1.5; color:blue;" class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
</div>

</body>
</html>