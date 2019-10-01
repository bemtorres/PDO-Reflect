<?php 
class Cliente {
	private $id_cliente; //int(11) MAX 11 Null=NO  auto_increment
	private $id_acceso; //int(11) MAX 11 Null=NO  
	private $id_ranking_cliente; //int(11) MAX 11 Null=NO  
	private $notificaciones; //int(11) MAX 11 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_cliente,$id_acceso,$id_ranking_cliente,$notificaciones,$activo){
		$this->id_cliente=$id_cliente;
		$this->id_acceso=$id_acceso;
		$this->id_ranking_cliente=$id_ranking_cliente;
		$this->notificaciones=$notificaciones;
		$this->activo=$activo;
	}

	function getId_cliente(){
		return $this->id_cliente;
	}

	function getId_acceso(){
		return $this->id_acceso;
	}

	function getId_ranking_cliente(){
		return $this->id_ranking_cliente;
	}

	function getNotificaciones(){
		return $this->notificaciones;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_cliente($id_cliente){
		$this->id_cliente=$id_cliente;
	}

	function setId_acceso($id_acceso){
		$this->id_acceso=$id_acceso;
	}

	function setId_ranking_cliente($id_ranking_cliente){
		$this->id_ranking_cliente=$id_ranking_cliente;
	}

	function setNotificaciones($notificaciones){
		$this->notificaciones=$notificaciones;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}