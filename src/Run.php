<?php 

require_once ("Reflect.php");

// 0 Configuracion PDO
$config = array();
$config[0] ='localhost';  //Host
$config[1] ='root';       //Usuario
$config[2] ='';           //Contraseña
$config[3] ='prueba_citt';//Nombre Base de Datos
Reflect($config);
?>