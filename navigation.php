<!-- navigation bar for the content inside the app -->

<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?> <!-- setting current page for navigation -->

<!-- Creating the navigation bar that works for different screen sizes  -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="navigationbar">
      <div class="container">
      <div class="navbar-header">
      <div class="navbar-brand" style="color:white; font-size:1.5em; font-weight:bold;">AsthmaApp</div>
      <!-- Part of the code that collapses the navbar for mobile devices -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar1" class="collapse navbar-collapse">
          <ul id="navigation" class="nav navbar-nav navbar-right">
            <li <?php if ($currentPage == 'datainput.php') { echo 'class="active"';} ?>><a href="datainput.php">Sports diary</a></li> <!-- Determining the pages that are displayed after clicking the navbar links  -->
            <li <?php if ($currentPage == 'statistics.php') { echo 'class="active"';} ?>><a href="statistics.php">Statistics</a></li>
            <li <?php if ($currentPage == 'account.php') { echo 'class="active"';} ?>><a href="account.php">Account</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
          </ul>
        </div>
      </div>
</nav>

    
    