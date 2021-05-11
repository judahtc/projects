
<?php
session_start();

$item_name="";

$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");

if(isset($_POST['item_name'])){



$item_name=mysqli_real_escape_string($db,$_POST['item_name']);
$unit_price=mysqli_real_escape_string($db,$_POST['unit_price']);
$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
$buying_price=mysqli_real_escape_string($db,$_POST['buying_price']);
/*$item_type=mysqli_real_escape_string($db,$_POST['item_type']);
$supplier_id=mysqli_real_escape_string($db,$_POST['supplier_id']);
$man_date=mysqli_real_escape_string($db,$_POST['man_date']);
$exp_date=mysqli_real_escape_string($db,$_POST['exp_date']);
$exp_date=mysqli_real_escape_string($db,$_POST['exp_date']);*/



$sql="insert into items(item_name,unit_price,quantity,buying_price) values('$item_name','$unit_price','$quantity',$buying_price)";
mysqli_query($db,$sql);

$_SESSION['item_name']=$item_name;

}

session_destroy();
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add stock</title>

    <link rel="stylesheet" href="manage_stock.css">

  </head>
  <body>
  <div class="all">
  <CENTER><h3>BRIAN'S BOLTS & HARDWARE</H3></CENTER>
  <form method="post" action="#">
  <P> <center> <input type="text" name="search" value=""><button type="submit">search</button></center></p><br>
  <div class="one">
  </form>

  <form method="post" action="#">
 <p> <span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">item name</span>:<input type="text" name="item_name">						<span style="margin-left:150px"><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">item type</span>:<input type="text" name="item_type"></span></p>
  <p><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white;margin-right:8px">unit price</span>:<input type="text" name="unit_price">					<span style="margin-left:150px"><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">supplier id</span>:<input type="text" name="supplier_id"></span></p>
  <p><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white;margin-right:10px">Quantity</span>:<input type="text" name="quantity">						<span style="margin-left:150px"><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">Man Date</span>:<input style="margin-left:20px;padding-left:5px" type="text" name="man_date"></span></p>
  <p><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">Buying Price</span>:<input type="text" name="buying_price">						<span style="margin-left:150px"><span style="border:1px solid;padding:4px;background-color:#f0f8ff;border-color:white">Exp Date</span>:<input type="text" name="exp_date"></span></p>
  </div>

  <div class="two">
  <button type="submit" name="btnAdd">ADD</button>  </form>  <form method="post" action="#"><button type="submit" name="delete">DEL</button>


  </form>

  <form method="post" action="edit.php"><button type="submit" name="edit">UPDATE</button></form> <button type="submit" name="">UNDO</button>
  </div>


  </div><br><br>
  <div class="all_two">

  <center><table style="width:50%"  >
 <tr >
		<th>  item id </th>
         <th>  item name </th>
		<th>  unit price($US) </th>
    <th>  unit price($RTGS) </th>
		<th> Quantity  </th>
		<th> Shelf No  </th>
		

  </tr>
  <?php

$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
  if(isset($_POST['search'])){


$sqa="select * from rate";
$dah=mysqli_query($db,$sqa);
while($rows=mysqli_fetch_assoc($dah))
  {
	$mult=$rows['rtgs'];
  }


$search=mysqli_real_escape_string($db,$_POST['search']);



$sq="select * from items where item_name='".$search."' ";

$rizo=mysqli_query($db,$sq);


  while($rows=mysqli_fetch_assoc($rizo))
  {
  ?>
  <tr>
  <td><?php echo $rows['item_id']?></td>
	<td><?php echo $rows['item_name']?></td>
<td><?php echo $rows['unit_price'];?></td>
<td><?php 

echo $rows['unit_price']*$mult;?></td>
<td><?php echo $rows['quantity'];?></td>
<td></td>

</tr>
  <?php
  }
  }
  ?>



  </table></center>



  </div>

  </body>
  </html>
