<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Acceso.php");
class AccesoDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO acceso (id_acceso,nombres,apellidos,username,password,correo,id_google,telefono,fecha_create,fecha_update,id_tipo_usuario,id_comuna,direccion,activo) VALUES(:id_acceso,:nombres,:apellidos,:username,:password,:correo,:id_google,:telefono,:fecha_create,:fecha_update,:id_tipo_usuario,:id_comuna,:direccion,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO acceso (nombres,apellidos,username,password,correo,id_google,telefono,fecha_create,fecha_update,id_tipo_usuario,id_comuna,direccion,activo) VALUES(:nombres,:apellidos,:username,:password,:correo,:id_google,:telefono,:fecha_create,:fecha_update,:id_tipo_usuario,:id_comuna,:direccion,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM acceso WHERE id_acceso=:id_acceso";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_acceso' => $id));
		$ba = $rs->fetch();
		$nuevo = new Acceso($ba['id_acceso'],$ba['nombres'],$ba['apellidos'],$ba['username'],$ba['password'],$ba['correo'],$ba['id_google'],$ba['telefono'],$ba['fecha_create'],$ba['fecha_update'],$ba['id_tipo_usuario'],$ba['id_comuna'],$ba['direccion'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE acceso SET nombres=:nombres,apellidos=:apellidos,username=:username,password=:password,correo=:correo,id_google=:id_google,telefono=:telefono,fecha_create=:fecha_create,fecha_update=:fecha_update,id_tipo_usuario=:id_tipo_usuario,id_comuna=:id_comuna,direccion=:direccion,activo=:activo WHERE id_acceso=:id_acceso";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM acceso WHERE id_acceso=:id_acceso";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_acceso'=>$nuevo->getId_acceso()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM acceso ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Acceso($ba['id_acceso'],$ba['nombres'],$ba['apellidos'],$ba['username'],$ba['password'],$ba['correo'],$ba['id_google'],$ba['telefono'],$ba['fecha_create'],$ba['fecha_update'],$ba['id_tipo_usuario'],$ba['id_comuna'],$ba['direccion'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM acceso";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_acceso'] = $nuevo->getId_acceso();
		$params['nombres'] = $nuevo->getNombres();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['correo'] = $nuevo->getCorreo();
		$params['id_google'] = $nuevo->getId_google();
		$params['telefono'] = $nuevo->getTelefono();
		$params['fecha_create'] = $nuevo->getFecha_create();
		$params['fecha_update'] = $nuevo->getFecha_update();
		$params['id_tipo_usuario'] = $nuevo->getId_tipo_usuario();
		$params['id_comuna'] = $nuevo->getId_comuna();
		$params['direccion'] = $nuevo->getDireccion();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['nombres'] = $nuevo->getNombres();
		$params['apellidos'] = $nuevo->getApellidos();
		$params['username'] = $nuevo->getUsername();
		$params['password'] = $nuevo->getPassword();
		$params['correo'] = $nuevo->getCorreo();
		$params['id_google'] = $nuevo->getId_google();
		$params['telefono'] = $nuevo->getTelefono();
		$params['fecha_create'] = $nuevo->getFecha_create();
		$params['fecha_update'] = $nuevo->getFecha_update();
		$params['id_tipo_usuario'] = $nuevo->getId_tipo_usuario();
		$params['id_comuna'] = $nuevo->getId_comuna();
		$params['direccion'] = $nuevo->getDireccion();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}