<html>
  <head></head>
  <body>
	<?php
$mysqli = new mysqli("localhost","student","CompSci364","historicEconomic");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
	  $cName = stripslashes($_GET['country']);
	  $start_yr = stripslashes($_GET['startY']);
	  $end_yr = stripslashes($_GET['endY']);

	echo "<p/>Query returned results<p/>";
	while ($start_yr <= $end_yr) {
	  $query = "SELECT * FROM `historicEconomic` WHERE name=".$cName." AND year=".$start_yr;

	  $result = mysqli_query($con, $query);

	  echo "<table>\n";
	  foreach ($line as mysqli_fetch_assoc($result)) {
	    echo "\t<tr>\n";
	    echo "\t\t<td>".$line."</td>\n";
	    echo "\t</tr>\n";
	  }
		echo "</table>\n";

	  // Free resultset
	  $result->free();
      ++$start_yr;
    }
	?>
	<p/><a href="../CS364-Project-Website/queries.html">Back to main page.</a>
  </body>
</html>
