<?php

	session_start();
	extract($_POST);

$_session['username']='username';
$_session['password']='password';

	if(isset($_Post['username'])){
			$db=mysqli_connect('localhost','root','','Pharmacy') or die("not connected");

			$sql="select * from staff where username='".$username."' and password='".$password."'";

			$result=mysqli_query($db,$sql);

	}

session_destroy();


?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MOMENTUM||POS_homepage.com</title>

    <link rel="stylesheet" href="EPSMS_homepage.css">
	<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width,initial-scale=0.4" >

  </head>
  <body style="">



  <div class="ha">
  <CENTER><h3 style="padding:12px;background-color:slategray;color:white;width:96.6%;">MOMENTUM HOLDINGS (PVT) LTD POS</H3></CENTER>
  </div>
  <DIV CLASS="one">
  <ul>
		<li><a href="view_stock.php">VIEW STOCK</a></li>
		<li><a href="manage_stock.php">MANAGE STOCK</a></li>
		<li><a href="purchase.php">SALES</a></li>
		<li><a href="daily_sales.php">DAILY SALES</a></li>
			
</ul>
</div>
<script>
	function calcNumbers(result){
		form.displayResult.value=form.displayResult.value+result;
		
	}
	</script>
	
<div class="container12">	
  <div class="container">
    <form name="form">
    <div class="display">
      <input type="text" placeholder="0" name="displayResult" />
    </div>
      <div class="buttons">
        <div class="row">
        <input type="button" name="b7" value="7" onClick="calcNumbers(b7.value)">
          <input type="button" name="b8" value="8" onClick="calcNumbers(b8.value)">
          <input type="button" name="b9" value="9" onClick="calcNumbers(b9.value)">
          <input type="button" name="addb" value="+" onClick="calcNumbers(addb.value)">
        </div>
        
        <div class="row">
        <input type="button" name="b4" value="4" onClick="calcNumbers(b4.value)">
          <input type="button" name="b5" value="5" onClick="calcNumbers(b5.value)">
          <input type="button" name="b6" value="6" onClick="calcNumbers(b6.value)">
          <input type="button" name="subb" value="-" onClick="calcNumbers(subb.value)">
        </div>
        
        <div class="row">
        <input type="button" name="b1" value="1" onClick="calcNumbers(b1.value)">
          <input type="button" name="b2" value="2" onClick="calcNumbers(b2.value)">
          <input type="button" name="b3" value="3" onClick="calcNumbers(b3.value)">
          <input type="button" name="mulb" value="*" onClick="calcNumbers(mulb.value)">
        </div>
        
        <div class="row">
        <input type="button" name="b0" value="0" onClick="calcNumbers(b0.value)">
          <input type="button" name="potb" value="." onClick="calcNumbers(potb.value)">
          <input type="button" name="divb" value="/" onClick="calcNumbers(divb.value)">
          <input type="button" class="red" value="=" onClick="displayResult.value=eval(displayResult.value)">
        </div>
      </div>
</div>

<div class="container1"style="margin-left:4%;	" >

<iframe width="600px" height="400px" src="purchase.php" frameborder="noe" scrolling="no" name="fofo"></iframe>

</div>


</div>



</body>
