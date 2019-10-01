<?php 
class Ranking_cliente {
	private $id_ranking_cliente; //int(11) MAX 11 Null=NO  auto_increment
	private $nombre_ranking; //varchar(30) MAX 30 Null=NO  

	function __construct($id_ranking_cliente,$nombre_ranking){
		$this->id_ranking_cliente=$id_ranking_cliente;
		$this->nombre_ranking=$nombre_ranking;
	}

	function getId_ranking_cliente(){
		return $this->id_ranking_cliente;
	}

	function getNombre_ranking(){
		return $this->nombre_ranking;
	}

	function setId_ranking_cliente($id_ranking_cliente){
		$this->id_ranking_cliente=$id_ranking_cliente;
	}

	function setNombre_ranking($nombre_ranking){
		$this->nombre_ranking=$nombre_ranking;
	}

	function __toString(){
		return print_r($this,true);
	}
}