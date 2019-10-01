<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Cambio_tecnico.php");
class Cambio_tecnicoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cambio_tecnico (id_cambio_tecnico,motivo,fecha,id_visita,id_tecnico_anterior,id_tecnico_nuevo,global) VALUES(:id_cambio_tecnico,:motivo,:fecha,:id_visita,:id_tecnico_anterior,:id_tecnico_nuevo,:global)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cambio_tecnico (motivo,fecha,id_visita,id_tecnico_anterior,id_tecnico_nuevo,global) VALUES(:motivo,:fecha,:id_visita,:id_tecnico_anterior,:id_tecnico_nuevo,:global)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cambio_tecnico WHERE id_cambio_tecnico=:id_cambio_tecnico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_cambio_tecnico' => $id));
		$ba = $rs->fetch();
		$nuevo = new Cambio_tecnico($ba['id_cambio_tecnico'],$ba['motivo'],$ba['fecha'],$ba['id_visita'],$ba['id_tecnico_anterior'],$ba['id_tecnico_nuevo'],$ba['global']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE cambio_tecnico SET motivo=:motivo,fecha=:fecha,id_visita=:id_visita,id_tecnico_anterior=:id_tecnico_anterior,id_tecnico_nuevo=:id_tecnico_nuevo,global=:global WHERE id_cambio_tecnico=:id_cambio_tecnico";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM cambio_tecnico WHERE id_cambio_tecnico=:id_cambio_tecnico";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_cambio_tecnico'=>$nuevo->getId_cambio_tecnico()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cambio_tecnico ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Cambio_tecnico($ba['id_cambio_tecnico'],$ba['motivo'],$ba['fecha'],$ba['id_visita'],$ba['id_tecnico_anterior'],$ba['id_tecnico_nuevo'],$ba['global']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cambio_tecnico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_cambio_tecnico'] = $nuevo->getId_cambio_tecnico();
		$params['motivo'] = $nuevo->getMotivo();
		$params['fecha'] = $nuevo->getFecha();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['id_tecnico_anterior'] = $nuevo->getId_tecnico_anterior();
		$params['id_tecnico_nuevo'] = $nuevo->getId_tecnico_nuevo();
		$params['global'] = $nuevo->getGlobal();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['motivo'] = $nuevo->getMotivo();
		$params['fecha'] = $nuevo->getFecha();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['id_tecnico_anterior'] = $nuevo->getId_tecnico_anterior();
		$params['id_tecnico_nuevo'] = $nuevo->getId_tecnico_nuevo();
		$params['global'] = $nuevo->getGlobal();
		return $params;
	}
}