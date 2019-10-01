<?php 
class Cambio_tecnico {
	private $id_cambio_tecnico; //int(11) MAX 11 Null=NO  auto_increment
	private $motivo; //varchar(300) MAX 300 Null=NO  
	private $fecha; //datetime Null=NO  
	private $id_visita; //int(11) MAX 11 Null=NO  
	private $id_tecnico_anterior; //int(11) MAX 11 Null=NO  
	private $id_tecnico_nuevo; //int(11) MAX 11 Null=NO  
	private $global; //int(11) MAX 11 Null=NO  

	function __construct($id_cambio_tecnico,$motivo,$fecha,$id_visita,$id_tecnico_anterior,$id_tecnico_nuevo,$global){
		$this->id_cambio_tecnico=$id_cambio_tecnico;
		$this->motivo=$motivo;
		$this->fecha=$fecha;
		$this->id_visita=$id_visita;
		$this->id_tecnico_anterior=$id_tecnico_anterior;
		$this->id_tecnico_nuevo=$id_tecnico_nuevo;
		$this->global=$global;
	}

	function getId_cambio_tecnico(){
		return $this->id_cambio_tecnico;
	}

	function getMotivo(){
		return $this->motivo;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getId_visita(){
		return $this->id_visita;
	}

	function getId_tecnico_anterior(){
		return $this->id_tecnico_anterior;
	}

	function getId_tecnico_nuevo(){
		return $this->id_tecnico_nuevo;
	}

	function getGlobal(){
		return $this->global;
	}

	function setId_cambio_tecnico($id_cambio_tecnico){
		$this->id_cambio_tecnico=$id_cambio_tecnico;
	}

	function setMotivo($motivo){
		$this->motivo=$motivo;
	}

	function setFecha($fecha){
		$this->fecha=$fecha;
	}

	function setId_visita($id_visita){
		$this->id_visita=$id_visita;
	}

	function setId_tecnico_anterior($id_tecnico_anterior){
		$this->id_tecnico_anterior=$id_tecnico_anterior;
	}

	function setId_tecnico_nuevo($id_tecnico_nuevo){
		$this->id_tecnico_nuevo=$id_tecnico_nuevo;
	}

	function setGlobal($global){
		$this->global=$global;
	}

	function __toString(){
		return print_r($this,true);
	}
}