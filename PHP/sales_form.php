<?php
	session_start();
	extract($_POST);

$_session['item_name']='item_name';
$db=mysqli_connect('localhost','root','','pharmacy')or die("could not conect to the database");
$d=mysqli_connect('localhost','root','','pharmacy')or die("could not conect to the database");
if(isset($_Post['quantity'])){





}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="sales_form.css">
    <title>sales_form</title>
  </head>
  <body >
    <p style="font-size:80%;padding:0;margin:0;border:1px solid;border-color:gray;color:gray">contact us on:<i>(+263) 772 286 333||email:judahanesu@gmail.com||www.brian.co.zw|</i></p>
    <div class="all">
    <div class="zero">
<CENTER><h3 style="margin-top:0">BRIAN'S BOLTS & HARDWARE</H3><CENTER>
</div>


<div class="one">
    <p style="display:flex"><b>customer name</b> : <?php $_session['client_name']='client_name'; echo $client_name;     ?></p>
    <p style="display:flex"><b>Date of birth</b>: <?php $_session['dob']='dob'; echo $dob;?></p>
</div>


<table>
  <tr>
<th>item name</th>
<th>quantity</th>
<th>unit price($US)</th>
<th>total price($US)</th>
<th>Man Date</th>
<th>Exp Date</th>
  </tr>
  <?php
  if(isset($_POST["item_name"]))
{
	$item_name=$_POST['item_name'];
  $sql="select * from items where item_name='".$item_name."'";
  $result=mysqli_query($db,$sql);
  $qua=$_POST['quantity'];





  $item_name=mysqli_real_escape_string($db,$_POST['item_name']);

  $quantity=mysqli_real_escape_string($db,$_POST['quantity']);

  $client_name=mysqli_real_escape_string($db,$_POST['client_name']);

  $dob=mysqli_real_escape_string($db,$_POST['dob']);

  $Pharmacist=mysqli_real_escape_string($db,$_POST['Pharmacist']);

  $Date=mysqli_real_escape_string($db,$_POST['Date']);







  while ($rows=mysqli_fetch_assoc($result)) {

    if($qua>$rows['quantity']){
      echo "<script>alert('sorry the item is out of stock,check nect time')</script>";
      break;
    }
else {

  ?>

<tr >
<td><?php echo $rows['item_name']?></td>
<td><?php echo $quantity," packet(s)"?></td>
<td><?php echo $rows['item_price']?></td>
<td><?php echo $rows['item_price']*$quantity?></td>
<td><?php echo $rows['man_date']?></td>
<td><?php echo $rows['exp_date']?></td>

</tr>
<?php
$tatenda=("UPDATE items SET quantity=quantity-'$qua' where item_name='$item_name'");
$juloh=mysqli_query($db,$sqli);

$query="INSERT INTO clients(item_name,quantity,client_name,dob,Pharmacist,Date) values('$item_name','$quantity','$client_name','$dob','$Pharmacist','$Date')";
$rty=mysqli_query($db,$query);

$_SESSION['item_name']=$item_name;
session_destroy();
}}}
 ?>


</table>
<p><B><i>Description</B>:<span style="color:RED"><?php  $_session['Description']='Description';echo $Description; ?></i></span></p>
<p><B><i>Date</B>:<span style="color:gray"><?php  $_session['Date']='Date';echo $Date; ?></i></span></p>
<br><br>

<h2 style="font-size:200%;text-align:center;color:red;margi-top:0">
<?php
$sql="select * from items where item_name='".$item_name."'";
$resul=mysqli_query($db,$sql);
$_session['quantity']='quantity';
while($rows=mysqli_fetch_assoc($resul)){

  if($quantity>$rows['quantity']){
    echo "purchase failure,item out of stock!!!!";



  }


}



?>
</h2>



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


<p><B><i>Pharmacist name</B>:<span style="color:navy"><?php  $_session['Pharmacist']='Pharmacist';echo $Pharmacist; ?></i></span></p>
<p><B>Pharmacist sign:..............</p>
<form method="post" action="">
<center>  <button type="" name="print">print</button></Center>
</form>
</div>
  </body>
</html>
