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
	  $yr = stripslashes($_GET['year']);

	  $query = "SELECT * FROM `historicEconomic` WHERE name=".$cName." AND year=".$yr;

	  $result = mysqli_query($con, $query);

	  echo "<p/>Query returned ".$result->num_rows." results<p/>";
	  echo "<table>\n";
	  foreach ($line as mysqli_fetch_assoc($result)) {
	    echo "\t<tr>\n";
	    echo "\t\t<td>".$line."</td>\n";
	    echo "\t</tr>\n";
	  }
		echo "</table>\n";

	  // Free resultset
	  $result->free();
	?>
	<p/><a href="../CS364-Project-Website/queries.html">Back to main page.</a>
  </body>
</html>
