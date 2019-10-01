<?php 
class Comuna {
	private $id_comuna; //int(11) MAX 11 Null=NO  
	private $nombre_comuna; //varchar(100) MAX 100 Null=NO  
	private $id_region; //int(11) MAX 11 Null=NO  

	function __construct($id_comuna,$nombre_comuna,$id_region){
		$this->id_comuna=$id_comuna;
		$this->nombre_comuna=$nombre_comuna;
		$this->id_region=$id_region;
	}

	function getId_comuna(){
		return $this->id_comuna;
	}

	function getNombre_comuna(){
		return $this->nombre_comuna;
	}

	function getId_region(){
		return $this->id_region;
	}

	function setId_comuna($id_comuna){
		$this->id_comuna=$id_comuna;
	}

	function setNombre_comuna($nombre_comuna){
		$this->nombre_comuna=$nombre_comuna;
	}

	function setId_region($id_region){
		$this->id_region=$id_region;
	}

	function __toString(){
		return print_r($this,true);
	}
}