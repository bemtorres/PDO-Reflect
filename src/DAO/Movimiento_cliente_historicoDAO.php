<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Movimiento_cliente_historico.php");
class Movimiento_cliente_historicoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO movimiento_cliente_historico (id_movimiento_cliente,id_visita,id_cliente,fecha,motivo,monto,monto_expresion,tipo_movimiento,activo) VALUES(:id_movimiento_cliente,:id_visita,:id_cliente,:fecha,:motivo,:monto,:monto_expresion,:tipo_movimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO movimiento_cliente_historico (id_visita,id_cliente,fecha,motivo,monto,monto_expresion,tipo_movimiento,activo) VALUES(:id_visita,:id_cliente,:fecha,:motivo,:monto,:monto_expresion,:tipo_movimiento,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_cliente_historico WHERE id_movimiento_cliente=:id_movimiento_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_movimiento_cliente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Movimiento_cliente_historico($ba['id_movimiento_cliente'],$ba['id_visita'],$ba['id_cliente'],$ba['fecha'],$ba['motivo'],$ba['monto'],$ba['monto_expresion'],$ba['tipo_movimiento'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE movimiento_cliente_historico SET id_visita=:id_visita,id_cliente=:id_cliente,fecha=:fecha,motivo=:motivo,monto=:monto,monto_expresion=:monto_expresion,tipo_movimiento=:tipo_movimiento,activo=:activo WHERE id_movimiento_cliente=:id_movimiento_cliente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM movimiento_cliente_historico WHERE id_movimiento_cliente=:id_movimiento_cliente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_movimiento_cliente'=>$nuevo->getId_movimiento_cliente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_cliente_historico ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Movimiento_cliente_historico($ba['id_movimiento_cliente'],$ba['id_visita'],$ba['id_cliente'],$ba['fecha'],$ba['motivo'],$ba['monto'],$ba['monto_expresion'],$ba['tipo_movimiento'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM movimiento_cliente_historico";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_movimiento_cliente'] = $nuevo->getId_movimiento_cliente();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['id_cliente'] = $nuevo->getId_cliente();
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
		$params['id_visita'] = $nuevo->getId_visita();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['fecha'] = $nuevo->getFecha();
		$params['motivo'] = $nuevo->getMotivo();
		$params['monto'] = $nuevo->getMonto();
		$params['monto_expresion'] = $nuevo->getMonto_expresion();
		$params['tipo_movimiento'] = $nuevo->getTipo_movimiento();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}