<?php 
class Correo_sistema {
	private $id_correo; //int(11) MAX 11 Null=NO  
	private $cuenta_usuario; //varchar(50) MAX 50 Null=NO  
	private $clave_usuario; //varchar(50) MAX 50 Null=NO  
	private $protocolo; //varchar(10) MAX 10 Null=NO  
	private $host; //varchar(50) MAX 50 Null=NO  
	private $port; //int(11) MAX 11 Null=NO  

	function __construct($id_correo,$cuenta_usuario,$clave_usuario,$protocolo,$host,$port){
		$this->id_correo=$id_correo;
		$this->cuenta_usuario=$cuenta_usuario;
		$this->clave_usuario=$clave_usuario;
		$this->protocolo=$protocolo;
		$this->host=$host;
		$this->port=$port;
	}

	function getId_correo(){
		return $this->id_correo;
	}

	function getCuenta_usuario(){
		return $this->cuenta_usuario;
	}

	function getClave_usuario(){
		return $this->clave_usuario;
	}

	function getProtocolo(){
		return $this->protocolo;
	}

	function getHost(){
		return $this->host;
	}

	function getPort(){
		return $this->port;
	}

	function setId_correo($id_correo){
		$this->id_correo=$id_correo;
	}

	function setCuenta_usuario($cuenta_usuario){
		$this->cuenta_usuario=$cuenta_usuario;
	}

	function setClave_usuario($clave_usuario){
		$this->clave_usuario=$clave_usuario;
	}

	function setProtocolo($protocolo){
		$this->protocolo=$protocolo;
	}

	function setHost($host){
		$this->host=$host;
	}

	function setPort($port){
		$this->port=$port;
	}

	function __toString(){
		return print_r($this,true);
	}
}