<?php 
class Monto_agenda {
	private $id_monto_agenda; //int(11) MAX 11 Null=NO  auto_increment
	private $id_agenda; //int(11) MAX 11 Null=NO  
	private $fecha; //datetime Null=NO  
	private $monto_tecnico; //int(11) MAX 11 Null=NO  
	private $monto_casa; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_monto_agenda,$id_agenda,$fecha,$monto_tecnico,$monto_casa,$activo){
		$this->id_monto_agenda=$id_monto_agenda;
		$this->id_agenda=$id_agenda;
		$this->fecha=$fecha;
		$this->monto_tecnico=$monto_tecnico;
		$this->monto_casa=$monto_casa;
		$this->activo=$activo;
	}

	function getId_monto_agenda(){
		return $this->id_monto_agenda;
	}

	function getId_agenda(){
		return $this->id_agenda;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getMonto_tecnico(){
		return $this->monto_tecnico;
	}

	function getMonto_casa(){
		return $this->monto_casa;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_monto_agenda($id_monto_agenda){
		$this->id_monto_agenda=$id_monto_agenda;
	}

	function setId_agenda($id_agenda){
		$this->id_agenda=$id_agenda;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setMonto_tecnico($monto_tecnico){
		$this->monto_tecnico=$monto_tecnico;
	}

	function setMonto_casa($monto_casa){
		$this->monto_casa=$monto_casa;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}