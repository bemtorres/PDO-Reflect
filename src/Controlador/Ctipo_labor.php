<?php
session_start();
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once($rootDir . "/DAO/Tipo_laborDAO.php");

if(isset($_POST['opcion'])){
	$opc=htmlspecialchars($_POST['opcion']);
	if($opc=="agregar"){

	}
	elseif($opc=="buscar"){

		if(isset($_POST['id_tipo_labor'])){
			$ID=htmlspecialchars($_POST['id_tipo_labor']);
			$encontrado = Tipo_laborDAO::buscar($ID); 
			print_r($encontrado); 
		}else{
			echo "error";
		}
	}
	elseif($opc=="actualizar"){

	}
	elseif($opc=="eliminar"){

	}
}else{
	echo "error";
}