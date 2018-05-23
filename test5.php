<?php
include 'dblib.php';
echo "<html><body>";
   // echo $_REQUEST["fuserid"];
    //echo $_REQUEST["fstart"];
    //echo $_REQUEST["fend"];

    if ($_REQUEST["fstart"] <= 0) echo "<p>Start must be a number greater than zero";
    if ($_REQUEST["fend"] <= 0) echo "<p>End must be a number greater than zero";
    if ($_REQUEST["fstart"] < $_EQUEST["fend"]) echo "<p>End must not be samller than Start";
    $cnt = $_REQUEST["fstart"];
    if ($cnt > 0 ) {
		echo time() . " - Start";
	    $con = dbopen();
	    mysqli_autocommit($con,FALSE);
		$cnt1 = 0;
		for ($cnt=$_REQUEST["fstart"]; $cnt <= $_REQUEST["fend"]; $cnt ++) {
			$strsql = "insert into trans (trans_no, user_id, remarks) values (" . $cnt 
			. ", ". $_REQUEST["fuserid"].", '".$_REQUEST["fremarks"] ."')";
			//echo $strsql;
			sqlupdate($strsql);
			$cnt1 = $cnt1 + 1 ;
			if ($cnt1 >= 100) {
				mysqli_commit($con);
				$cnt1 = 0;
			}
		};
	    echo "Updated ". $cnt . " rows<br>";
		mysqli_commit($con);
	    dbclose($con);
		echo time() . " - End";
	}

showinput();
echo "</body></html>";
exit();

function showinput() {
  ?>

<form method=post>
<table>
<tr><td>User id:</td><td><select name=fuserid><option value=1>whales</option><option value=2>whales1</option></select></td></tr>
<tr><td>Trans No Start:</td><td><input type=text name=fstart></td></tr>
<tr><td>Trans No End:</td><td><input type=text name=fend></td></tr>
<tr><td>Remarks:</td><td><input type=text name=fremarks></td></tr>
<tr><td><input type=submit name=fsubmit value=Create></td><td><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
