<?php
session_start();




$db=mysqli_connect('localhost','root','','Pharmacy') or die("could not conect to the database");

if(isset($_POST["item_name"]))
{
	$item_name=$_POST['item_name'];

$item_name=mysqli_real_escape_string($db,$_POST['item_name']);
$quantity=mysqli_real_escape_string($db,$_POST['quantity']);

session_destroy();
}

?>








<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
  <style>
  form input[type="text"]{
	  
	  border-radius:3px;
  }
  
  form p{
	 color:gray; 
  }
  </style>
  
    <meta charset="utf-8">
    <title>purchase.com</title>

    <link rel="stylesheet" href="manage_stock.css">

  </head>
  
  <body style="background-color:#ffebcd">
<div class="container2">

	<form method="post" action="reciept.php" target="fofo">
	  
		
		
		  <p><label for="client_name"><b>Client name</b> :</label>
		<input style="margin-left:40px;border-bottom-color:navy" type="text" name="client_name" ></p>
				<HR></HR>

		<br>
		
		
		

		<p><label for="item_name"><b>Item1 </b> :</label>
		<input style="margin-left:46px;margin-right:46px;" type="text" name="item_name" >
		
		<label for="quantity7"><b>quantity</b>:</label>
		<input style="" type="text" name="quantity7" ></p>
		
		
		
		
		
		
		
		
		
		
		
		<p><label for="item_name2"><b>Item2 </b> :</label>
		<input style="margin-left:46px;margin-right:46px;" type="text" value="0" name="item_name2" >
		
		<label for="quantity2"><b>quantity</b>:</label>
		<input style="" type="text" name="quantity2" ></p>
		
		<p><label for="item_name3"><b>Item3 </b> :</label>
		<input style="margin-left:46px;margin-right:46px;" type="text" value="0" name="item_name3" >
		
		<label for="quantity3"><b>quantity</b>:</label>
		<input style="" type="text" name="quantity3" ></p>
		
		<p><label for="item_name4"><b>Item4 </b> :</label>
		<input style="margin-left:46px;margin-right:46px;" type="text" value="0" name="item_name4" >
		
		<label for="quantity4"><b>quantity</b>:</label>
		<input style="" type="text" name="quantity4" ></p>
		
		<p><label for="item_name5"><b>Item5</b> :</label>
		<input style="margin-left:46px;margin-right:46px;" type="text" value="0" name="item_name5" >
		
		<label for="quantity5"><b>quantity</b>:</label>
		<input style="" type="text" name="quantity5" ></p>
		
		
		
		<p>
		<label for="rate"><b>Select Currency:</b>:</label>
		
		<!--<input style="" type="text" name="rate" value="0" ></p>-->


<select name="rate" style="border-radius:2px;width:120px;margin-right:130px" width="100">
<option value="0">US$</option>
<option value="1">RTGS$</option>
<option value="2">BOND</option>
<option value="3">ECOCASH</option>

</select>



		<button style="border-radius:3px;height:30px;background-color:green;color:white" type="submit" name="purchase" >purchase</button>
		
				
		
		</form>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<a style="float:right;color:white;text-decoration:none;border:1px solid white;padding:0.7%;background:rgba(0,0,0,0.5)" href="daily_sales.php">daily sales</a>
</div>

		
</body>
</html>

		