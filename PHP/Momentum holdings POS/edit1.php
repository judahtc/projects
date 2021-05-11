<?php 

session_start();
extract($_POST);


if(isset($_POST['item_name'])){
	$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");


$id=$_SESSION['item_id'];

$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
$unit_price=mysqli_real_escape_string($db,$_POST['unit_price']);

$sqli="update items set quantity='$quantity'  where item_id='$id' ";
$results=mysqli_query($db,$sqli);

$sql2="update items set unit_price='$unit_price' where item_id='$id' ";
$resultsS=mysqli_query($db,$sql2);

$_SESSION['a']="success";	
}

?>


<!doctype html>
<html>
<head>

<style>


</style>

 <link rel="stylesheet" href="">
<title>edit Stock</title>
</head>
<body style="background-image:url(back.jpg);background-size:cover;">

<table border="1">
<form method="POST" action="#">
<?php


$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");

$id=$_REQUEST['item_id'];
$_SESSION['item_id']=$id;
$sql="select * from items where item_id='$id' ";
$result=mysqli_query($db,$sql);

while($rows=mysqli_fetch_assoc($result)){
?>
<tr>
<th>Item name</th><td><input type="text" value="<?php echo $rows['item_name'];?>" name="item_name" READONLY></td>
</tr>
<tr>

<th>Quantity</th><td><input type="text" name="quantity" value="<?php echo $rows['quantity'];?>" ></td>
</tr>
<tr>
<th>Price</th><td><input type="text" name="unit_price" value="<?php echo $rows['unit_price'];?>" ></td>
</tr>
<tr>
<th><?php  ; echo $_SESSION['a'] ;?></th><td><input type="submit" value="change" name="submit"></td>
</tr>

<?php

}
?>

</form>
</table>

</body>
</html>