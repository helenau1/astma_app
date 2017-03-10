<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Submit data</title>

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
	
	<div class="row backdrop">
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	
	
	<form> 
	<!--Choosing the date for adding data to the database-->
	<div class="form-group">
  <h4>Date of the sport event</h4>
  <div class="col-10">
    <input class="form-control" type="date" id="date-input"> <!-- add current date with php inside the input tag: value="2011-08-19"-->
  </div>
  </div>
	
	<!--Adding duration of sports-->
  	<div class="form-group col-xs-4">
    	<h4>Duration (minutes)</h4>
    	<input type="number" class="form-control" id="duration" value="0" min="0">  
  	</div>

 	<!-- Determining sport intensity-->
 	<div class="form-group col-xs-4">
	<h4>Intensity</h4>
  	<div class="radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio1" value="option1"> Low
  </label>
</div>
<div class="radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio2" value="option2"> Medium</label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio3" value="option3">High</label>
</div>
 </div>	
 	
	<!--Radio buttons for emoticons-->
	<div class="form-group col-xs-4">
	<h4>Feeling</h4>
  	<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio1" value="option1"> <img src="Images/happy.png" alt="Feeling good" class="img-responsive">
  </label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio2" value="option2"> <img src="Images/ok.png" alt="Feeling OK" class="img-responsive">
  </label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio3" value="option3"> <img src="Images/sad.png" alt="Feeling bad" class="img-responsive">
  </label>
</div>
</div>

	<div class="form-group">
    	<h4>Emergency medicine inhales</h4>
    	<input type="number" class="form-control" id="inhales" value="0" min="0"> 
  	</div>

	<!--Adding comments to the diary-->
		<div class="form-group">
  <h4>Add comment</h4>
  <textarea class="form-control" rows="2" id="comment"></textarea>
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
