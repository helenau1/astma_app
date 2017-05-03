<?php	

//This part will be executed if the user presses the submit button 
	if(isset($_POST['submit-data'])) {
		
		//Checking if the date is added 
		if (empty($_POST['date'])) { $errormessage = "The date is required!"; }
		
		//Checking if the duration is added and that it is an int 
		if (empty($_POST['duration']) || filter_var($_POST['duration'], FILTER_VALIDATE_INT) == false) { $errormessage = "The value for duration is either missing or invalid!"; } 	
		
		//Checking that one of the intensity options is checked 
		if (empty($_POST['radioOptions'])) { $errormessage = "The value for intensity is missing!"; } 
		
		//Checking that one of the feeling options is checked
		if (empty($_POST['radioOptions2'])) { $errormessage = "The value for feeling is missing!"; }
		
		/*Checking that the value submitted for inhales is  numeric. It could be 0 and therefore filter_var doesn't work here 
		if (!is_numeric($_POST['inhales'])) { $errormessage = "The value for inhales is invalid!"; }*/
		
		//Checking that the comment doesn't exceed the maximum length  
		if (strlen($_POST['comment'])>=200){
			$errormessage = "Your comment should not exceed 200 characters!";
		}	
	

		if(!isset($errormessage)) {
		require_once('dbinfo.php');
		
		$databaseconnection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();}
			
		$stmt = $databaseconnection->stmt_init();
			$stmt->prepare("INSERT INTO sportsEvent (userId, dateof, duration, intensity, feeling, inhales, comment) VALUES (?, ?, ?, ?, ?, ?, ?)");
			
			$date = $_POST['date'];
			$duration = $_POST['duration'];
			$intensity =$_POST['radioOptions'];
			$feeling = $_POST['radioOptions2'];
			$inhales =$_POST['inhales'];
			$comment=$_POST['comment'];
			$stmt->bind_param("isissis", $_SESSION['userId'], $date, $duration, $intensity, $feeling, $inhales, $comment);
				
			if($stmt->execute()) {
				$successmessage = "Your data was added Successfully!";
				
				$errormessage="";
			} else {
				$errormessage = "There was a problem adding the data. Please try again!";
			}
			$stmt->close();
			$databaseconnection->close();
			}
	}
	
	?>  

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
	
	
	<form method="post" action=""> 
	<!--Choosing the date for adding data to the database-->
	<div class="form-group">
  <h4>Date of the sport event</h4>
  <div class="col-10">
    <input class="form-control" name="date" type="date" id="date-input" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>"> 
  </div>
  </div>
	
	<!--Adding duration of sports-->
  	<div class="form-group col-xs-4">
    	<h4>Duration </h4><h6>(minutes)</h6>
    	<input type="number" class="form-control" name="duration" value="<?php if(isset($_POST['duration'])) echo $_POST['duration']; ?>" min="0">  
  	</div>

 	<!-- Determining sport intensity-->
 	<div class="form-group col-xs-4">
	<h4>Intensity</h4>
  	<div class="radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio1" value="low" <?php if (isset($_POST[ 'radioOptions']) && $_POST[ 'radioOptions']=='low' ){echo ' checked="checked"';}?>> Low
  </label>
</div>
<div class="radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio2" value="medium" <?php if (isset($_POST[ 'radioOptions']) && $_POST[ 'radioOptions']=='medium' ){echo ' checked="checked"';}?>> Medium</label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions" id="radio3" value="high" <?php if (isset($_POST[ 'radioOptions']) && $_POST[ 'radioOptions']=='high' ){echo ' checked="checked"';}?>>High</label>
</div>
 </div>	
 	
	<!--Radio buttons for emoticons-->
	<div class="form-group col-xs-4">
	<h4>Feeling</h4>
  	<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio1" value="happy"<?php if (isset($_POST[ 'radioOptions2']) && $_POST[ 'radioOptions2']=='happy' ){echo ' checked="checked"';}?>> <img src="Images/happy.png" alt="Feeling good" class="img-responsive">
  </label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio2" value="ok" <?php if (isset($_POST[ 'radioOptions2']) && $_POST[ 'radioOptions2']=='ok' ){echo ' checked="checked"';}?>> <img src="Images/ok.png" alt="Feeling OK" class="img-responsive">
  </label>
</div>
<div class="form-check radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="radioOptions2" id="inlineRadio3" value="sad" <?php if (isset($_POST[ 'radioOptions2']) && $_POST[ 'radioOptions2']=='sad' ){echo ' checked="checked"';}?> > <img src="Images/sad.png" alt="Feeling bad" class="img-responsive">
  </label>
</div>
</div>

	<div class="form-group">
    	<h4>Emergency medicine inhales</h4>
    	<input type="number" class="form-control" name="inhales" value="<?php if(isset($_POST['inhales'])) echo $_POST['inhales']; ?>" min="0"> 
  	</div>

	<!--Adding comments to the diary-->
		<div class="form-group">
  <h4>Add comment </h4><h6>(max 200 characters)</h6>
  <textarea class="form-control" rows="2" name="comment" maxlength="200"><?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea>
</div>

  	<button type="submit" name="submit-data"class="btn btn-default">OK</button>

</form>

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
