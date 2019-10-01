<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Bloquear_cliente.php");
class Bloquear_clienteDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO bloquear_cliente (id_bloquear_cliente,id_cliente,fecha,motivo,activo) VALUES(:id_bloquear_cliente,:id_cliente,:fecha,:motivo,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO bloquear_cliente (id_cliente,fecha,motivo,activo) VALUES(:id_cliente,:fecha,:motivo,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM bloquear_cliente WHERE id_bloquear_cliente=:id_bloquear_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_bloquear_cliente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Bloquear_cliente($ba['id_bloquear_cliente'],$ba['id_cliente'],$ba['fecha'],$ba['motivo'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE bloquear_cliente SET id_cliente=:id_cliente,fecha=:fecha,motivo=:motivo,activo=:activo WHERE id_bloquear_cliente=:id_bloquear_cliente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM bloquear_cliente WHERE id_bloquear_cliente=:id_bloquear_cliente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_bloquear_cliente'=>$nuevo->getId_bloquear_cliente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM bloquear_cliente ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Bloquear_cliente($ba['id_bloquear_cliente'],$ba['id_cliente'],$ba['fecha'],$ba['motivo'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM bloquear_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_bloquear_cliente'] = $nuevo->getId_bloquear_cliente();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['fecha'] = $nuevo->getFecha();
		$params['motivo'] = $nuevo->getMotivo();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['fecha'] = $nuevo->getFecha();
		$params['motivo'] = $nuevo->getMotivo();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}