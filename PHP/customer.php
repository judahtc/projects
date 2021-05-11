
<?php
session_start();

$item_name="";

$db=mysqli_connect('localhost','root','','pharmacy')or die("could not conect to the database");

if(isset($_POST['client_name'])){

}else{
	$ta="select * from clients";
	$ja=mysqli_query($db,$ta);
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
<style>
table td{
	border-bottom:1px solid;
	border-radius:2px;
	border-right:1px solid;
	
	
}

</style>
  
    <meta charset="utf-8">
    <title>Brian|hardware.clients_records.com</title>

    <link rel="stylesheet" href="manage_stock.css">

  </head>
  <body>
  <div class="all">
  <CENTER><h3>BRIAN'S BOLTS & HARDWARE CLIENTS</H3></CENTER>
  <form method="post" action="#">
  <P> <center> <input style="border-radius:2.5px;border-color:pink;border-width:2px" type="text" placeholder="client name" name="search"><button style="border-radius:1px;background-color:pink;height:1.7em" type="submit">search</button></center></p><br>
  <div class="one">
  </form>
  
  <center><table style="border:1px solid ;width:94%;border-radius:0;border-color:hotpink" >
 
  <?php
  
$db=mysqli_connect('localhost','root','','pharmacy')or die("could not conect to the database");
  if(isset($_POST['search'])){
	  
	  
	  
$search=mysqli_real_escape_string($db,$_POST['search']);



$sq="select * from clients where client_name='".$search."' ";

$rizo=mysqli_query($db,$sq); 
  while($rows=mysqli_fetch_assoc($rizo))
  { 
  ?>
  <tr style="border-radius:0;">
	<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['client_name']?></td>
<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['dob'];?></td>
<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['item_name'];?></td>
<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['quantity'];?></td>
<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['Pharmacist'];?></td>
<td style="border-radius:0;border-color:hotpink;color:purple"><?php echo $rows['Date'];?></td>

</tr>
  <?php
  }
  }
  ?>
 </table ></center>
  
  </div>
   </form>
    <center><table style="margin-top:1%" >
  
   <tr > 
           <th> Client Name  </th>
		<th>  DOB </th>
		<th> Item Name  </th>
		<th> quantity  </th>
		<th> Pharmacist  </th>
		<th>  Date </th>

  </tr>
  
  <?php
 while($rows=mysqli_fetch_assoc($ja))
  { 
  ?>
  <tr>
	<td><?php echo $rows['client_name']?></td>
<td><?php echo $rows['dob'];?></td>
<td><?php echo $rows['item_name'];?></td>
<td><?php echo $rows['quantity'];?></td>
<td><?php echo $rows['Pharmacist'];?></td>
<td><?php echo $rows['Date'];?></td>

</tr>
  <?php
  }
  ?>
  
   </table ></center>
   
  </div>
  
 </body>
 </html>