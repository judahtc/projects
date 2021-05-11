

<?php

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'voters');
$connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
$request=json_decode($postdata);  

$id=mysqli_real_escape_string($connect,(int)$_GET['id']);
$name=mysqli_real_escape_string($connect,trim($request->name));
$surname=mysqli_real_escape_string($connect,trim($request->surname));
    $sql="UPDATE users SET  name='$name', surname='$surname' where id='$id' LIMIT 1"; 

if(mysqli_query($connect,$sql))
{
http_response_code(204);
}
else 
{
http_response_code(404);

}
}

