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
<?php require './navigation2.php'; ?> <!-- Getting navigation bar from include file -->
<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> <!-- styling for different screen sizes-->
	
	<h4>Welcome!</h4>
	<p style="padding-bottom:2em;">AsthmaApp is a sports diary for asthmatics. 
It allows you to monitor your sports activities and emergency medication use.
</p>
 	
	<form> <!-- Sign up form-->
	
  	<div class="form-group">
    	<h4>Email address</h4>
    	<input type="email" class="form-control" id="email">
  	</div>
  	
  	<div class="form-group">
    	<h4>Password</h4>
    	<input type="password" class="form-control" id="pwd">
  	</div>
  
  	<div class="form-group">
    	<h4>Confirm password</h4>
    	<input type="password" class="form-control" id="pwdconfirm">
  	</div>
  	
  	<div class="checkbox">
    	<label><input type="checkbox"> Check this</label>
  	</div>
  
  	<button type="submit" class="btn btn-default">Sign up</button>
	</form>
	
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
</div>

</body>
</html>
