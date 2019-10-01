<?php 
class Tipo_labor {
	private $id_tipo_labor; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre_tipo_labor; //varchar(60) MAX 60 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_tipo_labor,$nombre_tipo_labor,$activo){
		$this->id_tipo_labor=$id_tipo_labor;
		$this->nombre_tipo_labor=$nombre_tipo_labor;
		$this->activo=$activo;
	}

	function getId_tipo_labor(){
		return $this->id_tipo_labor;
	}

	function getNombre_tipo_labor(){
		return $this->nombre_tipo_labor;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_tipo_labor($id_tipo_labor){
		$this->id_tipo_labor=$id_tipo_labor;
	}

	function setNombre_tipo_labor($nombre_tipo_labor){
		$this->nombre_tipo_labor=$nombre_tipo_labor;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}