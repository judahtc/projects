<?php
session_start();

$db=mysqli_connect('localhost','root','','brian') or die("connection failed");

if(isset($_POST['rtgs'])){
	
	$rtgs=mysqli_real_escape_string($db,$_POST['rtgs']);
	$bond=mysqli_real_escape_string($db,$_POST['bond']);
	$rand=mysqli_real_escape_string($db,$_POST['rand']);
	$sql="update rate set rtgs='$rtgs',bond='$bond',rand='$rand' where usd=1";
	$result=mysqli_query($db,$sql);
	
	
}


?>

<!doctype html>
<html>
<head>
<title>CHANGE RATE</title>

<style>
form input[type="text"]{
	border-radius:3px;
	
}

form{ 
border:1px solid navy;
width:50%;
margin-left:27%;
padding-bottom:2%;
background-color:gray;
}

</style>


</head>
<body>

<form method="post" action="#">
<CENTER><h3 style="color:navy">BRIAN'S BOLTS & HARDWARE</H3></CENTER>
<center><input type="text" readonly value="$US=1" name="rtgs">
<br>
<br>

<input type="text" placeholder="rtgs" name="rtgs">
<input type="text" placeholder="bond" name="bond">
<input type="text" placeholder="ecocash" name="rand">
<br>
<br>
<button style="background-color:navy;color:white" type="submit" name="update">update</button>
</center>
</form>





</body>
</html>


