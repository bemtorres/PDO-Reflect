<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Estado_visita.php");
class Estado_visitaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO estado_visita (id_estado_visita,nombre_estado_v) VALUES(:id_estado_visita,:nombre_estado_v)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO estado_visita (nombre_estado_v) VALUES(:nombre_estado_v)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM estado_visita WHERE id_estado_visita=:id_estado_visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_estado_visita' => $id));
		$ba = $rs->fetch();
		$nuevo = new Estado_visita($ba['id_estado_visita'],$ba['nombre_estado_v']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE estado_visita SET nombre_estado_v=:nombre_estado_v WHERE id_estado_visita=:id_estado_visita";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM estado_visita WHERE id_estado_visita=:id_estado_visita";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_estado_visita'=>$nuevo->getId_estado_visita()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM estado_visita ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Estado_visita($ba['id_estado_visita'],$ba['nombre_estado_v']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM estado_visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_estado_visita'] = $nuevo->getId_estado_visita();
		$params['nombre_estado_v'] = $nuevo->getNombre_estado_v();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_estado_v'] = $nuevo->getNombre_estado_v();
		return $params;
	}
}