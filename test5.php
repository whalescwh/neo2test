<?php
switch ($_REQEST["fsubmit"]) {
  case "Create":
    echo $_REQUEST["fuserid"];
    echo $_REQUEST["fstart"];
    echo $_REQUEST["fend"];
    if ($_REQUEST["fstart"] <= 0) echo "<p>Start must be a number greater than zero";
    if ($_REQUEST["fend"] <= 0) echo "<p>End must be a number greater than zero";
    if ($_REQUEST["fstart"] < $_EQUEST["fend"]) echo "<p>End must not be samller than Start";
    
    showinput();
    echo "?";
  default:
    showinput();
    break;
};

exit();

function showinput() {
  ?>
<html>
<body>
<form method=post>
<table>
<tr><td>User id:</td><td><select name=fuserid><option value="whales">whales</option><option value="whales1">whales1</option></select></td></tr>
<tr><td>Trans No Start:</td><td><input type=text name=fstart></td></tr>
<tr><td>Trans No End:</td><td><input type=text name=fend></td></tr>
<tr><td><input type=submit name=fsubmit value="Create"></td><td><input type=reset value="Cancel"></td></tr>
</table>
</form>
</body>
</html>

<?php
}
?>
