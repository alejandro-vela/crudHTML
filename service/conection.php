<?php 

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "CLIENTS";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
// if(mysqli_connect_errno()){
// 	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
// }else{
//     echo 'Si conecto';
// }
?>