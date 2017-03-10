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

	<form style="padding-bottom:2em"> <!-- Change password-->
	<div class="form-group">
    	<h4>Old password</h4>
    	<input type="password" class="form-control" id="oldpwd">
  	</div>
	<div class="form-group">
    	<h4>New password</h4>
    	<input type="password" class="form-control" id="newpwd">
  	</div>
  
  	<div class="form-group">
    	<h4>Confirm new password</h4>
    	<input type="password" class="form-control" id="newpwdconfirm">
  	</div>
	  	<button type="submit" class="btn btn-default">Change password</button>
</form>

<form> <!-- Update email-->
  	<div class="form-group">
    	<h4>New email address</h4>
    	<input type="email" class="form-control" id="newemail">
  	</div>
  	<button type="submit" class="btn btn-default">Change your email address</button>
</form>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
	
</div>

</body>
</html>



