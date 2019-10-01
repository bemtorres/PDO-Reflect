<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Movimiento_tecnico_historico.php");
class Movimiento_tecnico_historicoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO movimiento_tecnico_historico (id_movimiento_hist,id_tecnico,fecha,motivo,monto,monto_expresion,tipo_movimiento,activo) VALUES(:id_movimiento_hist,:id_tecnico,:fecha,:motivo,:monto,:monto_expresion,:tipo_movimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO movimiento_tecnico_historico (id_tecnico,fecha,motivo,monto,monto_expresion,tipo_movimiento,activo) VALUES(:id_tecnico,:fecha,:motivo,:monto,:monto_expresion,:tipo_movimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_tecnico_historico WHERE id_movimiento_hist=:id_movimiento_hist";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_movimiento_hist' => $id));
		$ba = $rs->fetch();
		$nuevo = new Movimiento_tecnico_historico($ba['id_movimiento_hist'],$ba['id_tecnico'],$ba['fecha'],$ba['motivo'],$ba['monto'],$ba['monto_expresion'],$ba['tipo_movimiento'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE movimiento_tecnico_historico SET id_tecnico=:id_tecnico,fecha=:fecha,motivo=:motivo,monto=:monto,monto_expresion=:monto_expresion,tipo_movimiento=:tipo_movimiento,activo=:activo WHERE id_movimiento_hist=:id_movimiento_hist";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM movimiento_tecnico_historico WHERE id_movimiento_hist=:id_movimiento_hist";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_movimiento_hist'=>$nuevo->getId_movimiento_hist()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_tecnico_historico ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Movimiento_tecnico_historico($ba['id_movimiento_hist'],$ba['id_tecnico'],$ba['fecha'],$ba['motivo'],$ba['monto'],$ba['monto_expresion'],$ba['tipo_movimiento'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_tecnico_historico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_movimiento_hist'] = $nuevo->getId_movimiento_hist();
		$params['id_tecnico'] = $nuevo->getId_tecnico();
		$params['fecha'] = $nuevo->getFecha();
		$params['motivo'] = $nuevo->getMotivo();
		$params['monto'] = $nuevo->getMonto();
		$params['monto_expresion'] = $nuevo->getMonto_expresion();
		$params['tipo_movimiento'] = $nuevo->getTipo_movimiento();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_tecnico'] = $nuevo->getId_tecnico();
		$params['fecha'] = $nuevo->getFecha();
		$params['motivo'] = $nuevo->getMotivo();
		$params['monto'] = $nuevo->getMonto();
		$params['monto_expresion'] = $nuevo->getMonto_expresion();
		$params['tipo_movimiento'] = $nuevo->getTipo_movimiento();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}