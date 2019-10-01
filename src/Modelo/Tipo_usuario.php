<?php 
class Tipo_usuario {
	private $id_tipo_usuario; //int(11) MAX 11 Null=NO  
	private $nombre_tipo_u; //varchar(50) MAX 50 Null=NO  

	function __construct($id_tipo_usuario,$nombre_tipo_u){
		$this->id_tipo_usuario=$id_tipo_usuario;
		$this->nombre_tipo_u=$nombre_tipo_u;
	}

	function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	function getNombre_tipo_u(){
		return $this->nombre_tipo_u;
	}

	function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario=$id_tipo_usuario;
	}

	function setNombre_tipo_u($nombre_tipo_u){
		$this->nombre_tipo_u=$nombre_tipo_u;
	}

	function __toString(){
		return print_r($this,true);
	}
}