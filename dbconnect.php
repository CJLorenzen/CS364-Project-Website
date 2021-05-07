<html>
  <body>
	<?php
$mysqli = new mysqli("localhost","my_user","my_password","my_db");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
	  $Rcvd_target = $_REQUEST['target'];
	  $Rcvd_highlow = $_REQUEST['highlow'];
	  $Rcvd_startY = $_REQUEST['startY'];
	  $Rcvd_endY = $_REQUEST['endY'];
	  $Rcvd_count = $_REQUEST['count'];

	  // Performing SQL query
	if($Rcvd_target = population){
	  if($Rcvd_highlow = high){
	  $query = "SELECT name, population FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY population ASC".
		   " LIMIT '$Rcvd_count'";}
	  else $query = "SELECT name, population FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY population DESC".
		   " LIMIT '$Rcvd_count'";
	}
	else if($Rcvd_target = GDP){
	  if($Rcvd_highlow = high){
	  $query = "SELECT name, GDP FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY GDP ASC".
		   " LIMIT '$Rcvd_count'";}
	  else $query = "SELECT name, GDP FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY GDP DESC".
		   " LIMIT '$Rcvd_count'";
	}
	else if($Rcvd_target = GDPPC){
	  if($Rcvd_highlow = high){
	  $query = "SELECT name, GDPPC FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY GDPPC ASC".
		   " LIMIT '$Rcvd_count'";}
	  else $query = "SELECT name, GDPPC FROM Country".
		   " WHERE (year BETWEEN '$Rcvd_startY' AND '$Rcvd_endY')".
		   " ORDER BY GDPPC DESC".
		   " LIMIT '$Rcvd_count'";
	}

	  echo '<p/>Query is: '.$query.'<br/>';
	  $result = $link->query($query) or die('Query failed: ' . $link->error);
	  // Dump the query results
	  echo "<p/>Query returned ".$result->num_rows." results<p/>";
	  echo "<table>\n";
	  while ($line = $result->fetch_assoc()) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	  }
	  echo "</table>\n";

	  // Free resultset
	  $result->free();

	  // Closing connection
	  $link->close();
	?>
	<p/><a href="../CS364-Project-Website/page2.html">Back to main page.</a>
  </body>
</html>
