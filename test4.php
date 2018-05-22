<?php
include 'dblib.php';
$con = dbopen();
$strsql = "select count(*) from (select trans.trans_id from trans inner join users on users.user_id = trans.user_id limit 5000) aa ";
sql2table($strsql);
$strsql = "select trans.trans_id, trans.trans_no, trans.user_id, login,  trans.remarks from trans inner join users on users.user_id = trans.user_id limit 5000";
sql2table($strsql);
//$result = $con->query($strsql);
//echo $result->field_count;
dbclose($con);
exit();

?>
