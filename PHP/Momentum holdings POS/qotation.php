<?php
session_start();extract($_POST);

$one=0;$two=0;$three=0;$four=0;$five=0;
$_session['item_name']='item_name';
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$d=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
if(isset($_Post['quantity'])){





}




session_destroy();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="sales_form.css">
    <title>reciept</title>
  </head>
  <body >
    
<CENTER><h3 style="margin-top:0;color:blue">BRIAN'S BOLTS & HARDWARE</H3></CENTER>

<div class="a" style="float:left;color:navy;margin-left:30%">
<pre>
<u>FOR</u>
*Bolts 
*Paints
*Electricals
*Farming Tools
*Builders Tools
*General Hardware
</pre>
</div>
<div class="b" style="float:right;color:navy;margin-right:30%">
<pre>

Ferreira Shopping Mall
Mandava Light Industry
Zvishavane
Cell:0772 243 192
     0717 695 353
     0777 686 627

</pre>



</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p><span style="float:left;margin-left:30%">TO:<?php  $_POST['client_name']='client_name';echo $client_name; ?></span> <span style="float:right;margin-right:34%">Date:<?php  $_POST['Date']='Date';echo $Date; ?></span>  </p>


<table style="width:30%;margin-left:33%">


<tr >
<th>QTY</th>
<th>DESCRIPTION</th>
<th>U/ PRICE</th>
<th>TOTAL/ PRICE</th>
</tr>
  <?php
  if(isset($_POST["item_name"]))
{
	
	
	
	
	
	

	
 
	
	
	
	
	
	$item_name=$_POST['item_name'];
  $sql="select * from items where item_name='".$item_name."'";
  $result=mysqli_query($db,$sql);
  
  $sq="select * from items where item_name='".$item_name2."'";
  $resul=mysqli_query($db,$sq);
  
   $s="select * from items where item_name='".$item_name3."'";
  $resu=mysqli_query($db,$s);
  
 $ss="select * from items where item_name='".$item_name4."'";
  $res=mysqli_query($db,$ss);
  
  $sss="select * from items where item_name='".$item_name5."'";
  $re=mysqli_query($db,$sss);
  
  
$mam="select * from rate where usd=1";

$ansa=mysqli_query($db,$mam);

while($rows=mysqli_fetch_assoc($ansa)){
	$rtgs=$rows['rtgs'];
	$bond=$rows['bond'];
	$rand=$rows['rand'];
}

  
  


  $item_name2=mysqli_real_escape_string($db,$_POST['item_name2']);
  $item_name3=mysqli_real_escape_string($db,$_POST['item_name3']);

  

  while ($rows=mysqli_fetch_assoc($result)) {
  ?>


<tr>
<td><?php  $_POST['quantity7']='quantity7';echo $quantity7; ?></td>
<td><?php  $_POST['item_name']='item_name';echo $item_name; ?></td>
<td><?php 
 $_POST['quantity7']='quantity7';
 $_POST['rate']='rate';
 $first=$rows['unit_price'];
 
 if($rate==0){
	echo $first;
 }
else if($rate==1){
	echo $first*$rtgs;
}
else if($rate==2){
	
	echo $first*$bond;
}
else if($rate==3){
	
	echo $first*$rand;
}




  ?></td>
<td><?php 

 $_POST['quantity7']='quantity7';
 $one=$quantity7*$rows['unit_price'];




if($rate==0){
	echo $one;
 }
else if($rate==1){
	echo $one*$rtgs;
}
else if($rate==2){
	
	echo $one*$bond;
}
else if($rate==3){
	
	echo $one*$rand;
}






 ?>
 
 
 
 
 
 
 
 
 
 
 </td>

</tr>

  <?php 
  }
  while ($rows=mysqli_fetch_assoc($resul)) {
  ?>
  

<tr>
<td><?php  $_POST['quantity2']='quantity2';echo $quantity2; ?></td>
<td><?php  $_POST['item_name2']='item_name2';echo $item_name2; ?></td>
<td><?php
  $_POST['quantity2']='quantity2';
  
 
 $_POST['rate']='rate';
 $second=$rows['unit_price'];
 
 if($rate==0){
	echo $second;
 }
else if($rate==1){
	echo $second*$rtgs;
}
else if($rate==2){
	
	echo $second*$bond;
}
else if($rate==3){
	
	echo $second*$rand;
}



 ?></td>
<td><?php

  $_POST['quantity2']='quantity2';
  $two=$quantity2*$rows['unit_price']; 
 

if($rate==0){
	echo $two;
 }
else if($rate==1){
	echo $two*$rtgs;
}
else if($rate==2){
	
	echo $two*$bond;
}
else if($rate==3){
	
	echo $two*$rand;
}



  
  
  
  ?></td>

</tr>
<?php 
  }
  while ($rows=mysqli_fetch_assoc($resu)) {
  ?>

<td><?php  $_POST['quantity3']='quantity3';echo $quantity3; ?></td>
<td><?php  $_POST['item_name3']='item_name3';echo $item_name3; ?></td>
<td><?php 

 $_POST['quantity3']='quantity3';

 $_POST['rate']='rate';
 $third=$rows['unit_price'];
 
 if($rate==0){
	echo $third;
 }
else if($rate==1){
	echo $third*$rtgs;
}
else if($rate==2){
	
	echo $third*$bond;
}
else if($rate==3){
	
	echo $third*$rand;
}









?></td>
<td><?php  

$_POST['quantity3']='quantity3';
$three=$quantity3*$rows['unit_price']; 




if($rate==0){
	echo $three;
 }
else if($rate==1){
	echo $three*$rtgs;
	
	
	
	
}
else if($rate==2){
	
	echo $three*$bond;
}
else if($rate==3){
	
	echo $three*$rand;
}



?></td>


</tr>
<?php 
  }
  while ($rows=mysqli_fetch_assoc($res)) {
  ?>
<td><?php  $_POST['quantity4']='quantity4';echo $quantity4; ?></td>
<td><?php  $_POST['item_name4']='item_name4';echo $item_name4; ?></td>
<td><?php
  $_POST['quantity4']='quantity4';
  
  
 $_POST['rate']='rate';
 $fourth=$rows['unit_price'];
 
 if($rate==0){
	echo $fourth;
 }
else if($rate==1){
	echo $fourth*$rtgs;
}
else if($rate==2){
	
	echo $fourth*$bond;
}
else if($rate==3){
	
	echo $fourth*$rand;
}




 ?></td>
<td><?php  $_POST['quantity4']='quantity4';

$four=$quantity4*$rows['unit_price']; 




if($rate==0){
	echo $four;
 }
else if($rate==1){
	echo $four*$rtgs;
}
else if($rate==2){
	
	echo $four*$bond;
}
else if($rate==3){
	
	echo $four*$rand;
}




?></td>


</tr>
<?php 
  }
  while ($rows=mysqli_fetch_assoc($re)) {
  ?>
<td><?php  $_POST['quantity5']='quantity5';echo $quantity5; ?></td>
<td><?php  $_POST['item_name5']='item_name5';echo $item_name5; ?></td>
<td><?php  
$_POST['quantity']='quantity';

$_POST['rate']='rate';
 $fifth=$rows['unit_price'];
 
 if($rate==0){
	echo $fifth;
 }
else if($rate==1){
	echo $fifth*$rtgs;
}
else if($rate==2){
	
	echo $fifth*$bond;
}
else if($rate==3){
	
	echo $fifth*$rand;
}

 ?></td>
<td><?php  $_POST['quantity']='quantity';
$five=$quantity5*$rows['unit_price'];



if($rate==0){
	echo $five;
 }
else if($rate==1){
	echo $five*$rtgs;
}
else if($rate==2){
	
	echo $five*$bond;
}
else if($rate==3){
	
	echo $five*$rand;
}



 ?></td>


</tr>

<?php
  }
}
?>
<tr>
<td style="border:none" ></td>
<td style="border:none"></td>
<td><b>TOTAL</b></td>
<td><?php 
$total=$five+$four+$three+$two+$one;


if($rate==0){
	echo "US$",$total;
	
	 
 }
else if($rate==1){
	echo "RTGS$",$total*$rtgs;
}
else if($rate==2){
	 echo "BOND$",$total*$bond;
}
else if($rate==3){
	 
	echo "ECO$",$total*$rand;
}

  $item_name=mysqli_real_escape_string($db,$_POST['item_name']);
  $item_name2=mysqli_real_escape_string($db,$_POST['item_name2']);
  $item_name3=mysqli_real_escape_string($db,$_POST['item_name3']);
  $item_name4=mysqli_real_escape_string($db,$_POST['item_name4']);
  $item_name5=mysqli_real_escape_string($db,$_POST['item_name5']);

  $quantity7=mysqli_real_escape_string($db,$_POST['quantity7']);
  $quantity2=mysqli_real_escape_string($db,$_POST['quantity2']);
  $quantity3=mysqli_real_escape_string($db,$_POST['quantity3']);
  $quantity4=mysqli_real_escape_string($db,$_POST['quantity4']);
  $quantity5=mysqli_real_escape_string($db,$_POST['quantity5']);
  $Date=mysqli_real_escape_string($db,$_POST['Date']);
  
  



	






?></td>
</tr>
</table>




</body>
</html>
