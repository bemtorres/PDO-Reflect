<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Detalle_visita.php");
class Detalle_visitaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_visita (id_detalle_visita,id_labores,id_visita,estado) VALUES(:id_detalle_visita,:id_labores,:id_visita,:estado)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO detalle_visita (id_labores,id_visita,estado) VALUES(:id_labores,:id_visita,:estado)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_visita WHERE id_detalle_visita=:id_detalle_visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_detalle_visita' => $id));
		$ba = $rs->fetch();
		$nuevo = new Detalle_visita($ba['id_detalle_visita'],$ba['id_labores'],$ba['id_visita'],$ba['estado']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE detalle_visita SET id_labores=:id_labores,id_visita=:id_visita,estado=:estado WHERE id_detalle_visita=:id_detalle_visita";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM detalle_visita WHERE id_detalle_visita=:id_detalle_visita";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_detalle_visita'=>$nuevo->getId_detalle_visita()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_visita ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Detalle_visita($ba['id_detalle_visita'],$ba['id_labores'],$ba['id_visita'],$ba['estado']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM detalle_visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_detalle_visita'] = $nuevo->getId_detalle_visita();
		$params['id_labores'] = $nuevo->getId_labores();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['estado'] = $nuevo->getEstado();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_labores'] = $nuevo->getId_labores();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['estado'] = $nuevo->getEstado();
		return $params;
	}
}