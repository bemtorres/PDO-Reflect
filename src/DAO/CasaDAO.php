<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Casa.php");
class CasaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO casa (id_casa,id_cliente,id_comuna,direccion,descripcion,comentario,telefono,activo) VALUES(:id_casa,:id_cliente,:id_comuna,:direccion,:descripcion,:comentario,:telefono,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO casa (id_cliente,id_comuna,direccion,descripcion,comentario,telefono,activo) VALUES(:id_cliente,:id_comuna,:direccion,:descripcion,:comentario,:telefono,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM casa WHERE id_casa=:id_casa";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_casa' => $id));
		$ba = $rs->fetch();
		$nuevo = new Casa($ba['id_casa'],$ba['id_cliente'],$ba['id_comuna'],$ba['direccion'],$ba['descripcion'],$ba['comentario'],$ba['telefono'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE casa SET id_cliente=:id_cliente,id_comuna=:id_comuna,direccion=:direccion,descripcion=:descripcion,comentario=:comentario,telefono=:telefono,activo=:activo WHERE id_casa=:id_casa";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM casa WHERE id_casa=:id_casa";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_casa'=>$nuevo->getId_casa()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM casa ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Casa($ba['id_casa'],$ba['id_cliente'],$ba['id_comuna'],$ba['direccion'],$ba['descripcion'],$ba['comentario'],$ba['telefono'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM casa";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_casa'] = $nuevo->getId_casa();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['id_comuna'] = $nuevo->getId_comuna();
		$params['direccion'] = $nuevo->getDireccion();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['comentario'] = $nuevo->getComentario();
		$params['telefono'] = $nuevo->getTelefono();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_cliente'] = $nuevo->getId_cliente();
		$params['id_comuna'] = $nuevo->getId_comuna();
		$params['direccion'] = $nuevo->getDireccion();
		$params['descripcion'] = $nuevo->getDescripcion();
		$params['comentario'] = $nuevo->getComentario();
		$params['telefono'] = $nuevo->getTelefono();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}