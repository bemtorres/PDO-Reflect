<?php 
class Estado_visita {
	private $id_estado_visita; //int(11) MAX 11 Null=NO  
	private $nombre_estado_v; //varchar(50) MAX 50 Null=NO  

	function __construct($id_estado_visita,$nombre_estado_v){
		$this->id_estado_visita=$id_estado_visita;
		$this->nombre_estado_v=$nombre_estado_v;
	}

	function getId_estado_visita(){
		return $this->id_estado_visita;
	}

	function getNombre_estado_v(){
		return $this->nombre_estado_v;
	}

	function setId_estado_visita($id_estado_visita){
		$this->id_estado_visita=$id_estado_visita;
	}

	function setNombre_estado_v($nombre_estado_v){
		$this->nombre_estado_v=$nombre_estado_v;
	}

	function __toString(){
		return print_r($this,true);
	}
}