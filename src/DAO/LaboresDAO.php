<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Labores.php");
class LaboresDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO labores (id_labores,nombre_labor,id_tipo_labor,activo) VALUES(:id_labores,:nombre_labor,:id_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO labores (nombre_labor,id_tipo_labor,activo) VALUES(:nombre_labor,:id_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM labores WHERE id_labores=:id_labores";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_labores' => $id));
		$ba = $rs->fetch();
		$nuevo = new Labores($ba['id_labores'],$ba['nombre_labor'],$ba['id_tipo_labor'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE labores SET nombre_labor=:nombre_labor,id_tipo_labor=:id_tipo_labor,activo=:activo WHERE id_labores=:id_labores";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM labores WHERE id_labores=:id_labores";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_labores'=>$nuevo->getId_labores()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM labores ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Labores($ba['id_labores'],$ba['nombre_labor'],$ba['id_tipo_labor'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM labores";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_labores'] = $nuevo->getId_labores();
		$params['nombre_labor'] = $nuevo->getNombre_labor();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_labor'] = $nuevo->getNombre_labor();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}