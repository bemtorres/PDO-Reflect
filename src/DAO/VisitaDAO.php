<?php 
if (!isset($rootDir)){
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir ."/DB/DB.php");
require_once ($rootDir ."/Modelo/Visita.php");
class VisitaDAO {
	public static function agregar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO visita (id_visita,id_semana,num_visita,id_agenda,hora_inicio,hora_final,n_semana,anio_actual,id_estado_visita,id_tecnico_a,hora_visita,fecha_visita,longitud,latitud,comentario_visita,code_v,id_tipo_labor,activo,monto_tecnico,monto_casa) VALUES(:id_visita,:id_semana,:num_visita,:id_agenda,:hora_inicio,:hora_final,:n_semana,:anio_actual,:id_estado_visita,:id_tecnico_a,:hora_visita,:fecha_visita,:longitud,:latitud,:comentario_visita,:code_v,:id_tipo_labor,:activo,:monto_tecnico,:monto_casa)";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function agregarAuto($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "INSERT INTO visita (id_semana,num_visita,id_agenda,hora_inicio,hora_final,n_semana,anio_actual,id_estado_visita,id_tecnico_a,hora_visita,fecha_visita,longitud,latitud,comentario_visita,code_v,id_tipo_labor,activo,monto_tecnico,monto_casa) VALUES(:id_semana,:num_visita,:id_agenda,:hora_inicio,:hora_final,:n_semana,:anio_actual,:id_estado_visita,:id_tecnico_a,:hora_visita,:fecha_visita,:longitud,:latitud,:comentario_visita,:code_v,:id_tipo_labor,:activo,:monto_tecnico,:monto_casa)";
		$rs = $cc->db->prepare($stSql);
		$params=self::getParamsAuto($nuevo);
		return $rs->execute($params);
	}
	public static function buscar($id) {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM visita WHERE id_visita=:id_visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute(array('id_visita' => $id));
		$ba = $rs->fetch();
		$nuevo = new Visita($ba['id_visita'],$ba['id_semana'],$ba['num_visita'],$ba['id_agenda'],$ba['hora_inicio'],$ba['hora_final'],$ba['n_semana'],$ba['anio_actual'],$ba['id_estado_visita'],$ba['id_tecnico_a'],$ba['hora_visita'],$ba['fecha_visita'],$ba['longitud'],$ba['latitud'],$ba['comentario_visita'],$ba['code_v'],$ba['id_tipo_labor'],$ba['activo'],$ba['monto_tecnico'],$ba['monto_casa']);
		return $nuevo; 
	}
	public static function actualizar($nuevo) {
		$cc=DB::getInstancia();
		$stSql = "UPDATE visita SET id_semana=:id_semana,num_visita=:num_visita,id_agenda=:id_agenda,hora_inicio=:hora_inicio,hora_final=:hora_final,n_semana=:n_semana,anio_actual=:anio_actual,id_estado_visita=:id_estado_visita,id_tecnico_a=:id_tecnico_a,hora_visita=:hora_visita,fecha_visita=:fecha_visita,longitud=:longitud,latitud=:latitud,comentario_visita=:comentario_visita,code_v=:code_v,id_tipo_labor=:id_tipo_labor,activo=:activo,monto_tecnico=:monto_tecnico,monto_casa=:monto_casa WHERE id_visita=:id_visita";
		$rs = $cc->db->prepare($stSql);
		$params = self::getParams($nuevo);
		return $rs->execute($params);
	}
	public static function eliminar($nuevo){
		$cc=DB::getInstancia();
		$stSql = "DELETE FROM visita WHERE id_visita=:id_visita";
		$rs = $cc->db->prepare($stSql);
		return $rs->execute(array('id_visita'=>$nuevo->getId_visita()));
	}
	public static function buscarAll() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM visita ";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$c = $rs->fetchAll();
		$pila = array();
		foreach ($c as $ba) {
			$nuevo = new Visita($ba['id_visita'],$ba['id_semana'],$ba['num_visita'],$ba['id_agenda'],$ba['hora_inicio'],$ba['hora_final'],$ba['n_semana'],$ba['anio_actual'],$ba['id_estado_visita'],$ba['id_tecnico_a'],$ba['hora_visita'],$ba['fecha_visita'],$ba['longitud'],$ba['latitud'],$ba['comentario_visita'],$ba['code_v'],$ba['id_tipo_labor'],$ba['activo'],$ba['monto_tecnico'],$ba['monto_casa']);
			array_push($pila, $nuevo);
		}
		return $pila; 
	}
	public static function contador() {
		$cc=DB::getInstancia();
		$stSql = "SELECT * FROM visita";
		$rs = $cc->db->prepare($stSql);
		$rs->execute();
		$cont = count($rs->fetchAll());
		return $cont; 
	}
	public static function getParams($nuevo){
		$params = array();
		$params['id_visita'] = $nuevo->getId_visita();
		$params['id_semana'] = $nuevo->getId_semana();
		$params['num_visita'] = $nuevo->getNum_visita();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['hora_inicio'] = $nuevo->getHora_inicio();
		$params['hora_final'] = $nuevo->getHora_final();
		$params['n_semana'] = $nuevo->getN_semana();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['id_estado_visita'] = $nuevo->getId_estado_visita();
		$params['id_tecnico_a'] = $nuevo->getId_tecnico_a();
		$params['hora_visita'] = $nuevo->getHora_visita();
		$params['fecha_visita'] = $nuevo->getFecha_visita();
		$params['longitud'] = $nuevo->getLongitud();
		$params['latitud'] = $nuevo->getLatitud();
		$params['comentario_visita'] = $nuevo->getComentario_visita();
		$params['code_v'] = $nuevo->getCode_v();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		$params['monto_tecnico'] = $nuevo->getMonto_tecnico();
		$params['monto_casa'] = $nuevo->getMonto_casa();
		return $params;
	}
	public static function getParamsAuto($nuevo){
		$params = array();
		$params['id_semana'] = $nuevo->getId_semana();
		$params['num_visita'] = $nuevo->getNum_visita();
		$params['id_agenda'] = $nuevo->getId_agenda();
		$params['hora_inicio'] = $nuevo->getHora_inicio();
		$params['hora_final'] = $nuevo->getHora_final();
		$params['n_semana'] = $nuevo->getN_semana();
		$params['anio_actual'] = $nuevo->getAnio_actual();
		$params['id_estado_visita'] = $nuevo->getId_estado_visita();
		$params['id_tecnico_a'] = $nuevo->getId_tecnico_a();
		$params['hora_visita'] = $nuevo->getHora_visita();
		$params['fecha_visita'] = $nuevo->getFecha_visita();
		$params['longitud'] = $nuevo->getLongitud();
		$params['latitud'] = $nuevo->getLatitud();
		$params['comentario_visita'] = $nuevo->getComentario_visita();
		$params['code_v'] = $nuevo->getCode_v();
		$params['id_tipo_labor'] = $nuevo->getId_tipo_labor();
		$params['activo'] = $nuevo->getActivo();
		$params['monto_tecnico'] = $nuevo->getMonto_tecnico();
		$params['monto_casa'] = $nuevo->getMonto_casa();
		return $params;
	}
}