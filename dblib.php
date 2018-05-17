<?php
//open db connection
function dbopen() {
	$srv=$_SERVER["SERVER_NAME"];
	$srv="localhost";
	$id="root"; $pass="fa"; $db="test";
	
	$con = new mysqli($srv,$id,$pass, $db);
	if ($con->connect_errno) {
		echo "mysqli connection error\n";
		echo "err no:". $con->connect_errno ."\n";
		echo "err msg:". $con->connect_error . "\n";
		exit;
	}
	return $con;
}
//close db connection
function dbclose($con) {
	$con->close(); 
}
//return sql as array
function sql2a ($sqlstr) {
	global $con;
	$result = mysql_query($sqlstr);
//?echo $sqlstr;
	return $result;
}
//return sql as array
function sql2json ($sqlstr) {
	global $con;
	$result = mysql_query($sqlstr);
//?echo $sqlstr;
	return json_encode( $result );
}
//sql update
function sqlupdate ($sqlstr) {
	global $con;
	//echo $sqlstr;
	$result = mysql_query($sqlstr);
	return $result;
}
//return sql as html table
function sql2table ($sqlstr) {
	//echo $sqlstr;
	global $con;
	$result = $con->query($sqlstr);
	echo "<table class=list><tr>";
	$fldnames = $result->fetch_fields();
	foreach ($fldnames as $fldname) {
		echo "<th>" . $fldname->name ;
	}
	echo "</tr>";
	while($row = mysqli_fetch_row($result))
	{
	  echo "<tr class=list>";
	  for ($i= 0; $i < $result->field_count ; $i++ )
	  {
		if (is_numeric($row[$i])) {
			echo "<td class=listn>" . $row[$i] . "</td>";
		} else {
			echo "<td class=list>" . $row[$i] . "</td>";
		}
	  }
	  echo "</tr>";
	}
	echo "</table>";
	$result->close();
};
//return sql as html table with last row as sum
function sql2tablesum ($sqlstr, $sqlsum) {
	global $con;
	//echo $sqlstr;
	$result = mysql_query($sqlstr);
	echo "<table class=list><tr>";
	while ($property = mysql_fetch_field($result))  echo "<th>" . $property->name . "</th>";
	echo "</tr>";
	while($row = mysql_fetch_array($result))
	{
	  echo "<tr class=list>";
	  for ($i= 0; $i < mysql_num_fields($result); $i++ )
	  {
		if (is_numeric($row[$i])) {
			echo "<td class=listn>" . $row[$i] . "</td>";
		} else {
			echo "<td class=list>" . $row[$i] . "</td>";
		}
	  }
	  echo "</tr>";
	}
	
	$result = mysql_query($sqlsum);
	while($row = mysql_fetch_array($result))
	{
	  echo "<tr class=list>";
	  for ($i= 0; $i < mysql_num_fields($result); $i++ )
	  {
		if (is_numeric($row[$i])) {
			echo "<td class=listn>" . $row[$i] . "</td>";
		} else {
			echo "<td class=list>" . $row[$i] . "</td>";
		}
	  }
	  echo "</tr>";
	}
	
	echo "</table>";
};
//return sql as form. assume return one row only
function sql2form ($sqlstr) {
	global $con;
	$result = mysql_query($sqlstr);
	echo "<table  class=form>";
	$row = mysql_fetch_array($result);
	for ($i =0; $i < mysql_num_fields($result); $i++)
	{
		$property = mysql_fetch_field($result, $i);
		echo "<tr class=form>";
		echo "<td class=form>" . $property->name . "</td>";
		echo "<td class=form>". $row[$i] ."</td>";
		echo "</tr>";
	}
	echo "</table>";
};
//return sql as edit form. assume return one row only
function sql2edit ($sqlstr) {
	global $con;
	$result = mysql_query($sqlstr);
	echo "<table border='1'>";
	$row = mysql_fetch_array($result);
	for ($i =0; $i < mysql_num_fields($result); $i++)
	{
		$property = mysql_fetch_field($result, $i);
		echo "<tr>";
		echo "<td>" . $property->name . "</td>";
		echo "<td><input type=text name='". $property->name ."' value='". $row[$i] ."'></td>";
		echo "</tr>";
	}
	echo "</table>";
};
//return single value of a sql. e.g. echo sql2val('select count(*) from vuseraccess where uid=1 ')
function sql2val($sqlstr) {
	global $con;
	$result = mysql_query($sqlstr);
	if($row = mysql_fetch_array($result)) { return $row[0]; } else { return "";};
}
//return sql as select option list. e.g. echo "<select name=actid>" .sql2opt("select actid,actid from activity", "Fax")."</select>"
function sql2opt($sqlstr, $default) {
	global $con;
//	$str="<option value='ALL'>ALL</option>";
	$result = mysql_query($sqlstr);
	while($row = mysql_fetch_array($result)) {
		if (strcmp(trim($row[0]), trim($default)) == 0) {
			$str = $str . "<option selected value='". $row[0] ."'>". $row[1] ."</option>";
		} else {
			$str = $str . "<option value='". $row[0] ."'>". $row[1] ."</option>";
		}
	}
	return $str;
}
?>
