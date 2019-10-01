<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Tipo_usuario.php");
class Tipo_usuarioDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_usuario (id_tipo_usuario,nombre_tipo_u) VALUES(:id_tipo_usuario,:nombre_tipo_u)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_usuario (nombre_tipo_u) VALUES(:nombre_tipo_u)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario=:id_tipo_usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_tipo_usuario' => $id));
		$ba = $rs->fetch();
		$nuevo = new Tipo_usuario($ba['id_tipo_usuario'],$ba['nombre_tipo_u']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE tipo_usuario SET nombre_tipo_u=:nombre_tipo_u WHERE id_tipo_usuario=:id_tipo_usuario";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM tipo_usuario WHERE id_tipo_usuario=:id_tipo_usuario";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_tipo_usuario'=>$nuevo->getId_tipo_usuario()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_usuario ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Tipo_usuario($ba['id_tipo_usuario'],$ba['nombre_tipo_u']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_usuario";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_tipo_usuario'] = $nuevo->getId_tipo_usuario();
		$params['nombre_tipo_u'] = $nuevo->getNombre_tipo_u();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_tipo_u'] = $nuevo->getNombre_tipo_u();
		return $params;
	}
}