<?php 
class Bloquear_cliente {
	private $id_bloquear_cliente; //int(11) MAX 11 Null=NO  auto_increment
	private $id_cliente; //int(11) MAX 11 Null=NO  
	private $fecha; //datetime Null=NO  
	private $motivo; //varchar(100) MAX 100 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_bloquear_cliente,$id_cliente,$fecha,$motivo,$activo){
		$this->id_bloquear_cliente=$id_bloquear_cliente;
		$this->id_cliente=$id_cliente;
		$this->fecha=$fecha;
		$this->motivo=$motivo;
		$this->activo=$activo;
	}

	function getId_bloquear_cliente(){
		return $this->id_bloquear_cliente;
	}

	function getId_cliente(){
		return $this->id_cliente;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getMotivo(){
		return $this->motivo;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_bloquear_cliente($id_bloquear_cliente){
		$this->id_bloquear_cliente=$id_bloquear_cliente;
	}

	function setId_cliente($id_cliente){
		$this->id_cliente=$id_cliente;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setMotivo($motivo){
		$this->motivo=$motivo;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}