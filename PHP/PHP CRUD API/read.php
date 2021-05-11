

<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'voters');
$connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

$sql="select * from users";
$v="ah";
$sql1="select * from users";
$users = [];

if($result=mysqli_query($connect,$sql1)){
$i=0;
while($rows=mysqli_fetch_assoc($result)){


        $users[$i]['username']=$rows['name'];
        $users[$i]['password']=$rows['surname'];
        $users[$i]['id']=$rows['id'];
        $i++;
       
}
echo json_encode($users);

}else 
{
http_response_code(404);

}
?>
