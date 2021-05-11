

<?php

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'voters');
$connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);
$id =$_GET['id'];
$sql="delete from users where id='{$id}'";

if($result=mysqli_query($connect,$sql)){
    http_response_code(204);
}
else 
{
http_response_code(404);

}