<?php


if(isset($_POST['statistics-query'])) {
	
	//Checking if the start date is added
	if (empty($_POST['startdate'])) { $errormessage = "The start date is required!"; }
	
	//Checking if the end date is added
	if (empty($_POST['enddate'])) { $errormessage = "The end date is required!"; }
	
	//if there are no error messages, the data is added to the database
	if(!isset($errormessage)) {
 
    //include database connection
    require_once('dbinfo.php');
    $databaseconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    //checking if the connection works
    if (mysqli_connect_errno()) {
    	printf("Connection failed: %s\n", mysqli_connect_error());
    	exit();}
    
    //query all records from the database
    
    $startdate = mysqli_real_escape_string($databaseconnection, trim($_POST['startdate']));
    $enddate = mysqli_real_escape_string($databaseconnection, trim($_POST['enddate']));
    $checker = mysqli_real_escape_string($databaseconnection, trim($_COOKIE['userId']));
    
    $query = mysqli_query ($databaseconnection, "SELECT Sum(duration) AS TotalDuration, Sum(inhales) AS TotalInhales FROM sportsEvent WHERE (dateof BETWEEN '$startdate' AND '$enddate') AND userId= '$checker'");
    $query2 = mysqli_query($databaseconnection, "SELECT intensity, SUM(duration) AS Duration, SUM(inhales) AS MedicineInhales FROM sportsEvent WHERE (dateof BETWEEN '$startdate' AND '$enddate') AND userId= '$checker' GROUP BY intensity");
    $query3 = mysqli_query($databaseconnection, "SELECT feeling, SUM(duration) AS Duration, SUM(inhales) AS MedicineInhales FROM sportsEvent WHERE (dateof BETWEEN '$startdate' AND '$enddate') AND userId= '$checker' GROUP BY feeling");
    $query4 = mysqli_query($databaseconnection, "SELECT dateof, duration, inhales, feeling, intensity, comment FROM sportsEvent WHERE (dateof BETWEEN '$startdate' AND '$enddate') AND userId= '$checker'");
 
    if ($row = mysqli_fetch_array($query)) {
    	
      $TotalDuration =htmlspecialchars($row['TotalDuration']);
      $TotalInhales =htmlspecialchars($row['TotalInhales']);
      
      $msg = "Total duration of sports during the chosen period is $TotalDuration minutes.";
      $msg2 = "Total amount of emergency medicine inhales is $TotalInhales.";
    
    }
    else { echo 'There was no data to show for this period';
    }

	
	}
	
	$databaseconnection->close();
	}
	
function message() { //function to display the error message in the tables if there are no data to show in the database
	echo 'There was no data to show for this period';
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head> <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Statistics</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css"/>
<!--  <script>src="jquery-3.2.1.js"</script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
<body>
<?php require './navigation.php'; ?> <!-- Getting navigation bar from include file -->
<div class="container">
	
	<div class="row backdrop"> <!-- using class "backdrop" to style the page with own css-->
	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"> 
	
	<h4>Check your statistics by choosing the wanted time period</h4>
	<form method="post" action=""> 
	<!--Choosing the date for adding data to the database-->
	<div class="form-group">
	<h4>Start date</h4>
  <div class="col-6">
    <input class="form-control input-sm" type="date" name="startdate" value="<?php if(isset($_POST['startdate'])) echo $_POST['startdate']; ?>" id="date-input"> <!-- add date (previous month) with php inside the input tag: value="2011-08-19"-->
  </div>
  </div>
  
  <div class="form-group">
  <h4>End date</h4>
  <div class="col-6">
    <input class="form-control input-sm" type="date" name="enddate" value="<?php if(isset($_POST['enddate'])) echo $_POST['enddate']; ?>" id="date-input2"> <!-- add current date with php inside the input tag: value="2011-08-19"-->
  </div>
  </div>
	
  	<button type="submit" name="statistics-query" class="btn btn-default">OK</button>

</form>
	<div style = "padding-top:1.5em; color:blue;" class="error-message"><?php if(isset($errormessage)) { echo $errormessage; } ?></div>
	
	</div></div>
	<?php if(isset($_POST['statistics-query'])) {?>
	<div class="row"> 
<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"></div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<div style="margin-bottom:2.5em; color:#4d4d4d; text-align:center; "> <h4><?php if(isset($msg)) { echo $msg; } ?></h4>
	<h4> <?php if(isset($msg2)) { echo $msg2; } ?></h4></div>
	
<div class="table-responsive table-bordered" style="background-color:white;">          
  <table class="table">
    <thead class="thead-inverse">
    	
      <tr>
        <th>Date</th>
        <th>Duration</th>
        <th>Inhales</th>
         <th>Feeling</th>
          <th>Intensity</th>
           <th>Comment</th>
      </tr>
    </thead>
    <tbody>
<?php 
	if($query4->num_rows ==0) {
		 message();
	}

	while($row4 = mysqli_fetch_array($query4)){ //htmlsecialchars used to make sure there is no harmful data
		printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", htmlspecialchars($row4['dateof']), htmlspecialchars($row4['duration']), htmlspecialchars($row4['inhales']), htmlspecialchars($row4['feeling']),htmlspecialchars($row4['intensity']),htmlspecialchars($row4['comment']));
        }
    ?>
    </tbody>
  </table>
  </div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs"></div>
	
	</div>
	
	
	
	<div class ="row">
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4"></div>
	<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4">
	<div class="table-responsive table-bordered" style="margin-top:2em; background-color:white;">          
  <table class="table">
    <thead class="thead-inverse">
    	
      <tr>
      
        <th>Intensity</th>
        <th>Duration (min)</th>
        <th>Inhales</th>
      </tr>
    </thead>
    <tbody>
<?php 
	if($query2->num_rows ==0) {
		message();
	}

	while($row2 = mysqli_fetch_array($query2)){
		printf ("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", htmlspecialchars($row2['intensity']), htmlspecialchars($row2['Duration']), htmlspecialchars($row2['MedicineInhales']));
        }
      

    ?>
    </tbody>
  </table>
  </div>
  
  <div class="table-responsive table-bordered" style="margin-top:2em; background-color:white;">          
  <table class="table">
    <thead class="thead-inverse">
    	
      <tr>
      
        <th>Feeling</th>
        <th>Duration (min)</th>
        <th>Inhales</th>
      </tr>
    </thead>
    <tbody>
<?php 
	if($query3->num_rows ==0) {
		message();
	}

	while($row3 = mysqli_fetch_array($query3)){
		printf ("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", htmlspecialchars($row3['feeling']), htmlspecialchars($row3['Duration']), htmlspecialchars($row3['MedicineInhales']));
        }
    ?>
    </tbody>
  </table>
  </div>
  </div>
  
  <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> <!-- styling for different screen sizes-->
	</div>
</div>
<?php }?>
	
	<?php include './footer.php'; ?> <!-- Getting footer from include file -->
	</div>



 
</body>
</html>
