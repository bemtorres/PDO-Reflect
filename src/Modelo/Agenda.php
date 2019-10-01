<?php 
class Agenda {
	private $id_agenda; //int(11) MAX 11 Null=NO  auto_increment
	private $id_casa; //int(11) MAX 11 Null=NO  
	private $fecha_creacion; //datetime Null=NO  
	private $fecha_inicio; //date Null=NO  
	private $fecha_termino; //date Null=NO  
	private $semana_inicio; //int(11) MAX 11 Null=NO  
	private $anio_inicio; //int(11) MAX 11 Null=NO  
	private $semana_termino; //int(11) MAX 11 Null=NO  
	private $anio_termino; //int(11) MAX 11 Null=NO  
	private $hora_inicio; //time Null=SI  
	private $hora_final; //time Null=SI  
	private $dias_disponible; //varchar(13) MAX 13 Null=SI  
	private $cant_visita_semana; //int(11) MAX 11 Null=NO  
	private $cant_visita_mes; //int(11) MAX 11 Null=NO  
	private $id_tipo_evento; //int(11) MAX 11 Null=NO  
	private $id_tecnico; //int(11) MAX 11 Null=NO  
	private $code; //varchar(30) MAX 30 Null=NO  
	private $comentario; //varchar(300) MAX 300 Null=SI  
	private $id_tipo_labor; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_agenda,$id_casa,$fecha_creacion,$fecha_inicio,$fecha_termino,$semana_inicio,$anio_inicio,$semana_termino,$anio_termino,$hora_inicio,$hora_final,$dias_disponible,$cant_visita_semana,$cant_visita_mes,$id_tipo_evento,$id_tecnico,$code,$comentario,$id_tipo_labor,$activo){
		$this->id_agenda=$id_agenda;
		$this->id_casa=$id_casa;
		$this->fecha_creacion=$fecha_creacion;
		$this->fecha_inicio=$fecha_inicio;
		$this->fecha_termino=$fecha_termino;
		$this->semana_inicio=$semana_inicio;
		$this->anio_inicio=$anio_inicio;
		$this->semana_termino=$semana_termino;
		$this->anio_termino=$anio_termino;
		$this->hora_inicio=$hora_inicio;
		$this->hora_final=$hora_final;
		$this->dias_disponible=$dias_disponible;
		$this->cant_visita_semana=$cant_visita_semana;
		$this->cant_visita_mes=$cant_visita_mes;
		$this->id_tipo_evento=$id_tipo_evento;
		$this->id_tecnico=$id_tecnico;
		$this->code=$code;
		$this->comentario=$comentario;
		$this->id_tipo_labor=$id_tipo_labor;
		$this->activo=$activo;
	}

	function getId_agenda(){
		return $this->id_agenda;
	}

	function getId_casa(){
		return $this->id_casa;
	}

	function getFecha_creacion(){
		return $this->fecha_creacion;
	}

	function getFecha_inicio(){
		return $this->fecha_inicio;
	}

	function getFecha_termino(){
		return $this->fecha_termino;
	}

	function getSemana_inicio(){
		return $this->semana_inicio;
	}

	function getAnio_inicio(){
		return $this->anio_inicio;
	}

	function getSemana_termino(){
		return $this->semana_termino;
	}

	function getAnio_termino(){
		return $this->anio_termino;
	}

	function getHora_inicio(){
		return $this->hora_inicio;
	}

	function getHora_final(){
		return $this->hora_final;
	}

	function getDias_disponible(){
		return $this->dias_disponible;
	}

	function getCant_visita_semana(){
		return $this->cant_visita_semana;
	}

	function getCant_visita_mes(){
		return $this->cant_visita_mes;
	}

	function getId_tipo_evento(){
		return $this->id_tipo_evento;
	}

	function getId_tecnico(){
		return $this->id_tecnico;
	}

	function getCode(){
		return $this->code;
	}

	function getComentario(){
		return $this->comentario;
	}

	function getId_tipo_labor(){
		return $this->id_tipo_labor;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_agenda($id_agenda){
		$this->id_agenda=$id_agenda;
	}

	function setId_casa($id_casa){
		$this->id_casa=$id_casa;
	}

	function setFecha_creacion($fecha_creacion){
		$this->fecha_creacion=$fecha_creacion;
	}

	function setFecha_inicio($fecha_inicio){
		$this->fecha_inicio=$fecha_inicio;
	}

	function setFecha_termino($fecha_termino){
		$this->fecha_termino=$fecha_termino;
	}

	function setSemana_inicio($semana_inicio){
		$this->semana_inicio=$semana_inicio;
	}

	function setAnio_inicio($anio_inicio){
		$this->anio_inicio=$anio_inicio;
	}

	function setSemana_termino($semana_termino){
		$this->semana_termino=$semana_termino;
	}

	function setAnio_termino($anio_termino){
		$this->anio_termino=$anio_termino;
	}

	function setHora_inicio($hora_inicio){
		$this->hora_inicio=$hora_inicio;
	}

	function setHora_final($hora_final){
		$this->hora_final=$hora_final;
	}

	function setDias_disponible($dias_disponible){
		$this->dias_disponible=$dias_disponible;
	}

	function setCant_visita_semana($cant_visita_semana){
		$this->cant_visita_semana=$cant_visita_semana;
	}

	function setCant_visita_mes($cant_visita_mes){
		$this->cant_visita_mes=$cant_visita_mes;
	}

	function setId_tipo_evento($id_tipo_evento){
		$this->id_tipo_evento=$id_tipo_evento;
	}

	function setId_tecnico($id_tecnico){
		$this->id_tecnico=$id_tecnico;
	}

	function setCode($code){
		$this->code=$code;
	}

	function setComentario($comentario){
		$this->comentario=$comentario;
	}

	function setId_tipo_labor($id_tipo_labor){
		$this->id_tipo_labor=$id_tipo_labor;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}