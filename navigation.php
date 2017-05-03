<!-- navigation bar for the content inside the app -->

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
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar1" class="collapse navbar-collapse">
          <ul id="navigation" class="nav navbar-nav navbar-right">
            <li <?php if ($currentPage == 'datainput.php') { echo 'class="active"';} ?>><a href="datainput.php">Sports diary</a></li>
            <li <?php if ($currentPage == 'statistics.php') { echo 'class="active"';} ?>><a href="statistics.php">Statistics</a></li>
            <li <?php if ($currentPage == 'account.php') { echo 'class="active"';} ?>><a href="account.php">Account</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
          </ul>
        </div>
      </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    