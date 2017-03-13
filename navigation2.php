<!-- navigation bar for the registration and login-->

<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?> <!-- setting current page for navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top" id="navigationbar">
      <div class="container">
      <div class="navbar-header">
      <div class="navbar-brand" style="color:white; font-size:2em; font-weight:bold;">AsthmaApp</div>
    </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar1" class="collapse navbar-collapse">
          <ul id="navigation" class="nav navbar-nav navbar-right">
            <li <?php if ($currentPage == 'signin.php') { echo 'class="active"';} ?>><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Sign in</a></li>
            <li <?php if ($currentPage == 'registration.php') { echo 'class="active"';} ?>><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        
            <li></li>
          </ul>
        </div>
      </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
