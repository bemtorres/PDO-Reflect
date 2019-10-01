<?php 

class Configuracion{

    private $nombreArchivo = "../config";
    
    function configuracion(){
        $archivo = fopen($this->nombreArchivo, "r");
        $texto = array();
        while(!feof($archivo)) {
            $linea = fgets($archivo);
            $contenido = explode("=",$linea);
            if(isset($contenido[1])){
                $contenido[1] = trim($contenido[1]);
                $texto[$contenido[0]]=$contenido[1];
            }else{
                $texto[$contenido[0]]="";
            }
        }
        fclose($archivo);
        return $texto;
    }

}


?>