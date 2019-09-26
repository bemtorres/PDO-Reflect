<?php 
class Usuario {
	private $id_usuario; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre; //varchar(45) MAX 45 Null=NO  
	private $correo; //varchar(45) MAX 45 Null=NO  
	private $edad; //int(11) MAX 11 Null=SI  
	private $fecha_nacimiento; //date Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_usuario,$nombre,$correo,$edad,$fecha_nacimiento,$activo){
		$this->id_usuario=$id_usuario;
		$this->nombre=$nombre;
		$this->correo=$correo;
		$this->edad=$edad;
		$this->fecha_nacimiento=$fecha_nacimiento;
		$this->activo=$activo;
	}

	function getId_usuario(){
		return $this->id_usuario;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getCorreo(){
		return $this->correo;
	}

	function getEdad(){
		return $this->edad;
	}

	function getFecha_nacimiento(){
		return $this->fecha_nacimiento;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
	}

	function setNombre($nombre){
		$this->nombre=$nombre;
	}

	function setCorreo($correo){
		$this->correo=$correo;
	}

	function setEdad($edad){
		$this->edad=$edad;
	}

	function setFecha_nacimiento($fecha_nacimiento){
		$this->fecha_nacimiento=$fecha_nacimiento;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}