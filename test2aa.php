<?php
include 'dblib.php';
$con = dbopen();
$strsql = "select format(count(*),0) from trans";
sql2table($strsql);
//$result = $con->query($strsql);
//echo $result->field_count;
dbclose($con);
exit();
?>
