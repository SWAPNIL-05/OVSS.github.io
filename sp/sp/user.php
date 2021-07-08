<html>
<body>
<form name=frm method=post action="user.php">
<center><table>
<caption> User information</caption>
<tr>
<td>User Id:</td>
<td><input type=text name=ui></td>
</tr>
<tr>
<td>User Name :</td>
<td><input type=text name=un></td>
</tr>
<tr>
<td>Password :</td>
<td><input type=password name=ps></td>
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
$sql="insert into user values('$_POST[ui]','$_POST[un]','$_POST[ps]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
	$sql="update user set username='$_POST[un]',password='$_POST[ps]'where userid='$_POST[ui]'";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from user where userid='$_POST[ui]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption>user information</caption>";
	echo "<tr>";
	echo "<th>userid</th>";
	echo "<th>username</th>";
	echo "<th>password</th>";
	echo "</tr>";
	$sql="select * from user";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption>user information</caption>";
	echo "<tr>";
	echo "<th>userid</th>";
	echo "<th>username</th>";
	echo "<th>password</th>";
	echo "</tr>";
	$sql="select * from user where userid='$_POST[ui]'";
	$result=mysql_query($sql,$cn);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>