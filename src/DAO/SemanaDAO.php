<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Semana.php");
class SemanaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO semana (id_semana,id_agenda,n_semana,anio_actual,semana_inicio,semana_termino,dias_disponible,code_s,activo) VALUES(:id_semana,:id_agenda,:n_semana,:anio_actual,:semana_inicio,:semana_termino,:dias_disponible,:code_s,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO semana (id_agenda,n_semana,anio_actual,semana_inicio,semana_termino,dias_disponible,code_s,activo) VALUES(:id_agenda,:n_semana,:anio_actual,:semana_inicio,:semana_termino,:dias_disponible,:code_s,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM semana WHERE id_semana=:id_semana";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_semana' => $id));
		$ba = $rs->fetch();
		$nuevo = new Semana($ba['id_semana'],$ba['id_agenda'],$ba['n_semana'],$ba['anio_actual'],$ba['semana_inicio'],$ba['semana_termino'],$ba['dias_disponible'],$ba['code_s'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE semana SET id_agenda=:id_agenda,n_semana=:n_semana,anio_actual=:anio_actual,semana_inicio=:semana_inicio,semana_termino=:semana_termino,dias_disponible=:dias_disponible,code_s=:code_s,activo=:activo WHERE id_semana=:id_semana";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM semana WHERE id_semana=:id_semana";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_semana'=>$nuevo->getId_semana()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM semana ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Semana($ba['id_semana'],$ba['id_agenda'],$ba['n_semana'],$ba['anio_actual'],$ba['semana_inicio'],$ba['semana_termino'],$ba['dias_disponible'],$ba['code_s'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM semana";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_semana'] = $nuevo->getId_semana();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['n_semana'] = $nuevo->getN_semana();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['semana_inicio'] = $nuevo->getSemana_inicio();
		$params['semana_termino'] = $nuevo->getSemana_termino();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['code_s'] = $nuevo->getCode_s();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['n_semana'] = $nuevo->getN_semana();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['semana_inicio'] = $nuevo->getSemana_inicio();
		$params['semana_termino'] = $nuevo->getSemana_termino();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['code_s'] = $nuevo->getCode_s();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}