<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Mes.php");
class MesDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO mes (id_mes,id_agenda,cant_visitas,n_mes,anio_actual,dias_disponible,code_m,activo) VALUES(:id_mes,:id_agenda,:cant_visitas,:n_mes,:anio_actual,:dias_disponible,:code_m,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO mes (id_agenda,cant_visitas,n_mes,anio_actual,dias_disponible,code_m,activo) VALUES(:id_agenda,:cant_visitas,:n_mes,:anio_actual,:dias_disponible,:code_m,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM mes WHERE id_mes=:id_mes";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_mes' => $id));
		$ba = $rs->fetch();
		$nuevo = new Mes($ba['id_mes'],$ba['id_agenda'],$ba['cant_visitas'],$ba['n_mes'],$ba['anio_actual'],$ba['dias_disponible'],$ba['code_m'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE mes SET id_agenda=:id_agenda,cant_visitas=:cant_visitas,n_mes=:n_mes,anio_actual=:anio_actual,dias_disponible=:dias_disponible,code_m=:code_m,activo=:activo WHERE id_mes=:id_mes";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM mes WHERE id_mes=:id_mes";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_mes'=>$nuevo->getId_mes()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM mes ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Mes($ba['id_mes'],$ba['id_agenda'],$ba['cant_visitas'],$ba['n_mes'],$ba['anio_actual'],$ba['dias_disponible'],$ba['code_m'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM mes";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_mes'] = $nuevo->getId_mes();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['cant_visitas'] = $nuevo->getCant_visitas();
		$params['n_mes'] = $nuevo->getN_mes();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['code_m'] = $nuevo->getCode_m();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['cant_visitas'] = $nuevo->getCant_visitas();
		$params['n_mes'] = $nuevo->getN_mes();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['code_m'] = $nuevo->getCode_m();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}