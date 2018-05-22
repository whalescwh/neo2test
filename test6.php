<?php
include 'dblib.php';
echo "<html><body>";
   // echo $_REQUEST["fuserid"];
    //echo $_REQUEST["fstart"];
    //echo $_REQUEST["fend"];
showinput();

if ($_REQUEST["fsql"] != "") {
	$con = dbopen();
	sql2table($_REQUEST["fsql"]);
	dbclose($con);
}

echo "</body></html>";
exit();

function showinput() {
	$strsql = $_REQUEST["fsql"];
	if ($strsql == "") {$strsql = "select * from users inner join trans on trans.user_id = users.user_id"; };
  ?>

<form method=post>
<table>
<tr><td><textarea name=fsql rows=6 cols=80><?php echo $_REQUEST["fsql"]; ?></textarea></td></tr>
<tr><td><input type=submit name=fsubmit value="Run SQL"><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
