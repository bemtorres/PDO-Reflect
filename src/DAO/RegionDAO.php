<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Region.php");
class RegionDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO region (id_region,nombre_region) VALUES(:id_region,:nombre_region)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO region (nombre_region) VALUES(:nombre_region)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM region WHERE id_region=:id_region";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_region' => $id));
		$ba = $rs->fetch();
		$nuevo = new Region($ba['id_region'],$ba['nombre_region']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE region SET nombre_region=:nombre_region WHERE id_region=:id_region";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM region WHERE id_region=:id_region";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_region'=>$nuevo->getId_region()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM region ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Region($ba['id_region'],$ba['nombre_region']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM region";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_region'] = $nuevo->getId_region();
		$params['nombre_region'] = $nuevo->getNombre_region();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_region'] = $nuevo->getNombre_region();
		return $params;
	}
}