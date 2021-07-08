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
		if(empty($_POST['fn']))
		{
			$err1="Feedback No must exist";
			$fl=1;
		}
		if(empty($_POST['bn']))
		{
			$err2="Breakdown No must exist";
			$fl=1;
		}
		if(empty($_POST['cn']))
		{
			$err3="Customer Id  must exist";
			$fl=1;
		}
		if(empty($_POST['fd']))
		{
				$err4="Feedback Date must exist";
				$fl=1;
		}
		if(empty($_POST['fb']))
		{
			$err5="Feedback must exist";
			$fl=1;
		}
		
	}
}
?>

<html>
<body>
<form name=from method=post>
<center><table>
<caption> Feedback </caption>

<tr>
<td>Feedback No :</td>
<td><input type=text name=fn placeholder="Feedback No"><?php echo $err1;?></td>
</tr>

<tr>
<td>Breakdown No :</td>
<td><input type=text name=bn placeholder="Breakdown No"><?php echo $err2;?></td>
</tr>

<tr>
<td>Customer Id :</td>
<td><input type=text name=cn placeholder="Customer Id"><?php echo $err3;?></td>
</tr>

<tr>
<td>Feedback Date :</td>
<td><input type=date name=fd placeholder="Feedback Date"><?php echo $err4;?></td>
</tr>

<tr>
<td>Feedback :</td>
<td><input type=text name=fb placeholder="Feedback"><?php echo $err5;?></td>
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
$sql="insert into feedback values('$_POST[fn]','$_POST[bn]','$_POST[cn]','$_POST[fd]','$_POST[fb]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
	$sql="update feedback set breakdownno='$_POST[bn]',customerid='$_POST[cn]',
       feedbackdate='$_POST[fd]',feedback='$_POST[fb]' where feedbackno='$_POST[fn]'";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from feedback where feedbackno='$_POST[fn]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption> Feedback </caption>";
	echo "<tr>";
	echo "<th>Feedback No</th>";
	echo "<th>Breakdown No</th>";
	echo "<th>Customer Id </th>";
	echo "<th>Feedback Date</th>";
	echo "<th>Feedback</th>";
	echo "</tr>";
	$sql="select * from feedback order by feedbackno";
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
	echo "<caption>Feedback information</caption>";
	echo "<tr>";
	echo "<th>Feedback No</th>";
	echo "<th>Breakdown No</th>";
	echo "<th>Customer Id </th>";
	echo "<th>Feedback Date</th>";
	echo "<th>Feedback</th>";
	echo "</tr>";
	$sql="select * from feedback where feedbackno='$_POST[fn]'";
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