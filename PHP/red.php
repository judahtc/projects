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

echo("success");	
}

?>