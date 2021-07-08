<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";

$fl=0;
if(isset($_POST['sbm']))
{
	if($_POST['sbm']=="submit")
	{
		if(empty($_POST['bn']))
		{
			$err1="User Id must exist";
			$fl=1;
		}
		if(empty($_POST['bd']))
		{
			$err2="User Name must exist";
			$fl=1;
		}
		if(empty($_POST['bt']))
		{
			$err3="Password must exist";
			$fl=1;
		}
		if(empty($_POST['ci']))
		{
				$err4="Email-id must exist";
				$fl=1;
		}
		if(empty($_POST['vn']))
		{
			$err5="Mobile No must exist";
			$fl=1;
		}
		
	}
}
?>

<html>
<body>
<form name=from method="post" action="user1.php">
<center><table>
<caption> User </caption>

<tr>
<td>User Id :</td>
<td><input type=text name=ui placeholder="User Id"><?php echo $err1;?></td>
</tr>

<tr>
<td>User Name :</td>
<td><input type=text name=un placeholder="User Name"><?php echo $err2;?></td>
</tr>

<tr>
<td>Password</td>
<td><input type=password name=ps placeholder="Password"><?php echo $err3;?></td>
</tr>

<tr>
<td>Email Id :</td>
<td><input type=text name=ei placeholder="Email Address"><?php echo $err4;?></td>
</tr>

<tr>
<td>Mobile No :</td>
<td><select><option>+91</option></select><input type=text name=mn placeholder="10 digit Number"><?php echo $err5;?></td>
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
$sql="insert into user1 values('$_POST[ui]','$_POST[un]','$_POST[ps]','$_POST[ei]','$_POST[mn]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
	$sql="update user1 set username='$_POST[un]',password='$_POST[ps]',emailid='$_POST[ei]',mobileno='$_POST[mn]' WHERE userid='$_POST[ui]'";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from user1 where userid='$_POST[ui]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption> User </caption>";
	echo "<tr>";
	echo "<th>User Id</th>";
	echo "<th>User Name</th>";
	echo "<th>Password</th>";
	echo "<th>Email-id</th>";
	echo "<th>Mobile No</th>";
	echo "</tr>";
	$sql="select * from user1";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption>User information</caption>";
	echo "<tr>";
	echo "<th>User Id</th>";
	echo "<th>User Name</th>";
	echo "<th>Password</th>";
	echo "<th>Email-id</th>";
	echo "<th>Mobile No</th>";
	echo "</tr>";
	$sql="select * from user1 where userid='$_POST[ui]'";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>