<?php
session_start();
		
	$db=mysqli_connect('localhost','root','','pharmacy') or die("connection failed");
if(isset($_POST['item_name'])){
	
	
	    $item_name=mysqli_real_escape_string($db,$_POST['item_name']);
		$supplier_id1=mysqli_real_escape_string($db,$_POST['supplier_id1']);
		

										
										$sqli="UPDATE items SET supplier_id='$supplier_id1' where item_name='$item_name'";
										$result=mysqli_query($db,$sqli);


}
?>







<!doctype html>
<html>
<head>
<link rel="stylesheet" href="welcome.css">
<title>change||item price</title>
</head>
<body >
<div style="border:1px solid;width:25%;margin-left:40%;border-color:navy;margin-top:3%;background:rgba(0,0,0,0.3)">

				<form  action="#" method="POST">
					<div style="text-align:center;margin-top:3%" class="SignInBox">
					
						<div class="textbox">
									<p><input type="TEXT" placeholder="Enter item name" name="item_name"  id="item_name" size 80; required/></p>
									<p><input type="text" placeholder="Enter new supplier_id" name="supplier_id1"  id="item_price1" size 50; required/></p>
									
									
									<p><input style="color:navy" type="submit" name="submit" value="change"></p>
						</div>
				</form>	</div>	
						
</body>
</html>						