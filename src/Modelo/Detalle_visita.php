<?php 
class Detalle_visita {
	private $id_detalle_visita; //int(11) MAX 11 Null=NO  auto_increment
	private $id_labores; //int(11) MAX 11 Null=NO  
	private $id_visita; //int(11) MAX 11 Null=NO  
	private $estado; //int(11) MAX 11 Null=NO  

	function __construct($id_detalle_visita,$id_labores,$id_visita,$estado){
		$this->id_detalle_visita=$id_detalle_visita;
		$this->id_labores=$id_labores;
		$this->id_visita=$id_visita;
		$this->estado=$estado;
	}

	function getId_detalle_visita(){
		return $this->id_detalle_visita;
	}

	function getId_labores(){
		return $this->id_labores;
	}

	function getId_visita(){
		return $this->id_visita;
	}

	function getEstado(){
		return $this->estado;
	}

	function setId_detalle_visita($id_detalle_visita){
		$this->id_detalle_visita=$id_detalle_visita;
	}

	function setId_labores($id_labores){
		$this->id_labores=$id_labores;
	}

	function setId_visita($id_visita){
		$this->id_visita=$id_visita;
	}

	function setEstado($estado){
		$this->estado=$estado;
	}

	function __toString(){
		return print_r($this,true);
	}
}