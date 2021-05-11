<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>

<?php
$db=mysqli_connect('localhost','root','','brian')or die("could not conect to the database");

$clear="delete FROM daily_sales";
$delete=mysqli_query($db,$clear);



    ?>
    
    <p style="color:red;font-weight:bold;text-align:center">DAILY SALES HAVE BEEN SUCCESSFULLY DELETED</p>

</form>

</body>
</html>
