<?php
session_start();
		
	$db=mysqli_connect('localhost','root','','brian') or die("connection failed");

	
		$item_id=$_REQUEST['item_id'];

										
										$sqli="delete  from items where item_id='$item_id'";
										$result=mysqli_query($db,$sqli);
echo("successfully deleted");


?>