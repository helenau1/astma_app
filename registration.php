<?php /* This php block will be executed after the user submits the signup data
 by clicking the sign-up button
*/ if(isset($_POST["sign-up"])) {

	/* Form Field Validation checking that all the fields are filled in the form */
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
		$error_message = "All fields are required!";
		break;
	}
}

/* Password Matching Validation */
if($_POST['password1'] != $_POST['password2']){
	$error_message = 'Passwords should match.';
}
//validating the email address
if(!isset($error_message)) { 
	if (!filter_var($_POST["email1"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address!";
	}
}
if(!isset($error_message)) { //if there are no errors in the form validations, this section will be executed
  	
	//getting the values needed for the database connection from an include file
	require_once('dbinfo.php');
  	
  	// Connecting to the database
  	$databaseconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  	
  	//checking if the connection works
  	if (mysqli_connect_errno()) {
  		printf("Connection failed: %s\n", mysqli_connect_error());
  		exit();}
  	
  		//escaping the input and preparing it for database queries
  	$email1 = mysqli_real_escape_string($databaseconnection, trim($_POST['email1'])); //mysqli_real_escape_string is used to enhance security
  	$password1 = mysqli_real_escape_string($databaseconnection, trim($_POST['password1']));
  	$password2 = mysqli_real_escape_string($databaseconnection, trim($_POST['password2']));
  	
      // Checking that the provided username does not yet exist in the database
      $query = "SELECT * FROM user WHERE email = '$email1'";
      $data = mysqli_query($databaseconnection, $query);
     if (mysqli_num_rows($data) == 0) { // If there are no results the email address does not exist yet, so insert the data into the database.
      	
      	$password = password_hash($password1, PASSWORD_DEFAULT); // password_hash is used to encrypt the password
      	$query = "INSERT INTO user (email, password) VALUES ('$email1','$password')"; // MySQL will automatically generate the userId
        mysqli_query($databaseconnection, $query);
        mysqli_close($databaseconnection);
        $error_message = "";
        $success_message = "You have registered successfully! You may now sign in"; 
        } 
        //if the email is found from the database display an error message
        else {
        	$error_message = "There is already a user with the email address you submitted! ";
        }
        $databaseconnection->close;
  }
 
} ?>

<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
 
<body style="background-color:#99ffeb;">

<?php require './navigation2.php';  // Getting navigation bar from include file
?>
<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> <!-- styling for different screen sizes-->

	<h4>Welcome!</h4>
	<p style="padding-bottom:2em;">AsthmaApp is a sports diary for asthmatics. 
It allows you to monitor your sports activities and emergency medication use.
</p>
 	
	<form style="padding-bottom:1em;" method="post" action=""> <!-- Sign up form-->
	
  	<div class="form-group">
    	<h4>Email address</h4> <!-- The email field is saved if the user gets error message, so they don't have to input the data again-->
    	<input type="email" class="form-control" name="email1" value="<?php if(isset($_POST['email1'])) echo $_POST['email1']; ?>">
  	</div>
  	
  	<div class="form-group">
    	<h4>Password</h4>
    	<input type="password" class="form-control" name="password1">
  	</div>
  
  	<div class="form-group">
    	<h4>Confirm password</h4>
    	<input type="password" class="form-control" name="password2">
  	</div>
  	
  	<input type="submit" value="Sign up" name="sign-up" class="btn btn-default">
  	
	</form>
	<!-- Error and succes messages for the queries and form validations are displayed and styled here-->
	<div style="padding-top:1.5em; color:blue;"><?php if(!empty($success_message)) { ?>	
		<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
		<?php } ?>
		<?php if(!empty($error_message)) { ?>	
		<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
		<?php } ?> </div>

	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
</div>

</body>
</html>
