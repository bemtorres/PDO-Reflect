<?php 

// if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once ("./DB/DB.php");


// Carpetas a utilizar
function Rutador($carpeta){
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
}

function Execute($query){
    $cc = DB::getInstancia();   
    $rs = $cc->db->prepare($query);
    $rs->execute();
    $c = $rs->fetchAll();         
    return $c;
}

function ShowTables(){
    $stSql = "show tables;";
    return Execute($stSql);    
}

function DescribeTables($tabla){
    $stSql = "describe $tabla;";
    return Execute($stSql);    
}

// Crea las clases con el nombre de la tabla
function CreateClass($nombre,$columnas,$ruta){
    $nombre = ucwords($nombre);
    $tab = '    ';

    $file = fopen("$ruta/$nombre.php", "w");
    $txt = "<?php \n";
    $txt .= "class $nombre {\n"; 
    foreach ($columnas as $col) {
        $txt .= $tab."private $$col[0]; \n";
    }
    // Constructor
    $txt .= "\n" . $tab . "function __construct(";
    foreach ($columnas as $col) {
        $txt .= "$$col[0],";        
    }
    $txt .= "){\n";
    foreach ($columnas as $col) {
        $txt .= "$tab$tab\$this->$col[0]=$$col[0];\n";
    }
    $txt .= "$tab}\n\n";
    //Accesadores
    foreach ($columnas as $col) {
        $txt .= $tab . "function get" . ucwords($col[0])."(){\n";
        $txt .= $tab . $tab . "return \$this->$col[0];\n";
        $txt .= "$tab}\n\n";
    }
    
    //Mutadores
    foreach ($columnas as $col) {
        $txt .= $tab . "function set" . ucwords($col[0]) ."($$col[0]){\n";
        $txt .= $tab . $tab . '$this->'.$col[0].'=$'.$col[0].";\n";
        $txt .= "$tab}\n\n";
    }

    //ToString
    $txt .= $tab . "function __toString(){\n";
    $txt .= $tab . $tab . "return print_r(\$this,true);\n";
    $txt .= "$tab}\n";

    $txt .= '}';
    fwrite($file, $txt);
    fclose($file);
}
// Crea las DAO
function CreateDAO($nombre,$columnas,$ruta,$ruta_modelo){
    $nombre = ucwords($nombre);
    $tab = '    ';

    $file = fopen("$ruta/$nombre"."DAO.php", "w");
    $txt = "<?php \n";
    $txt .= "require_once(\"./DB/DB.php\");\n"; 
    $txt .= "require_once(\"./$ruta_modelo/$nombre.php\");\n"; 
    $txt .= "class $nombre"."DAO {\n";     
    $txt .= '}';
    fwrite($file, $txt);
    fclose($file);
}


// RUN

// Rutas de las carpetas
$RUTA_MODELO="Modelo";
$RUTA_DAO="DAO";
Rutador($RUTA_MODELO);
Rutador($RUTA_DAO);

$tablas = ShowTables(); //Obtiene todas las tablas
foreach ($tablas as $tabla) {    
    // echo $tabla[0] . "<br>"; //Imprime todas  
    $columnas = DescribeTables($tabla[0]); // todas las columnas   
    CreateClass($tabla[0],$columnas,$RUTA_MODELO);
    //todos los atributos de la base datos
    // foreach ($columnas as $col) { 
    CreateDAO($tabla[0],$columnas,$RUTA_DAO,$RUTA_MODELO);
    //     echo $col[0] . "<br>";        
    // }   
   
}


