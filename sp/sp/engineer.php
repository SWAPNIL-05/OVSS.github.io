<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";

$fl=0;
if(isset($_POST['sbm']))
{
	if($_POST['sbm']=="submit")
	{
		if(empty($_POST['ei']))
		{
			$err1="Engineer Id must exist";
			$fl=1;
		}
		if(empty($_POST['en']))
		{
			$err2="Engineer Name must exist";
			$fl=1;
		}
		if(empty($_POST['ad']))
		{
			$err3="Address must exist";
			$fl=1;
		}
		if(empty($_POST['mn']))
		{
				$err4="Mobile No must exist";
				$fl=1;
		}
		if(empty($_POST['em']))
		{
			$err5="Email Id must exist";
			$fl=1;
		}
		if(empty($_POST['sl']))
		{
			$err6="Specialist must exist";
			$fl=1;
		}
		if(empty($_POST['ep']))
		{
			$err7="Experiance must exist";
			$fl=1;
		}
		
	}
}
?>

<html>
<body>
<form name=from method=post action="engineer.php">
<center><table>
<caption> Engineer </caption>

<tr>
<td>Engineer Id :</td>
<td><input type=text name=ei placeholder="Engineer Id"><?php echo $err1;?></td>
</tr>

<tr>
<td>Engineer Name :</td>
<td><input type=text name=en placeholder="Engineer Name"><?php echo $err2;?></td>
</tr>

<tr>
<td>Address :</td>
<td><textarea name=ad></textarea><?php echo $err3;?></td>
</tr>

<tr>
<td>Mobile No :</td>
<td><select><option>+91</option></select>
<input type=text name=mn placeholder="10 digit Number"><?php echo $err4;?></td>
</tr>

<tr>
<td>Email Id :</td>
<td><input type=text name=em placeholder="Email Address"><?php echo $err5;?></td>
</tr>

<tr>
<td>Specialist :</td>
<td><input type=text name=sl placeholder="Specialist"><?php echo $err6;?></td>
</tr>

<tr>
<td>Experiance :</td>
<td><input type=text name=ep placeholder="Experiance"><?php echo $err7;?></td>
</tr>

</table>
<input type=submit name=sbm value=submit>
<input type=submit name=sbm value=update>
<input type=submit name=sbm value=delete>
<input type=submit name=sbm value=display>
<input type=submit name=sbm value=search>
</center>

</form>
</body>
</html>

<?php
if(isset($_POST['sbm']))
{
$cn=mysql_connect("localhost","root");
mysql_select_db("project",$cn);
$sb=$_POST['sbm'];
if($sb=="submit") 
{
$sql="insert into engineer values('$_POST[ei]','$_POST[en]','$_POST[ad]','$_POST[mn]','$_POST[em]',
'$_POST[sl]','$_POST[ep]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
	$sql="update engineer set engineername='$_POST[en]',address='$_POST[ad]',
       mobileno='$_POST[mn]',emailid='$_POST[em]',specialist='$_POST[sl]',experiance='$_POST[ep]' WHERE engineerid='$_POST[ei]'";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from engineer where engineerid='$_POST[ei]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption>Engineer information</caption>";
	echo "<tr>";
	echo "<th>Engineer Id</th>";
	echo "<th>Engineer Name</th>";
	echo "<th>Address </th>";
	echo "<th>Mobile No</th>";
	echo "<th>Email Id</th>";
	echo "<th>Specialist</th>";
	echo "<th>Experiance</th>";
	echo "</tr>";
	$sql="select * from engineer order by engineerid ";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";
		echo "<td>$row[6]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption>Engineer information</caption>";
	echo "<tr>";
	echo "<th>Engineer Id</th>";
	echo "<th>Engineer Name</th>";
	echo "<th>Address </th>";
	echo "<th>Mobile No</th>";
	echo "<th>Email Id</th>";
	echo "<th>Specialist</th>";
	echo "<th>Experiance</th>";
	echo "</tr>";
	$sql="select * from engineer where engineerid='$_POST[ei]'";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";
		echo "<td>$row[6]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>