<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Tipo_evento.php");
class Tipo_eventoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_evento (id_tipo_evento,nombre_evento) VALUES(:id_tipo_evento,:nombre_evento)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO tipo_evento (nombre_evento) VALUES(:nombre_evento)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_evento WHERE id_tipo_evento=:id_tipo_evento";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_tipo_evento' => $id));
		$ba = $rs->fetch();
		$nuevo = new Tipo_evento($ba['id_tipo_evento'],$ba['nombre_evento']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE tipo_evento SET nombre_evento=:nombre_evento WHERE id_tipo_evento=:id_tipo_evento";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM tipo_evento WHERE id_tipo_evento=:id_tipo_evento";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_tipo_evento'=>$nuevo->getId_tipo_evento()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_evento ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Tipo_evento($ba['id_tipo_evento'],$ba['nombre_evento']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM tipo_evento";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_tipo_evento'] = $nuevo->getId_tipo_evento();
		$params['nombre_evento'] = $nuevo->getNombre_evento();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_evento'] = $nuevo->getNombre_evento();
		return $params;
	}
}