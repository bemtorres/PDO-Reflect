<?php 
class Labores {
	private $id_labores; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre_labor; //varchar(50) MAX 50 Null=NO  
	private $id_tipo_labor; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_labores,$nombre_labor,$id_tipo_labor,$activo){
		$this->id_labores=$id_labores;
		$this->nombre_labor=$nombre_labor;
		$this->id_tipo_labor=$id_tipo_labor;
		$this->activo=$activo;
	}

	function getId_labores(){
		return $this->id_labores;
	}

	function getNombre_labor(){
		return $this->nombre_labor;
	}

	function getId_tipo_labor(){
		return $this->id_tipo_labor;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_labores($id_labores){
		$this->id_labores=$id_labores;
	}

	function setNombre_labor($nombre_labor){
		$this->nombre_labor=$nombre_labor;
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