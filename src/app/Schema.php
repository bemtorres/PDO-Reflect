<?php 
class Diccionario{

    private $largoTexto =255; 
    // time
    // datime
    // int
    // varchar
    // double
    // bool 
    public function tipo($valor){
        switch ($valor[0]) {
            case 'pk':
                return 'INT PRIMARY KEY NOT NULL';
                break;
            case 'nn':
                return 'NOT NULL';
                break;
            case 'int':
                return 'INT';
                break;
            case 'unique':
                return 'UNIQUE';
                break;
            case 'date':
                return 'DATE';
                break;
            case 'datetime':
                return 'DATETIME';
                break;
            case 'time':
                return 'TIME';
                break;
            case ('string' || 'texto' ):
                $salida = 'VARCHAR';
                $c="";
                if(isset($valor[1])){
                    $c = $this->condicion($valor[1]);                    
                }else{
                    $c ="(".$this->largoTexto.")";
                }
                $salida .= $c;
                return $salida;                
                break;
        }
    }

    public function condicion($condicion){
        $c = explode("=",$condicion);
        switch ($c[0]) {
            case 'max':
                    if($c[0]>0){
                        return "($c[1])";
                    }
                    return "(".$this->largoTexto.")";
             
                break;
            
            default:
                return "";
                break;
        }
    }
}

class Schema extends Diccionario{
    private $tabla;
    private $scripts;
    private $primaryKey;
    private $atributos=[];
        
    public function __construct($nombreTabla=""){
        $this->tabla = $nombreTabla;
    }

    

    public function atributo($array = []){
        //  print_r($array);
        $this->atributo = $array; 
        $largo = count($array);
        $cont = 1;

        $sql ="CREATE TABLE " . $this->tabla . " ( ";
        foreach ($array as $nombreColumna => $atributo) {
            $valor = explode("|",$atributo);
            $salida = $this->tipo($valor);
            $sql .= $nombreColumna ."    ". $salida;
            if ($cont<$largo) {
                $sql .=", ";
            }
            $cont +=1;
            if($valor[0]=='pk'){
                 $this->primaryKey = $nombreColumna;  
            }
        }
        $sql .=");";
        $this->scripts = $sql;
        // return $sql;
    }  

    public function scripts(){
        return $this->scripts;
    }

    public function autoIncrement($nombreColumna = ""){
        if($nombreColumna!=""){
            return "ALTER TABLE $this->tabla CHANGE COLUMN `$nombreColumna` `$nombreColumna` INT(11) NOT NULL AUTO_INCREMENT ;";
        }else{
            if(isset($this->primaryKey)){
                return "ALTER TABLE $this->tabla CHANGE COLUMN `$this->primaryKey` `$this->primaryKey` INT(11) NOT NULL AUTO_INCREMENT ;";
            }else{
                return 'none';
            } 
        }
         
    }

    public function foranea($s,$idNombre = ""){

        if(isset($s)){
            if(!is_null($s)){
                if($idNombre==""){
                    return "ALTER TABLE ".$this->tabla." ADD CONSTRAINT ".$this->separar($this->tabla)."_".$this->separar($s->tabla)."_FK FOREIGN KEY ( ".$s->primaryKey." ) REFERENCES ".$s->tabla ."( " .$s->primaryKey." );";
                }else{
                    return "ALTER TABLE ".$this->tabla." ADD CONSTRAINT ".$this->separar($this->tabla)."_".$this->separar($s->tabla)."_FK FOREIGN KEY ( ".$idNombre." ) REFERENCES ".$s->tabla ."( " .$idNombre." );";
          
                }
            }
        }
    }

    public function limpiar(){
        return "TRUNCATE TABLE '$this->tabla'";
    }
    public function borrar(){
        return "DROP TABLE '$this->tabla'";
    }
    public function alterar($nombreColumna){
        return "ALTER TABLE $this->tabla ADD $nombreColumna varchar(255);";
    }
    private function separar($n){
        $s = explode('_',$n);
        $texto = "";
        $cont = 1;
        $total = count($s);
        foreach ($s as $e) {
            if($cont<=3){
                $texto .= substr($e,0,4);
                if($cont<$total) $texto.="_";
                $cont =1;
            }        
        }
        return $texto;
    }
}

// nombre => tipo de datos | max | unique 

$u = new Schema('usuario');
$u->atributo([
    'id_usuario' => 'pk',
    'id_tipo_usuario' => 'int',
    'nombres' => 'texto|max=123',
    'apellidos' => 'string',
    'FECHA' => 'datetime'
    ]
);
echo $u->scripts();
echo "<br><br>";
echo $u->autoIncrement('id_tipo_usuario');

$t = new Schema('tipo_usuario');
$t->atributo([
    'id_tipo_usuario' => 'pk',
    'nombre_tipo' => 'string|max=',
    'activo' => 'int'
 ]);
 

echo "<br><br>";
echo $t->scripts();
echo "<br><br>";
echo $u->foranea($t);
echo "<br><br>";
// echo $u->alterar([ 
//     'nombres' => 'texto|max=200'
//  ]);
// echo $u->foranea($t,'id_persona');
echo "<br><br>";

// echo $p->foranea($a);
// $p = new Schema('Persona');
// $p->atributo(array(
//     'id_persona' => 'pk|auto',
//     'nombre' => 'string|max=100',
//     'edad' => 'int',
//     'precio' => 'double=9,2',
//     'fecha' => 'date',
//     'fecha2' => 'datetime',
//     'hora' => 'time'
//     )
// );

// Schema('Persona')->atributo(
//     array(
//         'id_persona' => 'pk|auto',
//         'nombre' => 'string|max=100',
//         'edad' => 'int',
//         'precio' => 'double=9,2',
//         'fecha' => 'date',
//         'fecha2' => 'datetime',
//         'hora' => 'time'
//     )
// );

// print_r($p);

// $a = "CREATE DATABASE Persona ( )";


?>