<?php

$server = "localhost"; 
$user = "root"; 
$pass = ""; 
$database = "kachucom_indoor"; 

//PHP 6
/*$link = mysql_connect($server, $user, $pass);
$link = mysql_connect($server, $user, $pass, );
mysql_set_charset('utf8',$link);
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
mysql_select_db($database);*/

//PHP7
$link = mysqli_connect($server, $user, $pass, $database);

?>