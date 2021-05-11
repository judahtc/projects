<?php

$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$sql="select * from items where quantity<100";

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
<title>Items almost out of Stock</title>
</head>
<body style="background-image:url(back.jpg);background-size:cover;">

<center><h3 style="color:red">Note that the following items are almost out of stock!!!</h3></center>


<center><table style="width:80%;color:navy" >
 <tr > 
         <th>  item id</th>
         <th>  item name </th>
		<th>  unit price </th>
		<th> Quantity  </th>
		<th> Shelf No  </th>
		
  
  </tr>
  
  <?php
  while($rows=mysqli_fetch_assoc($result))
  
  {?>
  <tr>
	<td><?php echo $rows['item_id']?></td>
	<td><?php echo $rows['item_name']?></td>
<td><?php echo $rows['unit_price'];?></td>
<td><?php echo $rows['quantity'];?></td>
<td></td>

</tr>
<?php

  }
  ?>

  
  
  
  </table></center>
  
  

</body>
</html>