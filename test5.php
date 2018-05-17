<?php
switch ($_REQEST["fsubmit"]) {
  case "Create":
    echo $_REQUEST["fuserid"];
    echo $_REQUEST["fstart"];
    echo $_REQUEST["fend"];
    showinput();
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
<tr><td><input type=submit name=fsubmit value="Create"></td><td><input type=submit name=fsubmit value="Cancel"></td></tr>
</table>
</form>
</body>
</html>

<?php
}
?>
