<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";

$fl=0;
if(isset($_POST['sbm']))
{
	if($_POST['sbm']=="submit")
	{
		if(empty($_POST['an']))
		{
			$err1="Allocation No must exist";
			$fl=1;
		}
		if(empty($_POST['ad']))
		{
			$err2="Allocation Date must exist";
			$fl=1;
		}
		if(empty($_POST['at']))
		{
			$err3="Allocation Time must exist";
			$fl=1;
		}
		if(empty($_POST['en']))
		{
				$err4="Engineer No must exist";
				$fl=1;
		}
		if(empty($_POST['sn']))
		{
			$err5="Solution must exist";
			$fl=1;
		}
		if(empty($_POST['rt']))
		{
			$err6="Reporting Time must exist";
			$fl=1;
		}
		
	}
}
?>

<html>
<body>
<form name=from method="post" action="workallocation.php">
<center><table>
<caption> Work Allocation </caption>

<tr>
<td>Allocation No :</td>
<td><input type=text name=an placeholder="Allocation No"><?php echo $err1;?></td>
</tr>

<tr>
<td>Allocation Date :</td>
<td><input type=date name=ad placeholder="User Name"><?php echo $err2;?></td>
</tr>

<tr>
<td>Allocation Time :</td>
<td><input type=time name=at placeholder="Allocation Time"><?php echo $err3;?></td>
</tr>

<tr>
<td> Engineer No :</td>
<td><input type=text name=en placeholder="Engineer No"><?php echo $err4;?></td>
</tr>

<tr>
<td> Solution :</td>
<td>
	<input type=text name=sn placeholder="Solution"><?php echo $err5;?>
</td>
</tr>

<tr>
<td> Reporting Time :</td>
<td><input type=time name=rt placeholder="Reporting Time"><?php echo $err6;?></td>
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
$sql="insert into workallocation values('$_POST[an]','$_POST[ad]','$_POST[at]','$_POST[en]','$_POST[sn]','$_POST[rt]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
$sql="update workallocation set allocationdate='$_POST[ad]', allocationtime='$_POST[at]', engineerno='$_POST[en]', solution='$_POST[sn]', reportingtime='$_POST[rt]' where allocationno='$_POST[an]' ";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from workallocation where allocationno='$_POST[an]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption> Work Allocation </caption>";
	echo "<tr>";
	echo "<th>Allocation No</th>";
	echo "<th>Allocation Date</th>";
	echo "<th>Allocation Time</th>";
	echo "<th>Engineer No</th>";
	echo "<th>Solution</th>";
	echo "<th>Reporting Time</th>";
	echo "</tr>";
	$sql="select * from workallocation order by allocationno";
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
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption>Work Allocation</caption>";
	echo "<tr>";
	echo "<th>Allocation No</th>";
	echo "<th>Allocation Date</th>";
	echo "<th>Allocation Time</th>";
	echo "<th>Engineer No</th>";
	echo "<th>Solution</th>";
	echo "<th>Reporting Time</th>";
	echo "</tr>";
	$sql="select * from workallocation where allocationno='$_POST[an]'";
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
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>