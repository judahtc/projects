

<?php
session_start();
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$sql="select * from rate";
$result=mysqli_query($db,$sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="sales_form.cs">
    <title>sales_form</title>
	<style>
table{
text-align: center;
  border: 2px solid navy;
background-color:gray;
  border-collapse: collapse;
  width: 60%;


}

table th{
  border: 1px solid;
  margin: 0;
  padding: 5px;
  border-radius: 3px;
}

table td{
  border-radius: 4px;
  border-bottom: 1px solid;
border-right: 1px solid;

  margin: 0;
  padding: 4px;
}
	</style>
  </head>
  <body >
  <center>
  <table>
  <TR>
  <th>USD</TH>
  <th>ECOCASH</TH>
  <th>RTGS</th>
  <th>BOND</TH>
  
  </TR>
  <?php
  $db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");
$sql="select * from rate";
$result=mysqli_query($db,$sql);


  while($rows=mysqli_fetch_assoc($result)){
	  
	  ?>
  <tr>
  <td>1</td>
  <td><?php echo$rows['rand'] ?></td>
  <td><?php echo$rows['rtgs'] ?></td>
  <td><?php echo$rows['bond'] ?></td>
  
  </tr>
  <?php
  }
  ?>
  
  </table>
  
  </center>
  </body>
  </html>