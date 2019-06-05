<?php 

require_once("../DAO/ModeloDAO.php");

if(isset($_POST['opcion'])){
    $opc = htmlspecialchars($_POST['opcion']);
    if($opc=="agregar"){

        $nuevo = new Modelo($atributos);
        $estado = ModeloDAO::agregarAuto($nuevo);
        print_r($estado);
    }
    elseif($opc=="buscar"){
        if(isset($_POST[''])){
            $ID=htmlspecialchars($_POST['']); 
            $encontrado = ModeloDAO::buscar($ID);
            print_r($encontrado);
        }else{
            echo "error";
        }
    }
    elseif($opc=="actualizar"){

    }
    elseif($opc=="eliminar"){
        if(isset($_POST[''])){
            $ID=htmlspecialchars($_POST['']); 
            $encontrado = ModeloDAO::eliminar($ID);
            print_r($encontrado);
        }else{
            echo "error";
        }
    }

}else{
    echo "error";
}


?>