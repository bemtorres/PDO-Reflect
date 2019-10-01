<?php 
class Movimiento_tecnico_historico {
	private $id_movimiento_hist; //int(11) MAX 11 Null=NO  auto_increment
	private $id_tecnico; //int(11) MAX 11 Null=NO  
	private $fecha; //date Null=NO  
	private $motivo; //varchar(100) MAX 100 Null=NO  
	private $monto; //int(11) MAX 11 Null=NO  
	private $monto_expresion; //varchar(15) MAX 15 Null=NO  
	private $tipo_movimiento; //varchar(1) MAX 1 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_movimiento_hist,$id_tecnico,$fecha,$motivo,$monto,$monto_expresion,$tipo_movimiento,$activo){
		$this->id_movimiento_hist=$id_movimiento_hist;
		$this->id_tecnico=$id_tecnico;
		$this->fecha=$fecha;
		$this->motivo=$motivo;
		$this->monto=$monto;
		$this->monto_expresion=$monto_expresion;
		$this->tipo_movimiento=$tipo_movimiento;
		$this->activo=$activo;
	}

	function getId_movimiento_hist(){
		return $this->id_movimiento_hist;
	}

	function getId_tecnico(){
		return $this->id_tecnico;
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

	function setId_movimiento_hist($id_movimiento_hist){
		$this->id_movimiento_hist=$id_movimiento_hist;
	}

	function setId_tecnico($id_tecnico){
		$this->id_tecnico=$id_tecnico;
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