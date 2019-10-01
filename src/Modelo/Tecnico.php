<?php 
class Tecnico {
	private $id_tecnico; //int(11) MAX 11 Null=NO  auto_increment
	private $id_acceso; //int(11) MAX 11 Null=NO  
	private $rut; //varchar(14) MAX 14 Null=NO  
	private $especialidad; //varchar(100) MAX 100 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_tecnico,$id_acceso,$rut,$especialidad,$activo){
		$this->id_tecnico=$id_tecnico;
		$this->id_acceso=$id_acceso;
		$this->rut=$rut;
		$this->especialidad=$especialidad;
		$this->activo=$activo;
	}

	function getId_tecnico(){
		return $this->id_tecnico;
	}

	function getId_acceso(){
		return $this->id_acceso;
	}

	function getRut(){
		return $this->rut;
	}

	function getEspecialidad(){
		return $this->especialidad;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_tecnico($id_tecnico){
		$this->id_tecnico=$id_tecnico;
	}

	function setId_acceso($id_acceso){
		$this->id_acceso=$id_acceso;
	}

	function setRut($rut){
		$this->rut=$rut;
	}

	function setEspecialidad($especialidad){
		$this->especialidad=$especialidad;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}