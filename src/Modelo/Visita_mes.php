<?php 
class Visita_mes {
	private $id_visita_mes; //int(11) MAX 11 Null=NO  auto_increment
	private $id_mes; //int(11) MAX 11 Null=NO  
	private $num_visita; //int(11) MAX 11 Null=NO  
	private $id_agenda; //int(11) MAX 11 Null=NO  
	private $hora_inicio; //time Null=NO  
	private $hora_final; //time Null=NO  
	private $n_mes; //int(11) MAX 11 Null=SI  
	private $anio_actual; //int(11) MAX 11 Null=SI  
	private $id_estado_visita; //int(11) MAX 11 Null=NO  
	private $id_tecnico_a; //int(11) MAX 11 Null=NO  
	private $hora_visita; //time Null=SI  
	private $fecha_visita; //date Null=SI  
	private $longitud; //varchar(30) MAX 30 Null=SI  
	private $latitud; //varchar(30) MAX 30 Null=SI  
	private $comentario_visita; //varchar(300) MAX 300 Null=SI  
	private $code_vm; //varchar(30) MAX 30 Null=NO  
	private $id_tipo_labor; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  
	private $monto_tecnico; //int(11) MAX 11 Null=SI  
	private $monto_casa; //int(11) MAX 11 Null=SI  

	function __construct($id_visita_mes,$id_mes,$num_visita,$id_agenda,$hora_inicio,$hora_final,$n_mes,$anio_actual,$id_estado_visita,$id_tecnico_a,$hora_visita,$fecha_visita,$longitud,$latitud,$comentario_visita,$code_vm,$id_tipo_labor,$activo,$monto_tecnico,$monto_casa){
		$this->id_visita_mes=$id_visita_mes;
		$this->id_mes=$id_mes;
		$this->num_visita=$num_visita;
		$this->id_agenda=$id_agenda;
		$this->hora_inicio=$hora_inicio;
		$this->hora_final=$hora_final;
		$this->n_mes=$n_mes;
		$this->anio_actual=$anio_actual;
		$this->id_estado_visita=$id_estado_visita;
		$this->id_tecnico_a=$id_tecnico_a;
		$this->hora_visita=$hora_visita;
		$this->fecha_visita=$fecha_visita;
		$this->longitud=$longitud;
		$this->latitud=$latitud;
		$this->comentario_visita=$comentario_visita;
		$this->code_vm=$code_vm;
		$this->id_tipo_labor=$id_tipo_labor;
		$this->activo=$activo;
		$this->monto_tecnico=$monto_tecnico;
		$this->monto_casa=$monto_casa;
	}

	function getId_visita_mes(){
		return $this->id_visita_mes;
	}

	function getId_mes(){
		return $this->id_mes;
	}

	function getNum_visita(){
		return $this->num_visita;
	}

	function getId_agenda(){
		return $this->id_agenda;
	}

	function getHora_inicio(){
		return $this->hora_inicio;
	}

	function getHora_final(){
		return $this->hora_final;
	}

	function getN_mes(){
		return $this->n_mes;
	}

	function getAnio_actual(){
		return $this->anio_actual;
	}

	function getId_estado_visita(){
		return $this->id_estado_visita;
	}

	function getId_tecnico_a(){
		return $this->id_tecnico_a;
	}

	function getHora_visita(){
		return $this->hora_visita;
	}

	function getFecha_visita(){
		return $this->fecha_visita;
	}

	function getLongitud(){
		return $this->longitud;
	}

	function getLatitud(){
		return $this->latitud;
	}

	function getComentario_visita(){
		return $this->comentario_visita;
	}

	function getCode_vm(){
		return $this->code_vm;
	}

	function getId_tipo_labor(){
		return $this->id_tipo_labor;
	}

	function getActivo(){
		return $this->activo;
	}

	function getMonto_tecnico(){
		return $this->monto_tecnico;
	}

	function getMonto_casa(){
		return $this->monto_casa;
	}

	function setId_visita_mes($id_visita_mes){
		$this->id_visita_mes=$id_visita_mes;
	}

	function setId_mes($id_mes){
		$this->id_mes=$id_mes;
	}

	function setNum_visita($num_visita){
		$this->num_visita=$num_visita;
	}

	function setId_agenda($id_agenda){
		$this->id_agenda=$id_agenda;
	}

	function setHora_inicio($hora_inicio){
		$this->hora_inicio=$hora_inicio;
	}

	function setHora_final($hora_final){
		$this->hora_final=$hora_final;
	}

	function setN_mes($n_mes){
		$this->n_mes=$n_mes;
	}

	function setAnio_actual($anio_actual){
		$this->anio_actual=$anio_actual;
	}

	function setId_estado_visita($id_estado_visita){
		$this->id_estado_visita=$id_estado_visita;
	}

	function setId_tecnico_a($id_tecnico_a){
		$this->id_tecnico_a=$id_tecnico_a;
	}

	function setHora_visita($hora_visita){
		$this->hora_visita=$hora_visita;
	}

	function setFecha_visita($fecha_visita){
		$this->fecha_visita=$fecha_visita;
	}

	function setLongitud($longitud){
		$this->longitud=$longitud;
	}

	function setLatitud($latitud){
		$this->latitud=$latitud;
	}

	function setComentario_visita($comentario_visita){
		$this->comentario_visita=$comentario_visita;
	}

	function setCode_vm($code_vm){
		$this->code_vm=$code_vm;
	}

	function setId_tipo_labor($id_tipo_labor){
		$this->id_tipo_labor=$id_tipo_labor;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function setMonto_tecnico($monto_tecnico){
		$this->monto_tecnico=$monto_tecnico;
	}

	function setMonto_casa($monto_casa){
		$this->monto_casa=$monto_casa;
	}

	function __toString(){
		return print_r($this,true);
	}
}