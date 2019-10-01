<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Cliente.php");
class ClienteDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cliente (id_cliente,id_acceso,id_ranking_cliente,notificaciones,activo) VALUES(:id_cliente,:id_acceso,:id_ranking_cliente,:notificaciones,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO cliente (id_acceso,id_ranking_cliente,notificaciones,activo) VALUES(:id_acceso,:id_ranking_cliente,:notificaciones,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cliente WHERE id_cliente=:id_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_cliente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Cliente($ba['id_cliente'],$ba['id_acceso'],$ba['id_ranking_cliente'],$ba['notificaciones'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE cliente SET id_acceso=:id_acceso,id_ranking_cliente=:id_ranking_cliente,notificaciones=:notificaciones,activo=:activo WHERE id_cliente=:id_cliente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM cliente WHERE id_cliente=:id_cliente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_cliente'=>$nuevo->getId_cliente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cliente ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Cliente($ba['id_cliente'],$ba['id_acceso'],$ba['id_ranking_cliente'],$ba['notificaciones'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['id_acceso'] = $nuevo->getId_acceso();
		$params['id_ranking_cliente'] = $nuevo->getId_ranking_cliente();
		$params['notificaciones'] = $nuevo->getNotificaciones();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_acceso'] = $nuevo->getId_acceso();
		$params['id_ranking_cliente'] = $nuevo->getId_ranking_cliente();
		$params['notificaciones'] = $nuevo->getNotificaciones();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}