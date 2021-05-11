<?php
session_start();

$sales_id=$_REQUEST['sales_id'];
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$sql="delete from daily_sales where sales_id='$sales_id'";
mysqli_query($db,$sql);
 echo ("row deleted successfully");
?>