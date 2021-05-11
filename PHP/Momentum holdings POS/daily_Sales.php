

<?php
session_start();

$item_name="";

$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");

if(isset($_POST['item_name'])){

}else{
	$ta="select * from daily_sales";
	$ja=mysqli_query($db,$ta);
}







session_destroy();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=0.0">

<link href="css1/bootstrap.min.css" rel="stylesheet">
  <style>
table tr{
	line-height:2px;
	min-height:2px;
height:2px;

}

</style>


  <title>daily sales</title>
  </head>
<body>
<hr>
</hr>

  <CENTER><h3 style="color:navy">SALES REPORT</H3><hr>
</hr>
  </CENTER>


<center><div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" style="width:80%">
						<thead>

   <tr >
		<CENTER> <th style="text-align:center;">index </th></CENTER>
		<CENTER> <th style="text-align:center;"> date </th></CENTER>
		<CENTER><th style="text-align:center;">  items </th></CENTER>
		<CENTER><th style="text-align:center;"> quantities  </th></CENTER>
		<CENTER><th style="text-align:center;"> TOTAL(US$)  </th></CENTER>
		<CENTER><th style="text-align:center;">   </th></CENTER>

  </tr>
  </thead>
  <tbody>
  <?php

  $ta="select * from daily_sales";
	$ja=mysqli_query($db,$ta);

$i=0;
 while($rows=mysqli_fetch_assoc($ja))
  {
			$i++;
  ?>
  <tr>
	  <td><?php  echo $i;   ?></td>
		<td><?php echo $rows['date']; echo "||"; echo $rows['time'];?></td>
    <td><?php echo $rows['item_name']," | ",$rows['item_name2'],"  | ",$rows['item_name3'],"  |  ",$rows['item_name4'],"  | ",$rows['item_name5'];?></td>
    <td><?php echo $rows['quantity7']," | ",$rows['quantity2']," | ",$rows['quantity3']," | ",$rows['quantity4']," | ",$rows['quantity5'];?></td>
    <td style="text-align:center;"><?php  echo "$ ",$rows['total']; ?></td>
		<td><a href="clearSales.php?sales_id=<?php echo $rows['sales_id'];  ?>">delete</td>
  <?php

  }
  ?>


   <?php
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");

$jaya="SELECT SUM(total) AS malah FROM daily_sales";
$jay=mysqli_query($db,$jaya);

$rows=mysqli_fetch_assoc($jay);

 $malah=$rows['malah'];

   ?>

   <tr>
		 <td><b>TOTAL</b></td>
   <td></td>
   <td></td>
	 <td></td>
	 

   <td style="text-align:center;color:red"><b><?php echo "$ " ,$malah?></b></td>
<td></td>

   </tr>

  </tbody>
   </table ></center>
   </div>

<hr>
</hr>

<button style="height:25px;float:right" type="submit" name="print" onclick="window.print()">print</button>

<CENTER><a href="clear.php" target="clear"style="font-weight:bolder;border:1px dashed teal;padding:4px;border-radius:3px;background-color:gainsboro" >CLEAR DAILY SALES</a></CENTER><br>
<iframe src="" width="100%" name="clear"></iframe>
</body>
</html>
