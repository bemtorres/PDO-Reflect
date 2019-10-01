<?php 
class Tipo_evento {
	private $id_tipo_evento; //int(11) MAX 11 Null=NO  
	private $nombre_evento; //varchar(30) MAX 30 Null=NO  

	function __construct($id_tipo_evento,$nombre_evento){
		$this->id_tipo_evento=$id_tipo_evento;
		$this->nombre_evento=$nombre_evento;
	}

	function getId_tipo_evento(){
		return $this->id_tipo_evento;
	}

	function getNombre_evento(){
		return $this->nombre_evento;
	}

	function setId_tipo_evento($id_tipo_evento){
		$this->id_tipo_evento=$id_tipo_evento;
	}

	function setNombre_evento($nombre_evento){
		$this->nombre_evento=$nombre_evento;
	}

	function __toString(){
		return print_r($this,true);
	}
}