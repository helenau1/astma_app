<?php

 if (!isset($_SESSION['userId'])) {
    if (isset($_COOKIE['userId'])) {
      $_SESSION['userId'] = $_COOKIE['userId'];
    }
  }

 
  // Generate the different menus and pages depending if the session is active or not
  if (isset($_SESSION['userId'])) {
  	require './datainput.php'; /*Getting fron include file the app front page for the user who is logged in*/
  }
  else {
  	require './signin.php'; /*Getting sign in page for the user who is not logged in*/
  }
?>

