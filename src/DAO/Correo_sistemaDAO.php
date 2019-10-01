<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Correo_sistema.php");
class Correo_sistemaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO correo_sistema (id_correo,cuenta_usuario,clave_usuario,protocolo,host,port) VALUES(:id_correo,:cuenta_usuario,:clave_usuario,:protocolo,:host,:port)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO correo_sistema (cuenta_usuario,clave_usuario,protocolo,host,port) VALUES(:cuenta_usuario,:clave_usuario,:protocolo,:host,:port)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM correo_sistema WHERE id_correo=:id_correo";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_correo' => $id));
		$ba = $rs->fetch();
		$nuevo = new Correo_sistema($ba['id_correo'],$ba['cuenta_usuario'],$ba['clave_usuario'],$ba['protocolo'],$ba['host'],$ba['port']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE correo_sistema SET cuenta_usuario=:cuenta_usuario,clave_usuario=:clave_usuario,protocolo=:protocolo,host=:host,port=:port WHERE id_correo=:id_correo";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM correo_sistema WHERE id_correo=:id_correo";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_correo'=>$nuevo->getId_correo()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM correo_sistema ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Correo_sistema($ba['id_correo'],$ba['cuenta_usuario'],$ba['clave_usuario'],$ba['protocolo'],$ba['host'],$ba['port']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM correo_sistema";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_correo'] = $nuevo->getId_correo();
		$params['cuenta_usuario'] = $nuevo->getCuenta_usuario();
		$params['clave_usuario'] = $nuevo->getClave_usuario();
		$params['protocolo'] = $nuevo->getProtocolo();
		$params['host'] = $nuevo->getHost();
		$params['port'] = $nuevo->getPort();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['cuenta_usuario'] = $nuevo->getCuenta_usuario();
		$params['clave_usuario'] = $nuevo->getClave_usuario();
		$params['protocolo'] = $nuevo->getProtocolo();
		$params['host'] = $nuevo->getHost();
		$params['port'] = $nuevo->getPort();
		return $params;
	}
}