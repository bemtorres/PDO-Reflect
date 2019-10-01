<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Ranking_cliente.php");
class Ranking_clienteDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO ranking_cliente (id_ranking_cliente,nombre_ranking) VALUES(:id_ranking_cliente,:nombre_ranking)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO ranking_cliente (nombre_ranking) VALUES(:nombre_ranking)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM ranking_cliente WHERE id_ranking_cliente=:id_ranking_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_ranking_cliente' => $id));
		$ba = $rs->fetch();
		$nuevo = new Ranking_cliente($ba['id_ranking_cliente'],$ba['nombre_ranking']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE ranking_cliente SET nombre_ranking=:nombre_ranking WHERE id_ranking_cliente=:id_ranking_cliente";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM ranking_cliente WHERE id_ranking_cliente=:id_ranking_cliente";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_ranking_cliente'=>$nuevo->getId_ranking_cliente()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM ranking_cliente ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Ranking_cliente($ba['id_ranking_cliente'],$ba['nombre_ranking']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM ranking_cliente";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_ranking_cliente'] = $nuevo->getId_ranking_cliente();
		$params['nombre_ranking'] = $nuevo->getNombre_ranking();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombre_ranking'] = $nuevo->getNombre_ranking();
		return $params;
	}
}