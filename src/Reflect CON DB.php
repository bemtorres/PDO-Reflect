<?php 

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once ($rootDir . "/DB/DB.php");


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
    
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        $txt .= "$$col[0]";     
        if($cont!=$total){
            $txt .=",";
            $cont +=1;
        }   
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
    $nombre_base = $nombre;
    $nombre = ucwords($nombre);
    $tab = '    ';

    $file = fopen("$ruta/$nombre"."DAO.php", "w");
    $txt = "<?php \n";
    $txt .= "require_once(\"./DB/DB.php\");\n"; 
    $txt .= "require_once(\"./$ruta_modelo/$nombre.php\");\n"; 
    $txt .= "class $nombre"."DAO {\n";     
    
    // CRUD

    //CREAR
    $txt .= $tab . "public static function agregar(\$nuevo) {\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"INSERT INTO $nombre_base (";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        $txt .= $col[0];     
        if($cont!=$total){
            $txt .=",";
            $cont +=1;
        }   
    }
    $txt .= ") VALUES(";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        $txt .= ":$col[0]";     
        if($cont!=$total){
            $txt .=",";
            $cont +=1;
        }   
    }     
    $txt .= ")\";\n";   
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n" ; 
    $txt .= $tab . $tab . "\$params = self::getParams(\$nuevo);\n"; 
    $txt .= $tab . $tab . "return \$rs->execute(\$params);\n"; 
    $txt .= $tab . "}\n";

    //CREATE AUTOINCREMENTO
    $txt .= $tab . "public static function agregarAuto(\$nuevo) {\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"INSERT INTO $nombre_base (";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        if($cont==1){
            $cont +=1;
            continue;
        }else{
            $txt .= $col[0];     
            if($cont!=$total){
                $txt .=",";
                $cont +=1;
            } 
        }             
    }
    $txt .= ") VALUES(";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        if($cont==1){
            $cont +=1;
            continue;
        }else{
            $txt .= $col[0];     
            if($cont!=$total){
                $txt .=",";
                $cont +=1;
            } 
        }  
    }     
    $txt .= ")\";\n";   
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n" ; 
    $txt .= $tab . $tab . "\$params = self::getParamsAuto(\$nuevo);\n"; 
    $txt .= $tab . $tab . "return \$rs->execute(\$params);\n"; 
    $txt .= $tab . "}\n";

    //READ por el primer elemento
    $txt .= $tab . "public static function buscar(\$id) {\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"SELECT * FROM $nombre_base WHERE " . $columnas[0][0]. "=:" . $columnas[0][0] . "\";\n";
    $txt .= $tab . $tab ."\$rs = \$cc->db->prepare(\$stSql);\n";
    $txt .= $tab . $tab ."\$rs->execute(array('" . $columnas[0][0] . "' => \$id));\n";
    $txt .= $tab . $tab ."\$ba = \$rs->fetch();\n";
    $txt .= $tab . $tab ."\$nuevo = new $nombre(";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        $txt .= "\$ba['".$col[0]."']";     
        if($cont!=$total){
            $txt .=",";
            $cont +=1;
        }   
    }
    $txt .= ");\n";
    $txt .= $tab . $tab . "return \$nuevo; \n"; 
    $txt .= $tab . "}\n";

    //UPDATE
    $txt .= $tab . "public static function actualizar(\$nuevo) {\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"UPDATE $nombre_base SET ";
    $total = count($columnas);
    $cont = 1;
    $primero;
    foreach ($columnas as $col) {
        if($cont==1){
            $primero = $col;
            $cont +=1;
            continue;
        }else{
            $txt .= $col[0] . "=:" . $col[0];     
            if($cont!=$total){
                $txt .=",";
                $cont +=1;
            } 
        }  
    }   
    $txt .= " WHERE $primero[0]=:$primero[0]\";\n";
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n";
    $txt .= $tab . $tab . "\$params = self::getParams(\$nuevo);\n";
    $txt .= $tab . $tab . "return \$rs->execute(\$params);\n";
    $txt .= $tab . "}\n";
        
    //DELETE
    $txt .= $tab . "public static function eliminar(\$nuevo){\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"DELETE FROM $nombre_base WHERE ". $columnas[0][0] . "=:" . $columnas[0][0] . "\";\n";
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n";
    $txt .= $tab . $tab . "return \$rs->execute(array('". $columnas[0][0] . "'=>\$nuevo->get". ucwords($columnas[0][0]) . "()));\n";
    $txt .= $tab . "}\n";  


    //ALL
    $txt .= $tab . "public static function buscarAll() {\n";
    $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"SELECT * FROM $nombre_base \";\n";
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n";
    $txt .= $tab . $tab . "\$rs->execute();\n";
    $txt .= $tab . $tab . "\$c = \$rs->fetchAll();\n";
    $txt .= $tab . $tab . "\$pila = array();\n";
    $txt .= $tab . $tab . "foreach (\$c as \$ba) {\n";
    $txt .= $tab . $tab . $tab ."\$nuevo = new $nombre(";
    $total = count($columnas);
    $cont = 1;
    foreach ($columnas as $col) {
        $txt .= "\$ba['".$col[0]."']";     
        if($cont!=$total){
            $txt .=",";
            $cont +=1;
        }   
    }
    $txt .= ");\n";
    $txt .= $tab . $tab . $tab . "array_push(\$pila, \$nuevo);\n";
    $txt .= $tab . $tab . "}\n";
    $txt .= $tab . $tab . "return \$pila; \n"; 
    $txt .= $tab . "}\n";     

    //total
    $txt .= $tab . "public static function contador() {\n";
        $txt .= $tab . $tab . "\$cc=DB::getInstancia();\n";   
        $txt .= $tab . $tab . "\$stSql = \"SELECT * FROM $nombre_base\";\n";
        $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n";
        $txt .= $tab . $tab . "\$rs->execute();\n";
        $txt .= $tab . $tab . "\$cont = count(\$rs->fetchAll());\n";
        $txt .= $tab . $tab . "return \$cont; \n"; 
        $txt .= $tab . "}\n";   
    
    // Configuracion Params       
    //normal params 
    $txt .= $tab . "public static function getParams(\$nuevo){\n";
    $txt .= $tab . $tab . "\$params = array();\n"; 
    foreach ($columnas as $col) {
        $txt .= $tab . $tab . "\$params['$col[0]'] = \$nuevo->get" . ucwords($col[0]) . "();\n";
    }
    $txt .= $tab . $tab . "return \$params;\n";  
    $txt .= $tab . "}\n";    

    //Autoincrement params
    $txt .= $tab . "public static function getParamsAuto(\$nuevo){\n";
        $txt .= $tab . $tab . "\$params = array();\n"; 
        $cont = 1;
        foreach ($columnas as $col) {
            if($cont!=1){
                $txt .= $tab . $tab . "\$params['$col[0]'] = \$nuevo->get" . ucwords($col[0]) . "();\n";
            }
            $cont +=1;
        }
        $txt .= $tab . $tab . "return \$params;\n";  
        $txt .= $tab . "}\n";    
    
    $txt .= '}';
    fwrite($file, $txt);
    fclose($file);
}
function TipoDatos($col){
    $isNull="SI";
    if($col[2]=="NO"){
        $isNull="NO";
    }

    if(preg_match("/varchar/",$col[1])){
        echo "TIPO Varchar <br>";
        $resultado =preg_replace("/[^0-9]/", "", $col[1]);
        echo "maximo " . $resultado . "<br>";
    }
    elseif(preg_match("/int/",$col[1])){
        echo "Tipo INT <br>";
        $resultado =preg_replace("/[^0-9]/", "", $col[1]);
        echo "maximo " . $resultado . "<br>";
        
    }
    elseif(preg_match("/datetime/",$col[1])){
        echo "Tipo datetime <br>";            
    }
    elseif(preg_match("/time/",$col[1])){
        echo "Tipo time <br>";            
    }
    elseif(preg_match("/date/",$col[1])){
        echo "Tipo date <br>";            
    }
    elseif(preg_match("/decimal/",$col[1])){
        echo "Tipo decimal <br>";            
    }

    echo "Es null : " . $isNull;
    echo "<br>";
}


// RUN

// Rutas de las carpetas
$RUTA_MODELO="Modelo";
$RUTA_DAO="DAO";
//Creador de Carpetas
Rutador($RUTA_MODELO);
Rutador($RUTA_DAO);

$tablas = ShowTables(); //Obtiene todas las tablas
foreach ($tablas as $tabla) {    
    // echo $tabla[0] . "<br>"; //Imprime todas  
    $columnas = DescribeTables($tabla[0]); // todas las columnas  
    
    //Crear Modelo
    CreateClass($tabla[0],$columnas,$RUTA_MODELO);

    //Crear DAO
    CreateDAO($tabla[0],$columnas,$RUTA_DAO,$RUTA_MODELO);

    //todos los atributos de la base datos
    foreach ($columnas as $col) { 
        // echo $col[0] . "  <br>";      
        echo " " . $col[0] . "    :  ". $col[1] . "    :  ". $col[2] .  "    :  ". $col[3] ." : " . $col[5] ." <br>";          
        TipoDatos($col);       
        echo "<br>";
    }  
}


$RUTA_VIEW="View"; //vista formulario simple
Rutador($RUTA_VIEW);

$RUTA_CONTROLADORES="Contralador"; //controladores a full
Rutador($RUTA_CONTROLADORES);




// <input type="text" >






?>