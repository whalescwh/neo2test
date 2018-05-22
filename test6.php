<?php
include 'dblib.php';
echo "<html><body>";
   // echo $_REQUEST["fuserid"];
    //echo $_REQUEST["fstart"];
    //echo $_REQUEST["fend"];
showinput();

if ($_REQUEST["fsql"] == "") {
	echo "<p>Input SQL to run.";
} else {
	sql2table($_REQUEST["fsql"]);
}

echo "</body></html>";
exit();

function showinput() {
  ?>

<form method=post>
<table>
<tr><td>SQL:</td><td><textarea name=fsql rows=6 cols=50></textarea></td></tr>
<tr><td><input type=submit name=fsubmit value=Run></td><td><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
