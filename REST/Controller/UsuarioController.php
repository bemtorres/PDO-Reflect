<?php
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DAO/UsuarioDAO.php");

class UsuarioController {

	public static function index() {
		return '<h1>Usuarios</h1>';
	}

	public static function show($name) {
		return '<h1>listado: ' . $name . '</h1>';
    }
    
    public static function all(){

        $usuarios = UsuarioDAO::buscarAll();

        return $usuarios;
    }
    public static function buscar($n){
        try {
            $usuario = UsuarioDAO::buscar($n);
            return $usuario;
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}

