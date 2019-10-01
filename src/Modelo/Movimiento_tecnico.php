<?php 
class Movimiento_tecnico {
	private $id_movimiento; //int(11) MAX 11 Null=NO  auto_increment
	private $id_tecnico; //int(11) MAX 11 Null=NO  
	private $id_visita; //int(11) MAX 11 Null=NO  
	private $fecha; //datetime Null=NO  
	private $motivo; //varchar(100) MAX 100 Null=NO  
	private $monto; //int(11) MAX 11 Null=NO  
	private $monto_expresion; //varchar(15) MAX 15 Null=NO  
	private $tipo_movimiento; //varchar(1) MAX 1 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_movimiento,$id_tecnico,$id_visita,$fecha,$motivo,$monto,$monto_expresion,$tipo_movimiento,$activo){
		$this->id_movimiento=$id_movimiento;
		$this->id_tecnico=$id_tecnico;
		$this->id_visita=$id_visita;
		$this->fecha=$fecha;
		$this->motivo=$motivo;
		$this->monto=$monto;
		$this->monto_expresion=$monto_expresion;
		$this->tipo_movimiento=$tipo_movimiento;
		$this->activo=$activo;
	}

	function getId_movimiento(){
		return $this->id_movimiento;
	}

	function getId_tecnico(){
		return $this->id_tecnico;
	}

	function getId_visita(){
		return $this->id_visita;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getMotivo(){
		return $this->motivo;
	}

	function getMonto(){
		return $this->monto;
	}

	function getMonto_expresion(){
		return $this->monto_expresion;
	}

	function getTipo_movimiento(){
		return $this->tipo_movimiento;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_movimiento($id_movimiento){
		$this->id_movimiento=$id_movimiento;
	}

	function setId_tecnico($id_tecnico){
		$this->id_tecnico=$id_tecnico;
	}

	function setId_visita($id_visita){
		$this->id_visita=$id_visita;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setMotivo($motivo){
		$this->motivo=$motivo;
	}

	function setMonto($monto){
		$this->monto=$monto;
	}

	function setMonto_expresion($monto_expresion){
		$this->monto_expresion=$monto_expresion;
	}

	function setTipo_movimiento($tipo_movimiento){
		$this->tipo_movimiento=$tipo_movimiento;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}