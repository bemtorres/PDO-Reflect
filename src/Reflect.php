<?php 

//SOLO UN ARCHIVO


// Carpetas a utilizar
function Rutador($carpeta){
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
}

function Execute($query,$RUTA_BD,$NOMBRE_CLASE_BD){  
    try {
        require_once ($RUTA_BD."/".$NOMBRE_CLASE_BD.".php");
        $cc = $NOMBRE_CLASE_BD::getInstancia();   
        $rs = $cc->db->prepare($query);
        $rs->execute();
        $c = $rs->fetchAll();         
        return $c;
    } catch (\Throwable $th) {
        echo $th;
    }  
  
}


function ShowTables($RUTA_BD,$NOMBRE_CLASE_BD){
    $stSql = "show tables;";
    return Execute($stSql,$RUTA_BD,$NOMBRE_CLASE_BD);    
}

function DescribeTables($tabla,$RUTA_BD,$NOMBRE_CLASE_BD){
    $stSql = "describe $tabla;";
    return Execute($stSql,$RUTA_BD,$NOMBRE_CLASE_BD);    
}

//crea el modelo de base dedatos
function CreateConect($nombre,$ruta,$config){
    $tab = '    ';
    $file = fopen("$ruta/$nombre.php", "w");
    $txt = "<?php \n";
    $txt .= "class $nombre {\n"; 
    $txt .= $tab."public \$db;\n";
    $txt .= $tab."private static \$stHost='$config[0]';\n";
    $txt .= $tab."private static \$stUsuario='$config[1]';\n";
    $txt .= $tab."private static \$stClave='$config[2]';\n";
    $txt .= $tab."private static \$stBd='$config[3]';\n";
    $txt .= $tab."private static \$instancia;\n\n";
    $txt .= $tab."public function __construct(){\n";
    $txt .= $tab.$tab."\$this->db = new PDO(\"mysql:host=\" . self::\$stHost . \";dbname=\" .self::\$stBd,self::\$stUsuario,self::\$stClave, array(PDO::MYSQL_ATTR_INIT_COMMAND => \"SET NAMES utf8\"));\n";
    $txt .= $tab."}\n\n";
    $txt .= $tab."public static function getInstancia(){\n";
    $txt .= $tab.$tab."if($nombre::\$instancia === null){\n";
    $txt .= $tab.$tab.$tab."$nombre::\$instancia = new $nombre();\n";
    $txt .= $tab.$tab."}\n";
    $txt .= $tab.$tab."return self::\$instancia;\n";
    $txt .= $tab."}\n";
    $txt .= "}\n";
    fwrite($file, $txt);
    fclose($file);
}

// Crea las clases con el nombre de la tabla
function CreateClass($nombre,$columnas,$ruta){
    $nombre = ucwords($nombre);
    $tab = '    ';
    $file = fopen("$ruta/$nombre.php", "w");
    $txt = "<?php \n";
    $txt .= "class $nombre {\n"; 

    foreach ($columnas as $col) {
        $txt .= $tab."private $$col[0]; //".TipoDatosPrint($col) . "\n";
    }
    // Constructor
    $txt .= "\n".$tab."function __construct(";
    
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
function CreateDAO($nombre,$columnas,$ruta,$ruta_modelo,$RUTA_BD,$NOMBRE_CLASE_BD){
    $DB=$NOMBRE_CLASE_BD;
    $nombre_base = $nombre;
    $nombre = ucwords($nombre);
    $tab = '    ';

    $file = fopen("$ruta/$nombre"."DAO.php", "w");
    $txt = "<?php \n";
    $txt .= "require_once(\"./$RUTA_BD/$NOMBRE_CLASE_BD.php\");\n"; 
    $txt .= "require_once(\"./$ruta_modelo/$nombre.php\");\n"; 
    $txt .= "class $nombre"."DAO {\n";     
    
    // CRUD

    //CREAR
    $txt .= $tab . "public static function agregar(\$nuevo) {\n";
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
    $txt .= $tab . $tab . "\$params=self::getParamsAuto(\$nuevo);\n"; 
    $txt .= $tab . $tab . "return \$rs->execute(\$params);\n"; 
    $txt .= $tab . "}\n";

    //READ por el primer elemento
    $txt .= $tab . "public static function buscar(\$id) {\n";
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
    $txt .= $tab . $tab . "\$stSql = \"DELETE FROM $nombre_base WHERE ". $columnas[0][0] . "=:" . $columnas[0][0] . "\";\n";
    $txt .= $tab . $tab . "\$rs = \$cc->db->prepare(\$stSql);\n";
    $txt .= $tab . $tab . "return \$rs->execute(array('". $columnas[0][0] . "'=>\$nuevo->get". ucwords($columnas[0][0]) . "()));\n";
    $txt .= $tab . "}\n";  


    //ALL
    $txt .= $tab . "public static function buscarAll() {\n";
    $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
        $txt .= $tab . $tab . "\$cc=$DB::getInstancia();\n";   
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
// comprueba el tipo de datos
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
function TipoDatosPrint($col){
    $rs = "";
    $rs .= $col[1]; 
    if(preg_match("/varchar/",$col[1])){
        // echo "TIPO Varchar <br>";
        $resultado =preg_replace("/[^0-9]/", "", $col[1]);
        // echo "maximo " . $resultado . "<br>";
        $rs .= " MAX $resultado";
    }
    elseif(preg_match("/int/",$col[1])){
        // echo "Tipo INT <br>";
        $resultado =preg_replace("/[^0-9]/", "", $col[1]);
        // echo "maximo " . $resultado . "<br>";
        $rs .= " MAX $resultado";
    }
    elseif(preg_match("/datetime/",$col[1])){
        // echo "Tipo datetime <br>";            
    }
    elseif(preg_match("/time/",$col[1])){
        // echo "Tipo time <br>";            
    }
    elseif(preg_match("/date/",$col[1])){
        // echo "Tipo date <br>";            
    }
    elseif(preg_match("/decimal/",$col[1])){
        // echo "Tipo decimal <br>";            
    }
    $isNull="SI";
    if($col[2]=="NO"){
        $isNull="NO";
    }
    $rs .= " Null=" . $isNull; 
    $rs .= " " . $col[4] . " " . $col[5];

    return $rs;
}

// Ejecuta todo el programa
// $config = configuracion de la conexion a base de datos
function Reflect($config){  
    // 1 Nombre carpeta conexion a base de datos
    $RUTA_BD="DB";           //Mayuscula (NO modificar)
    $NOMBRE_CLASE_BD="DB";   //Mayuscula (No modificar)
    Rutador($RUTA_BD);
    CreateConect($NOMBRE_CLASE_BD,$RUTA_BD,$config);

    // 2 Rutas de las carpetas
    $RUTA_MODELO="Modelo";
    $RUTA_DAO="DAO";
    //Creador de Carpetas
    Rutador($RUTA_MODELO);
    Rutador($RUTA_DAO);

    // 3 reflejo de tablas
    $tablas = ShowTables($RUTA_BD,$NOMBRE_CLASE_BD); //Obtiene todas las tablas
    foreach ($tablas as $tabla) {    
        // echo $tabla[0] . "<br>"; //Imprime todas  
        $columnas = DescribeTables($tabla[0],$RUTA_BD,$NOMBRE_CLASE_BD); // todas las columnas  
        
        //4 creacion de archivos
            //4.1 Crear Modelo
            CreateClass($tabla[0],$columnas,$RUTA_MODELO);
            //4.2 Crear DAO
            CreateDAO($tabla[0],$columnas,$RUTA_DAO,$RUTA_MODELO,$RUTA_BD,$NOMBRE_CLASE_BD);



        //Experimento todos los atributos de la base datos
        // foreach ($columnas as $col) { 
        //     // echo $col[0] . "  <br>";      
        //     echo " " . $col[0] . "    :  ". $col[1] . "    :  ". $col[2] .  "    :  ". $col[3] ." : " . $col[5] ." <br>";          
            

        //     TipoDatos($col);       
        //     echo "<br>";
        // }  
    }

    $RUTA_VIEW="View"; //vista formulario simple
    Rutador($RUTA_VIEW);

    $RUTA_CONTROLADORES="Contralador"; //controladores a full
    Rutador($RUTA_CONTROLADORES);

}

// RUN() - Configuración






?>