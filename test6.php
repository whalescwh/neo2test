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
  ?>

<form method=post>
<table>
<tr><td><textarea name=fsql rows=6 cols=50></textarea></td></tr>
<tr><td><input type=submit name=fsubmit value="Run SQL"><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
