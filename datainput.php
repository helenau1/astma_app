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
		
		//Checking that the comment doesn't exceed the maximum length . Comment is optional so it can be empty
		if (strlen($_POST['comment'])>=200){
			$errormessage = "Your comment should not exceed 200 characters!";
		}	
	
		//if there are no error messages, the data is added to the database
		if(!isset($errormessage)) {
		require_once('dbinfo.php'); //getting the info needed for database connection from an include file
		
		$databaseconnection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //preparing the database connection
		
		//checking if the connection works
		if (mysqli_connect_errno()) {
			printf("Connection failed: %s\n", mysqli_connect_error());
			exit();}
			
			//initializing the database connection
			$stmt = $databaseconnection->stmt_init(); 
			//preparing the sql statement
			$stmt->prepare("INSERT INTO sportsEvent (userId, dateof, duration, intensity, feeling, inhales, comment) VALUES (?, ?, ?, ?, ?, ?, ?)");
			
			//determining the parameters that are added to the database. Using prepared statement automatically sanitizes the input against sql injection
			$date = $_POST['date'];
			$duration = $_POST['duration'];
			$intensity =$_POST['radioOptions'];
			$feeling = $_POST['radioOptions2'];
			$inhales =$_POST['inhales'];
			$comment=$_POST['comment'];
			//adding the parameters to an array that replaces the question marks in the sql statement and determining their type
			$stmt->bind_param("isissis", $_COOKIE['userId'], $date, $duration, $intensity, $feeling, $inhales, $comment);
			
			//executing the sql query and confirming success
			if($stmt->execute()) {
				$successmessage = "Your data was added Successfully!";
				
				$errormessage="";
				//displaying error message if the query fails
			} else {
				$errormessage = "There was a problem adding the data. Please try again!";
			}
			//closing the connections
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php require './navigation.php'; ?> <!-- Getting navigation bar from include file -->

<div class="container">

	<div class="row backdrop">
	<div class="container">
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	
	<!-- Start of the form for adding the sports diary data & declaring the method for getting the data from the form-->
	<form method="post" action=""> 
	<!-- All of the sections of the form use php to save the inputted data in the value of the field in case of error messages so the user doesn't have to input everything again-->
	
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

	<!--Adding the amount of inhales-->
	<div class="form-group">
    	<h4>Emergency medicine inhales</h4>
    	<input type="number" class="form-control" name="inhales" value="<?php if(isset($_POST['inhales'])) echo $_POST['inhales']; ?>" min="0"> 
  	</div>

	<!--Adding comments to the diary-->
		<div class="form-group">
  <h4>Add comment </h4><h6>(max 200 characters)</h6> 
  <textarea class="form-control" rows="2" name="comment" maxlength="200"><?php if(isset($_POST['comment'])) echo $_POST['comment']; ?></textarea> <!-- Determining the maximum length of the text field-->
</div>

  	<button type="submit" name="submit-data"class="btn btn-default">OK</button> <!-- Button to submit the sports diary form-->

</form>
<!-- Displaying and styling the error and success messages for the sql and for actions determined in the php section on top of the page-->
<div style = "padding-top:1.5; color:blue;" class="error-message"><?php if(isset($errormessage)) { echo $errormessage; } ?></div>
<div style = "padding-top:1.5; color:blue;" class="success-message"><?php if(isset($successmessage)) { echo $successmessage; } ?></div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div></div></div>
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	
</div>

</body>
</html>
