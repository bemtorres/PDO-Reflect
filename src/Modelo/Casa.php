<?php 
class Casa {
	private $id_casa; //int(11) MAX 11 Null=NO  auto_increment
	private $id_cliente; //int(11) MAX 11 Null=NO  
	private $id_comuna; //int(11) MAX 11 Null=NO  
	private $direccion; //varchar(400) MAX 400 Null=NO  
	private $descripcion; //varchar(500) MAX 500 Null=SI  
	private $comentario; //varchar(500) MAX 500 Null=SI  
	private $telefono; //varchar(15) MAX 15 Null=SI  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_casa,$id_cliente,$id_comuna,$direccion,$descripcion,$comentario,$telefono,$activo){
		$this->id_casa=$id_casa;
		$this->id_cliente=$id_cliente;
		$this->id_comuna=$id_comuna;
		$this->direccion=$direccion;
		$this->descripcion=$descripcion;
		$this->comentario=$comentario;
		$this->telefono=$telefono;
		$this->activo=$activo;
	}

	function getId_casa(){
		return $this->id_casa;
	}

	function getId_cliente(){
		return $this->id_cliente;
	}

	function getId_comuna(){
		return $this->id_comuna;
	}

	function getDireccion(){
		return $this->direccion;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getComentario(){
		return $this->comentario;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_casa($id_casa){
		$this->id_casa=$id_casa;
	}

	function setId_cliente($id_cliente){
		$this->id_cliente=$id_cliente;
	}

	function setId_comuna($id_comuna){
		$this->id_comuna=$id_comuna;
	}

	function setDireccion($direccion){
		$this->direccion=$direccion;
	}

	function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}

	function setComentario($comentario){
		$this->comentario=$comentario;
	}

	function setTelefono($telefono){
		$this->telefono=$telefono;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}