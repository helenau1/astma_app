<!-- Include file for displaying the footer at the bottom of each page-->

<div class="row" id="footer">
<div class="col-sm-12">
<p style="text-align:right; padding-top:5em;"> 
&copy; Helena Uotila <?php $startYear=2017; 
$thisYear=date('Y');
if ($startYear==$thisYear) {
echo $startYear; }
else {
	echo "{$startYear}-{$thisYear}"; //Determining the year the app was made and the current year to display in the footer
} ?></p>
</div>
</div>