<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

define('DB_HOST', 'pkts-ggsn-52.146.econet.co.zw');
define('DB_USER', 'helpdesk2');
define('DB_PASS', 'help@2020M#');
define('DB_NAME', '');

function connect()
{
 $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);
 if (mysqli_connect_errno($connect)) {
 die("Failed to connect:" . mysqli_connect_error());
 }
 mysqli_set_charset($connect, "utf8");
 echo "connected";
 return $connect;
}
$con = connect();

?>