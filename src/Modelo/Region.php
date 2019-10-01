<?php 
class Region {
	private $id_region; //int(11) MAX 11 Null=NO  
	private $nombre_region; //varchar(100) MAX 100 Null=NO  

	function __construct($id_region,$nombre_region){
		$this->id_region=$id_region;
		$this->nombre_region=$nombre_region;
	}

	function getId_region(){
		return $this->id_region;
	}

	function getNombre_region(){
		return $this->nombre_region;
	}

	function setId_region($id_region){
		$this->id_region=$id_region;
	}

	function setNombre_region($nombre_region){
		$this->nombre_region=$nombre_region;
	}

	function __toString(){
		return print_r($this,true);
	}
}