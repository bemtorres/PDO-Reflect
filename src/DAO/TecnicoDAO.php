<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Tecnico.php");
class TecnicoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tecnico (id_tecnico,id_acceso,rut,especialidad,activo) VALUES(:id_tecnico,:id_acceso,:rut,:especialidad,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tecnico (id_acceso,rut,especialidad,activo) VALUES(:id_acceso,:rut,:especialidad,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tecnico WHERE id_tecnico=:id_tecnico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_tecnico' => $id));
		$ba = $rs->fetch();
		$nuevo = new Tecnico($ba['id_tecnico'],$ba['id_acceso'],$ba['rut'],$ba['especialidad'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE tecnico SET id_acceso=:id_acceso,rut=:rut,especialidad=:especialidad,activo=:activo WHERE id_tecnico=:id_tecnico";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM tecnico WHERE id_tecnico=:id_tecnico";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_tecnico'=>$nuevo->getId_tecnico()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tecnico ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Tecnico($ba['id_tecnico'],$ba['id_acceso'],$ba['rut'],$ba['especialidad'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tecnico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_tecnico'] = $nuevo->getId_tecnico();
		$params['id_acceso'] = $nuevo->getId_acceso();
		$params['rut'] = $nuevo->getRut();
		$params['especialidad'] = $nuevo->getEspecialidad();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_acceso'] = $nuevo->getId_acceso();
		$params['rut'] = $nuevo->getRut();
		$params['especialidad'] = $nuevo->getEspecialidad();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}