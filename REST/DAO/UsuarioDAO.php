<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Usuario.php");
class UsuarioDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO usuario (id_usuario,nombre,correo,edad,fecha_nacimiento,activo) VALUES(:id_usuario,:nombre,:correo,:edad,:fecha_nacimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO usuario (nombre,correo,edad,fecha_nacimiento,activo) VALUES(:nombre,:correo,:edad,:fecha_nacimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	// public static function buscar($id) {
	// 	$cc=DB::getInstancia();
	// 	$stSql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
	// 	$rs = $cc->db->prepare($stSql);
	// 	$rs->execute(array('id_usuario' => $id));
	// 	$ba = $rs->fetch();
	// 	$nuevo = new Usuario($ba['id_usuario'],$ba['nombre'],$ba['correo'],$ba['edad'],$ba['fecha_nacimiento'],$ba['activo']);
	// 	return $nuevo; 
	// }
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE usuario SET nombre=:nombre,correo=:correo,edad=:edad,fecha_nacimiento=:fecha_nacimiento,activo=:activo WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM usuario WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_usuario'=>$nuevo->getId_usuario()));
	}
	// public static function buscarAll() {
	// 	$cc=DB::getInstancia();
	// 	$stSql = "SELECT * FROM usuario ";
	// 	$rs = $cc->db->prepare($stSql);
	// 	$rs->execute();
	// 	$c = $rs->fetchAll();
	// 	$pila = array();
	// 	foreach ($c as $ba) {
	// 		$nuevo = new Usuario($ba['id_usuario'],$ba['nombre'],$ba['correo'],$ba['edad'],$ba['fecha_nacimiento'],$ba['activo']);
	// 		array_push($pila, $nuevo);
	// 	}
	// 	return $pila; 
	// }
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_usuario'] = $nuevo->getId_usuario();
		$params['nombre'] = $nuevo->getNombre();
		$params['correo'] = $nuevo->getCorreo();
		$params['edad'] = $nuevo->getEdad();
		$params['fecha_nacimiento'] = $nuevo->getFecha_nacimiento();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre'] = $nuevo->getNombre();
		$params['correo'] = $nuevo->getCorreo();
		$params['edad'] = $nuevo->getEdad();
		$params['fecha_nacimiento'] = $nuevo->getFecha_nacimiento();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}


	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_usuario' => $id));
		$ba = $rs->fetch();
		return $ba; 
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM usuario ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		return $c; 
	}
}