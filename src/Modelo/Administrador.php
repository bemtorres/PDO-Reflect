<?php 
class Administrador {
	private $id_administrador; //int(11) MAX 11 Null=NO  auto_increment
	private $id_acceso; //int(11) MAX 11 Null=NO  
	private $rut; //varchar(14) MAX 14 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_administrador,$id_acceso,$rut,$activo){
		$this->id_administrador=$id_administrador;
		$this->id_acceso=$id_acceso;
		$this->rut=$rut;
		$this->activo=$activo;
	}

	function getId_administrador(){
		return $this->id_administrador;
	}

	function getId_acceso(){
		return $this->id_acceso;
	}

	function getRut(){
		return $this->rut;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_administrador($id_administrador){
		$this->id_administrador=$id_administrador;
	}

	function setId_acceso($id_acceso){
		$this->id_acceso=$id_acceso;
	}

	function setRut($rut){
		$this->rut=$rut;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}