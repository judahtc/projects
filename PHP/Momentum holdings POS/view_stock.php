<?php

$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$sql="select * from items";
$result=mysqli_query($db,$sql);


?>
<!doctype html>
<html>
<head>

<style>
table td{
	border-bottom:1px solid;
	border-radius:2px;
	border-right:1px solid;
	
	
}

</style>

 <link rel="stylesheet" href="manage_stock.css">
<title>Available Stock</title>
</head>
<body style="background-image:url(back.jpg);background-size:cover;">

 <form method="post" action="out_stock.php">
<button style="background-color:red;margin-top:0;float:left"type="submit">ALERTS!!!</button>

</form>
<div class="error" style="background-color:gray">



 <form method="post" action="#">
 
 <CENTER><h3 style="">BRIAN'S BOLTS & HARDWARE STOCK</H3></CENTER>
 
  <P> <center> <input style="border-radius:2.5px;border-color:pink;border-width:2px;height:1.6em;margin-bottom:0;margin-top:1%" type="text" placeholder="item name/item_id" name="search" size="40"><button style="border-radius:1px;background-color:pink;height:2em" type="submit">search</button></center></p><br>
  <div class="one">
  </form>
  
  
  
  
  
  
  
  <center><table style="width:75%;margin-top:0" >
 
  <?php
  
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
  if(isset($_POST['search'])){
	  
	  
	  
$search=mysqli_real_escape_string($db,$_POST['search']);



$sq="select * from items where item_name='".$search."' or item_id='".$search."'   ";

$resul=mysqli_query($db,$sq); 
  while($rows=mysqli_fetch_assoc($resul))
  { 
  ?>
  <tr style="border-radius:0;">
  <td style="border-radius:0;border-color:hotpink;color:white"><?php echo $rows['item_id']?></td>
	<td style="border-radius:0;border-color:hotpink;color:white"><?php echo $rows['item_name']?></td>
<td style="border-radius:0;border-color:hotpink;color:white"><?php echo $rows['unit_price'];?></td>
<td style="border-radius:0;border-color:hotpink;color:white"><?php echo $rows['quantity'];?></td>
<td style="border-radius:0;border-color:hotpink;color:white"></td>

</tr>
  <?php
  }
  }
  ?>
 </table ></center>
  
  
  
  
  
  
  
  
  

<center><table style="width:80%;color:white" >
 <tr > 
			<th>  item id </th>
         <th>  item name </th>
		<th>  unit price </th>
		<th> Quantity  </th>
		<th> Shelf No  </th>
		<th> Shelf No  </th>
		
  
  </tr>
  
  <?php
  while($rows=mysqli_fetch_assoc($result))
  
  {?>
  <tr >
	<td  style="color:white"><?php echo $rows['item_id']?></td>
	<td style="color:white"><?php echo $rows['item_name']?></td>
<td style="color:white"><?php echo $rows['unit_price'];?></td>
<td style="color:white"><?php echo $rows['quantity'];?></td>
<td style="color:white"><a style="color:white" href="edit1.php?item_id=<?php echo $rows['item_id'];?> ">  edit</a> </td>
<td style="color:white"><a style="color:white" href="delete.php?item_id=<?php echo $rows['item_id'];?>" onclick="confirm()" >delete</a></td>

</tr>

<span style="color:navy;background-color:red"><?php

  }
  ?>
  </span>
  
  
  
  </table></center>
  <br>
 
  
</div>

</body>
</html>