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
    	<h4>Email address</h4>
    	<input type="email" class="form-control" name="email1">
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
		<?php /* This php block will only be executed after the user submits the signup data
 by clicking the sign-up button
*/
session_start();
require_once('dbinfo.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['sign-up'])) {
    // Get the signup data from the POST
    $email1 = mysqli_real_escape_string($dbc, trim($_POST['email1'])); //mysqli_real_escape_string is used to enhance security
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($email1) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Check that the provided username does not yet exist in the database
      $query = "SELECT * FROM user WHERE email = '$email1'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username does not exist yet, so insert the data into the database.
      	// The userId is configured with AUTO-INCREMENT in the table. MySQL will automatically generate the userId
        // SHA is used to encrypt the password
      	$query = "INSERT INTO user (email, password) VALUES ('$email1', SHA('$password1'))"; 
        mysqli_query($dbc, $query);
        
        // Get the userId of the just created account
        $query = "SELECT userId FROM user WHERE email = '$email1'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);
        
        // Set the session variables to hold the userId of the just created account. Set also the cookies.
        $_SESSION['userId'] = $row['userId'];
        setcookie('userId', $row['userId'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        
        mysqli_close($dbc);
                
        // Confirm success with the user
        echo '<h4>Thanks for signing up!</h4>';
        echo '<p>Your new account has been successfully created. <a href="index.php">Start here</a></p>';
            
        // mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="text-danger">An account already exists for this email address. Please use a different address.</p>';
        $email1 = "";
      }
    }
    else {
      echo '<p class="text-info">You must enter all of the sign-up data.</p>';
    }
  }

  mysqli_close($dbc);
?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
</div>

</body>
</html>
