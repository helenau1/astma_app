<?php
  session_start();
  
  // If the user is logged in, delete the session data and destroy the session
  if (isset($_SESSION['userId'])) {
  	  	
    // Delete the session data by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  }

  // Delete the userId cookie by setting its expiration to an hour ago (3600 secs)
  setcookie('userId', '', time() - 3600);

    
  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
?>
