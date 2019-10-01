<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Agenda.php");
class AgendaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO agenda (id_agenda,id_casa,fecha_creacion,fecha_inicio,fecha_termino,semana_inicio,anio_inicio,semana_termino,anio_termino,hora_inicio,hora_final,dias_disponible,cant_visita_semana,cant_visita_mes,id_tipo_evento,id_tecnico,code,comentario,id_tipo_labor,activo) VALUES(:id_agenda,:id_casa,:fecha_creacion,:fecha_inicio,:fecha_termino,:semana_inicio,:anio_inicio,:semana_termino,:anio_termino,:hora_inicio,:hora_final,:dias_disponible,:cant_visita_semana,:cant_visita_mes,:id_tipo_evento,:id_tecnico,:code,:comentario,:id_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO agenda (id_casa,fecha_creacion,fecha_inicio,fecha_termino,semana_inicio,anio_inicio,semana_termino,anio_termino,hora_inicio,hora_final,dias_disponible,cant_visita_semana,cant_visita_mes,id_tipo_evento,id_tecnico,code,comentario,id_tipo_labor,activo) VALUES(:id_casa,:fecha_creacion,:fecha_inicio,:fecha_termino,:semana_inicio,:anio_inicio,:semana_termino,:anio_termino,:hora_inicio,:hora_final,:dias_disponible,:cant_visita_semana,:cant_visita_mes,:id_tipo_evento,:id_tecnico,:code,:comentario,:id_tipo_labor,:activo)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM agenda WHERE id_agenda=:id_agenda";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_agenda' => $id));
		$ba = $rs->fetch();
		$nuevo = new Agenda($ba['id_agenda'],$ba['id_casa'],$ba['fecha_creacion'],$ba['fecha_inicio'],$ba['fecha_termino'],$ba['semana_inicio'],$ba['anio_inicio'],$ba['semana_termino'],$ba['anio_termino'],$ba['hora_inicio'],$ba['hora_final'],$ba['dias_disponible'],$ba['cant_visita_semana'],$ba['cant_visita_mes'],$ba['id_tipo_evento'],$ba['id_tecnico'],$ba['code'],$ba['comentario'],$ba['id_tipo_labor'],$ba['activo']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE agenda SET id_casa=:id_casa,fecha_creacion=:fecha_creacion,fecha_inicio=:fecha_inicio,fecha_termino=:fecha_termino,semana_inicio=:semana_inicio,anio_inicio=:anio_inicio,semana_termino=:semana_termino,anio_termino=:anio_termino,hora_inicio=:hora_inicio,hora_final=:hora_final,dias_disponible=:dias_disponible,cant_visita_semana=:cant_visita_semana,cant_visita_mes=:cant_visita_mes,id_tipo_evento=:id_tipo_evento,id_tecnico=:id_tecnico,code=:code,comentario=:comentario,id_tipo_labor=:id_tipo_labor,activo=:activo WHERE id_agenda=:id_agenda";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM agenda WHERE id_agenda=:id_agenda";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_agenda'=>$nuevo->getId_agenda()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM agenda ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Agenda($ba['id_agenda'],$ba['id_casa'],$ba['fecha_creacion'],$ba['fecha_inicio'],$ba['fecha_termino'],$ba['semana_inicio'],$ba['anio_inicio'],$ba['semana_termino'],$ba['anio_termino'],$ba['hora_inicio'],$ba['hora_final'],$ba['dias_disponible'],$ba['cant_visita_semana'],$ba['cant_visita_mes'],$ba['id_tipo_evento'],$ba['id_tecnico'],$ba['code'],$ba['comentario'],$ba['id_tipo_labor'],$ba['activo']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM agenda";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['id_casa'] = $nuevo->getId_casa();
		$params['fecha_creacion'] = $nuevo->getFecha_creacion();
		$params['fecha_inicio'] = $nuevo->getFecha_inicio();
		$params['fecha_termino'] = $nuevo->getFecha_termino();
		$params['semana_inicio'] = $nuevo->getSemana_inicio();
		$params['anio_inicio'] = $nuevo->getAnio_inicio();
		$params['semana_termino'] = $nuevo->getSemana_termino();
		$params['anio_termino'] = $nuevo->getAnio_termino();
		$params['hora_inicio'] = $nuevo->getHora_inicio();
		$params['hora_final'] = $nuevo->getHora_final();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['cant_visita_semana'] = $nuevo->getCant_visita_semana();
		$params['cant_visita_mes'] = $nuevo->getCant_visita_mes();
		$params['id_tipo_evento'] = $nuevo->getId_tipo_evento();
		$params['id_tecnico'] = $nuevo->getId_tecnico();
		$params['code'] = $nuevo->getCode();
		$params['comentario'] = $nuevo->getComentario();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_casa'] = $nuevo->getId_casa();
		$params['fecha_creacion'] = $nuevo->getFecha_creacion();
		$params['fecha_inicio'] = $nuevo->getFecha_inicio();
		$params['fecha_termino'] = $nuevo->getFecha_termino();
		$params['semana_inicio'] = $nuevo->getSemana_inicio();
		$params['anio_inicio'] = $nuevo->getAnio_inicio();
		$params['semana_termino'] = $nuevo->getSemana_termino();
		$params['anio_termino'] = $nuevo->getAnio_termino();
		$params['hora_inicio'] = $nuevo->getHora_inicio();
		$params['hora_final'] = $nuevo->getHora_final();
		$params['dias_disponible'] = $nuevo->getDias_disponible();
		$params['cant_visita_semana'] = $nuevo->getCant_visita_semana();
		$params['cant_visita_mes'] = $nuevo->getCant_visita_mes();
		$params['id_tipo_evento'] = $nuevo->getId_tipo_evento();
		$params['id_tecnico'] = $nuevo->getId_tecnico();
		$params['code'] = $nuevo->getCode();
		$params['comentario'] = $nuevo->getComentario();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		return $params;
	}
}