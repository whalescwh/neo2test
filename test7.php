<?php
include 'dblib.php';
$con = dbopen();
$strsql = "select format(count(*),0) from trans";
//$result = $con->query($strsql);
//echo $result->field_count;

		echo date("H:m:s") . " - 1<br>";		
sql2table($strsql);
				echo date("H:m:s") . " - 2<br>";
sql2table($strsql);
				echo date("H:m:s") . " - 3<br>";
dbclose($con);
				?>
				