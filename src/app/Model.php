<?php 

abstract class TipoDatos{

    // busca el tipo de dato
    
}

abstract class Model
{
    protected $tabla = "";
    protected $primaryKey = "id";
    protected $autoIncrement = true;


    public function save($array)
    {
        // INSERT INTO PERSONAS VALUES (id);
        $sql = "INSERT INTO " . $this->tabla . " (";
        $cont = 1;
        $largo = count($array);
        foreach ($array as $key => $value) {
            $sql .=$key;
            if ($cont<$largo) {
                $sql .=",";
            }
            $cont+=1;
        }
        $sql .= ") VALUES(";
        $cont = 1;
        foreach ($array as $key => $value) {
            $sql .="'$value'";
            if ($cont<$largo) {
                $sql .=",";
            }
            $cont+=1;
        }
        $sql .= ");";

        echo $sql;
        return $sql;
    }

    public function gets()
    {
        $sql = "SELECT * FROM  . $tabla";
        return $sql;
    }

    // busca a partir de un
    public function select($array)
    {
        $sql = "SELECT * FROM " . $tabla . " WHERE ";
        $largo = count($array);
        $cont = 1;
        foreach ($array as $key => $value) {
            $sql .=$key . ":=" . $value;
            if ($cont<$largo) {
                $sql .=",";
            }
            $cont+=1;
        }
        // return $sql;
        echo $sql;
    }
}

class Persona extends Model{
    protected $tabla = "Persona";
    protected $primaryKey = "id_persona";

    // public function __construct(){
    //     $tabla = "Benjamin";
    //     $primaryKey = "id_persona";
    // }
}

$persona = new Persona();

// print_r($persona);

$arreglo = array();
$arreglo['id_persona'] = 1;
$arreglo['nombre'] ='Benjamin Mora';
$arreglo['estado'] = 1;
$arreglo['fecha_at'] = '2019-09-30';
$persona->save($arreglo);


$persona->save(array(
    'id_persona' => 1,
    'nombre' => 'Benjamin Mora',
    'estado' => 1,
    'fecha_at' => '2019-09-30'
));

$persona->save([
    'id_persona' => 1,
    'nombre' => 'Benjamin Mora',
    'estado' => 1,
    'fecha_at' => '2019-09-30'
]);

// $a = new Persona()->save(array(
//     'id_persona' => 1,
//     'nombre' => 'Benjamin Mora',
//     'estado' => 1,
//     'fecha_at' => '2019-09-30'
// ));

// $tabla::create("Persona")->



// Persona::select(array(
//     'id_persona' => 1
// ));





?>