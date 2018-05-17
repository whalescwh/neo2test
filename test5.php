<?php
echo "<html><body>";

if (strcmp($_REQEST["fuserid"], "") != 0) {
    echo $_REQUEST["fuserid"];
    echo $_REQUEST["fstart"];
    echo $_REQUEST["fend"];
    if ($_REQUEST["fstart"] <= 0) echo "<p>Start must be a number greater than zero";
    if ($_REQUEST["fend"] <= 0) echo "<p>End must be a number greater than zero";
    if ($_REQUEST["fstart"] < $_EQUEST["fend"]) echo "<p>End must not be samller than Start";
    $cnt = $_REQUEST["fstart"];
    for ($cnt=$_REQUEST["fstart"]; $cnt <= $_REQUEST["fend"]; $cnt ++) {
        $strsql = "insert into trans (trans_no, userid, remarks) value (" . $cnt . ", '". $_REQUEST["fuserid"]."', 'remarks ".$_REQUEST["fstart"]." to ".$_REQUEST["fend"]."')";
    };
    echo $strsql;
};
showinput();
echo "</body></html>";
exit();

function showinput() {
  ?>

<form method=post>
<table>
<tr><td>User id:</td><td><select name=fuserid><option value="whales">whales</option><option value="whales1">whales1</option></select></td></tr>
<tr><td>Trans No Start:</td><td><input type=text name=fstart></td></tr>
<tr><td>Trans No End:</td><td><input type=text name=fend></td></tr>
<tr><td><input type=submit name=fsubmit value="Create"></td><td><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
