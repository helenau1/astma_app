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
</head>
 
<body>
<?php require './navigation3.php'; ?>
<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	<h4>Welcome!</h4>
	<p style="padding-bottom:2em;">AsthmaApp is a sports diary for asthmatics. 
It allows you to monitor your sports activities and emergency medication use.
</p>
	
	<form> <!-- Sign in form-->
  	<div class="form-group">
    	<h4>Email address</h4>
    	<input type="email" class="form-control" id="email1"> <!-- sign in form-->
  	</div>
  	
  	<div class="form-group">
    	<h4>Password</h4>
    	<input type="password" class="form-control" id="pwd1">
  	</div>
  	
  	<div class="checkbox">
    	<label><input type="checkbox"> Remember me</label>
  	</div>
  
  	<button type="submit" class="btn btn-default">Sign in</button>
	</form>
	
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
</div>

</body>
</html>
