<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Tipo_labor.php");
class Tipo_laborDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_labor (id_tipo_labor,nombre_tipo_labor,activo) VALUES(:id_tipo_labor,:nombre_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_labor (nombre_tipo_labor,activo) VALUES(:nombre_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_labor WHERE id_tipo_labor=:id_tipo_labor";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_tipo_labor' => $id));
		$ba = $rs->fetch();
		$nuevo = new Tipo_labor($ba['id_tipo_labor'],$ba['nombre_tipo_labor'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE tipo_labor SET nombre_tipo_labor=:nombre_tipo_labor,activo=:activo WHERE id_tipo_labor=:id_tipo_labor";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM tipo_labor WHERE id_tipo_labor=:id_tipo_labor";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_tipo_labor'=>$nuevo->getId_tipo_labor()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_labor ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Tipo_labor($ba['id_tipo_labor'],$ba['nombre_tipo_labor'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_labor";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['nombre_tipo_labor'] = $nuevo->getNombre_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_tipo_labor'] = $nuevo->getNombre_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}