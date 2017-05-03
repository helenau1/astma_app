

<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Statistics</title>

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
	
	<h4>Check your statistics</h4>
	<form> 
	<!--Choosing the date for adding data to the database-->
	<div class="form-group col-xs-6">
	<h4>Start date</h4>
  <div class="col-6">
    <input class="form-control input-sm" type="date" id="date-input"> <!-- add date (previous month) with php inside the input tag: value="2011-08-19"-->
  </div>
  </div>
  
  <div class="form-group col-xs-6">
  <h4>End date</h4>
  <div class="col-6">
    <input class="form-control input-sm" type="date"  id="date-input"> <!-- add current date with php inside the input tag: value="2011-08-19"-->
  </div>
  </div>
	
	
	
  	<button type="submit" class="btn btn-default">OK</button>

</form>
	
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>
	
	
</div>

</body>
</html>
