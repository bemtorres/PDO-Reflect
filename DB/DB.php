<?php

class DB {

    public $db;
    private static $stHost='localhost'; //Host Base de datos
    private static $stUsuario='root';   //Usuario base de datos
    private static $stClave='';         //clave base de datos
    private static $stBd='hola_base_de_datos'; //nombre base de datos
    private static $instancia;

    public function __construct(){
        $this->db = new PDO("mysql:host=" . self::$stHost . ";dbname=" .self::$stBd,self::$stUsuario,self::$stClave, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public static function getInstancia(){
        if (DB::$instancia === null){
            DB::$instancia = new DB();
        }
        return self::$instancia;
    }
}
