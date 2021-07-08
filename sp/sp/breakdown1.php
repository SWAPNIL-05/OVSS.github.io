<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";
$err8="";
$fl=0;
if(isset($_POST['sbm']))
{
	if($_POST['sbm']=="submit")
	{
		if(empty($_POST['bn']))
		{
			$err1="Breakdown No must exist";
			$fl=1;
		}
		if(empty($_POST['bd']))
		{
			$err2="Breakdown Date must exist";
			$fl=1;
		}
		if(empty($_POST['bt']))
		{
			$err3="Breakdown Time must exist";
			$fl=1;
		}
		if(empty($_POST['ci']))
		{
				$err4="Customer Id must exist";
				$fl=1;
		}
		if(empty($_POST['vn']))
		{
			$err5="Vehicle No must exist";
			$fl=1;
		}
		if(empty($_POST['ln']))
		{
			$err6="Location must exist";
			$fl=1;
		}
		if(empty($_POST['pb']))
		{
			$err7="Problem must exist";
			$fl=1;
		}
		if(empty($_POST['st']))
		{
			$err8="Status must exist";
			$fl=1;
		}
	}
}
?>

<html>
<head>
	<script language=javascript>
		function valid1()
		{
			var x;
			x=event.keyCode;
			if(x>=48 && x<=57)
				event.keyCode=x;
			else
				event.keyCode=0;
		}	
		function valid2()
		{
			var x;
			x=event.keyCode;

			if((x>=65 && x<=90) || (x>=97 && x<=122))
				event.keyCode=event.keyCode;
			else
				event.keyCode=0;
		}	

	</script>
</head>
<body>
<form name=from method=post action="breakdown1.php">
<center><table>
<caption> <h2>Breakdown</h2> </caption>

<tr>
<td>Breakdown No :</td>
<td><input type=text  name=bn placeholder="Breakdown No" onkeypress="valid1()"><?php echo $err1;?></td>
</tr>

<tr>
<td>Breakdown Date :</td>
<td><input type=date name=bd><?php echo $err2;?></td>
</tr>

<tr>
<td>Breakdown Time :</td>
<td><input type=time name=bt><?php echo $err3;?></td>
</tr>

<tr>
<td>Customer Id :</td>
<td><input type=text name=ci placeholder="Customer Id" onkeypress="valid2()"><?php echo $err4;?></td>
</tr>

<tr>
<td>Vehicle No :</td>
<td><input type=text name=vn placeholder="Vehicle No"><?php echo $err5;?></td>
</tr>

<tr>
<td>Location :</td>
<td><input type=text name=ln placeholder="Location"><?php echo $err6;?></td>
</tr>

<tr>
<td>Problem :</td>
<td><input type=text name=pb placeholder="Problem"><?php echo $err7;?></td>
</tr>

<tr>
<td>Status :</td>
<td><input type=text name=st placeholder="Status"><?php echo $err8;?></td>
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
$sql="insert into br values('$_POST[bn]','$_POST[bd]','$_POST[bt]','$_POST[ci]','$_POST[vn]',
'$_POST[ln]','$_POST[pb]','$_POST[st]')";
mysql_query($sql,$cn);
echo "data stored...";
}
else
if($sb=="update")
{
	$sql="update br set bdate='$_POST[bd]',btime='$_POST[bt]',cid='$_POST[ci]',vno='$_POST[vn]',loc='$_POST[ln]',prob='$_POST[pb]',st='$_POST[st]' where bno='$_POST[bn]' ";
	mysql_query($sql,$cn);
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from br where bno='$_POST[bn]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption><h2>Breakdown information</h2></caption>";
	echo "<tr>";
	echo "<th>Breakdown No</th>";
	echo "<th>Breakdown Date</th>";
	echo "<th>Breakdown Time</th>";
	echo "<th>Customer Id</th>";
	echo "<th>Vehicle No</th>";
	echo "<th>Location</th>";
	echo "<th>Problem</th>";
	echo "<th>Status</th>";
	echo "</tr>";
	$sql="select * from br order by bno";
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
		echo "<td>$row[7]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption><h2>Breakdown information</h2></caption>";
	echo "<tr>";
	echo "<th>Breakdown No</th>";
	echo "<th>Breakdown Date</th>";
	echo "<th>Breakdown Time</th>";
	echo "<th>Customer Id</th>";
	echo "<th>Vehicle No</th>";
	echo "<th>Location</th>";
	echo "<th>Problem</th>";
	echo "<th>Status</th>";
	echo "</tr>";
	$sql="select * from br where bno='$_POST[bn]'";
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
		echo "<td>$row[7]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>