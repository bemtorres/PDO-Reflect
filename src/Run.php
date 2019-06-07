<?php 

require_once("Reflect.php");

// 0 Configuracion PDO mysql y sqlserver
$config = array();
$config[0] ='www.cittsb.cl';  //Host
$config[1] ='benjamin';       //Usuario
$config[2] ='benja';           //Contraseña
$config[3] ='duoc';//Nombre Base de Datos
Reflect($config);
?>