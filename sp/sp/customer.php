<?php
$err1="";
$err2="";
$err3="";
$err4="";
$err5="";
$err6="";
$err7="";
$err8="";
$err9="";
$err10="";
$fl=0;
if(isset($_POST['sbm']))
{
	if($_POST['sbm']=="submit")
	{
		if(empty($_POST['ci']))
		{
			$err1="Customer Id must exist";
			$fl=1;
		}
		if(empty($_POST['cn']))
		{
			$err2="Customer Name must exist";
			$fl=1;
		}
		if(empty($_POST['ad']))
		{
			$err3="Address must exist";
			$fl=1;
		}
		if(empty($_POST['ct']))
		{
				$err4="City must exist";
				$fl=1;
		}
		if(empty($_POST['mn']))
		{
			$err5="Mobile No must exist";
			$fl=1;
		}
		if(empty($_POST['vn']))
		{
			$err6="Vehicle Name must exist";
			$fl=1;
		}
		if(empty($_POST['mk']))
		{
			$err7="Make must exist";
			$fl=1;
		}
		if(empty($_POST['md']))
		{
			$err8="Model must exist";
			$fl=1;
		}
		if(empty($_POST['my']))
		{
			$err9="Make Year must exist";
			$fl=1;
		}
		if(empty($_POST['gender']))
		{
			$err10="Gender must exist";
			$fl=1;
		}
	}
}
?>


<html>
<body>
<form name=from method=post action="customer.php">
<center><table>
<caption> Customer </caption>

<tr>
<td>Customer Id :</td>
<td><input type=text name=ci placeholder="Customer Id"><?php echo $err1;?></td>
</tr>

<tr>
<td>Customer Name :</td>
<td><input type=text name=cn placeholder="Customer Name"><?php echo $err2;?></td>
</tr>

<tr>
<td>Address :</td>
<td><textarea name=ad></textarea><?php echo $err3;?></td>
</tr>

<tr>
<td>City :</td>
<td><input type=text name=ct placeholder="City"><?php echo $err4;?></td>
</tr>

<tr>
<td>Mobile No :</td>
<td><select><option>+91</option></select>
<input type=mobile name=mn placeholder="10 digit Number"><?php echo $err5;?></td>
</tr>

<tr>
<td>Vehicle Name :</td>
<td><input type=text name=vn placeholder="Vehicle No"><?php echo $err6;?></td>
</tr>

<tr>
<td>Make :</td>
<td><input type=text name=mk placeholder="Make"><?php echo $err7;?></td>
</tr>

<tr>
<td>Model :</td>
<td><input type=text name=md placeholder="Model"><?php echo $err8;?></td>
</tr>

<tr>
<td>Make Year :</td>
<td><input type=text name=my placeholder="Make"><?php echo $err9;?></td>
</tr>

<tr>
<td>Gender :</td>
<td>
	<input type=radio id="male" name=gender value=male><label for="male">Male</label>
	<input type=radio id="fm" name=gender value=female><label for="fm">Female</label><?php echo $err10;?>
</td>
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
 $sql="insert into customer values('$_POST[ci]', '$_POST[cn]', '$_POST[ad]', '$_POST[ct]', '$_POST[mn]',
 '$_POST[vn]', '$_POST[mk]', '$_POST[md]', '$_POST[my]', '$_POST[gender]')";
 mysql_query($sql,$cn);
 echo "data stored...";
}
else
if($sb=="update")
{
 $sql="update customer set customername='$_POST[cn]',address='$_POST[ad]',city='$_POST[ct]',mobileno='$_POST[mn]',vehiclename='$_POST[vn]',make='$_POST[mk]',model='$_POST[md]',makeyear='$_POST[my]',gender='$_POST[gender]' where customerid='$_POST[ci]'";
	mysql_query($sql,$cn); 
	echo "data updated...";
}
else
	if($sb=="delete") 
{
$sql="delete from customer where customerid='$_POST[ci]'";
mysql_query($sql,$cn);
echo "data deleted...";
}
else
if($sb=="display") 
{
	echo "<center><table border=1>";
	echo "<caption>Customer information</caption>";
	echo "<tr>";
	echo "<th>Customer Id</th>";
	echo "<th>Customer Name</th>";
	echo "<th>Address</th>";
	echo "<th>City</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Vehicle Name</th>";
	echo "<th>Make</th>";
	echo "<th>Model</th>";
	echo "<th>Make Year</th>";
	echo "<th>Gender</th>";
	echo "</tr>";
	$sql="select * from customer order by customerid";
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
		echo "<td>$row[8]</td>";
		echo "<td>$row[9]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
	if($sb=="search") 
{
	echo "<center><table border=1>";
	echo "<caption>Customer information</caption>";
	echo "<tr>";
	echo "<th>Customer Id</th>";
	echo "<th>Customer Name</th>";
	echo "<th>Address</th>";
	echo "<th>City</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Vehicle Name</th>";
	echo "<th>Make</th>";
	echo "<th>Model</th>";
	echo "<th>Make Year</th>";
	echo "<th>Gender</th>";
	echo "</tr>";
	$sql="select * from customer where customerid='$_POST[ci]'";
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
		echo "<td>$row[8]</td>";
		echo "<td>$row[9]</td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
}

?>