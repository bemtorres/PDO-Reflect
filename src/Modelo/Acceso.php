<?php 
class Acceso {
	private $id_acceso; //int(11) MAX 11 Null=NO  auto_increment
	private $nombres; //varchar(50) MAX 50 Null=NO  
	private $apellidos; //varchar(50) MAX 50 Null=NO  
	private $username; //varchar(64) MAX 64 Null=NO  
	private $password; //varchar(64) MAX 64 Null=NO  
	private $correo; //varchar(50) MAX 50 Null=NO  
	private $id_google; //varchar(255) MAX 255 Null=SI  
	private $telefono; //varchar(14) MAX 14 Null=NO  
	private $fecha_create; //datetime Null=NO  
	private $fecha_update; //datetime Null=NO  
	private $id_tipo_usuario; //int(11) MAX 11 Null=NO  
	private $id_comuna; //int(11) MAX 11 Null=NO  
	private $direccion; //varchar(100) MAX 100 Null=SI  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_acceso,$nombres,$apellidos,$username,$password,$correo,$id_google,$telefono,$fecha_create,$fecha_update,$id_tipo_usuario,$id_comuna,$direccion,$activo){
		$this->id_acceso=$id_acceso;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->username=$username;
		$this->password=$password;
		$this->correo=$correo;
		$this->id_google=$id_google;
		$this->telefono=$telefono;
		$this->fecha_create=$fecha_create;
		$this->fecha_update=$fecha_update;
		$this->id_tipo_usuario=$id_tipo_usuario;
		$this->id_comuna=$id_comuna;
		$this->direccion=$direccion;
		$this->activo=$activo;
	}

	function getId_acceso(){
		return $this->id_acceso;
	}

	function getNombres(){
		return $this->nombres;
	}

	function getApellidos(){
		return $this->apellidos;
	}

	function getUsername(){
		return $this->username;
	}

	function getPassword(){
		return $this->password;
	}

	function getCorreo(){
		return $this->correo;
	}

	function getId_google(){
		return $this->id_google;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getFecha_create(){
		return $this->fecha_create;
	}

	function getFecha_update(){
		return $this->fecha_update;
	}

	function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	function getId_comuna(){
		return $this->id_comuna;
	}

	function getDireccion(){
		return $this->direccion;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_acceso($id_acceso){
		$this->id_acceso=$id_acceso;
	}

	function setNombres($nombres){
		$this->nombres=$nombres;
	}

	function setApellidos($apellidos){
		$this->apellidos=$apellidos;
	}

	function setUsername($username){
		$this->username=$username;
	}

	function setPassword($password){
		$this->password=$password;
	}

	function setCorreo($correo){
		$this->correo=$correo;
	}

	function setId_google($id_google){
		$this->id_google=$id_google;
	}

	function setTelefono($telefono){
		$this->telefono=$telefono;
	}

	function setFecha_create($fecha_create){
		$this->fecha_create=$fecha_create;
	}

	function setFecha_update($fecha_update){
		$this->fecha_update=$fecha_update;
	}

	function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario=$id_tipo_usuario;
	}

	function setId_comuna($id_comuna){
		$this->id_comuna=$id_comuna;
	}

	function setDireccion($direccion){
		$this->direccion=$direccion;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}