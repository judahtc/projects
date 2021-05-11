

<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'voters');
$connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);
$id=$_GET['id'];



$sql1="select * from users where id={$id} LIMIT 1" ;
$users = [];

$result=mysqli_query($connect,$sql1);

$rows=mysqli_fetch_assoc($result);



echo $json = json_encode($rows);

exit;

?>