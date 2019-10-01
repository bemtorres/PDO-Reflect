<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Comuna.php");
class ComunaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO comuna (id_comuna,nombre_comuna,id_region) VALUES(:id_comuna,:nombre_comuna,:id_region)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO comuna (nombre_comuna,id_region) VALUES(:nombre_comuna,:id_region)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM comuna WHERE id_comuna=:id_comuna";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_comuna' => $id));
		$ba = $rs->fetch();
		$nuevo = new Comuna($ba['id_comuna'],$ba['nombre_comuna'],$ba['id_region']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE comuna SET nombre_comuna=:nombre_comuna,id_region=:id_region WHERE id_comuna=:id_comuna";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM comuna WHERE id_comuna=:id_comuna";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_comuna'=>$nuevo->getId_comuna()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM comuna ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Comuna($ba['id_comuna'],$ba['nombre_comuna'],$ba['id_region']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM comuna";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_comuna'] = $nuevo->getId_comuna();
		$params['nombre_comuna'] = $nuevo->getNombre_comuna();
		$params['id_region'] = $nuevo->getId_region();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_comuna'] = $nuevo->getNombre_comuna();
		$params['id_region'] = $nuevo->getId_region();
		return $params;
	}
}