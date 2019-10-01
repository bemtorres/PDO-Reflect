<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Monto_agenda.php");
class Monto_agendaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO monto_agenda (id_monto_agenda,id_agenda,fecha,monto_tecnico,monto_casa,activo) VALUES(:id_monto_agenda,:id_agenda,:fecha,:monto_tecnico,:monto_casa,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO monto_agenda (id_agenda,fecha,monto_tecnico,monto_casa,activo) VALUES(:id_agenda,:fecha,:monto_tecnico,:monto_casa,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM monto_agenda WHERE id_monto_agenda=:id_monto_agenda";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_monto_agenda' => $id));
		$ba = $rs->fetch();
		$nuevo = new Monto_agenda($ba['id_monto_agenda'],$ba['id_agenda'],$ba['fecha'],$ba['monto_tecnico'],$ba['monto_casa'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE monto_agenda SET id_agenda=:id_agenda,fecha=:fecha,monto_tecnico=:monto_tecnico,monto_casa=:monto_casa,activo=:activo WHERE id_monto_agenda=:id_monto_agenda";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM monto_agenda WHERE id_monto_agenda=:id_monto_agenda";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_monto_agenda'=>$nuevo->getId_monto_agenda()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM monto_agenda ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Monto_agenda($ba['id_monto_agenda'],$ba['id_agenda'],$ba['fecha'],$ba['monto_tecnico'],$ba['monto_casa'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM monto_agenda";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_monto_agenda'] = $nuevo->getId_monto_agenda();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['fecha'] = $nuevo->getFecha();
		$params['monto_tecnico'] = $nuevo->getMonto_tecnico();
		$params['monto_casa'] = $nuevo->getMonto_casa();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['fecha'] = $nuevo->getFecha();
		$params['monto_tecnico'] = $nuevo->getMonto_tecnico();
		$params['monto_casa'] = $nuevo->getMonto_casa();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}