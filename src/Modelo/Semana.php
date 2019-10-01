<?php 
class Semana {
	private $id_semana; //int(11) MAX 11 Null=NO  auto_increment
	private $id_agenda; //int(11) MAX 11 Null=NO  
	private $n_semana; //int(11) MAX 11 Null=NO  
	private $anio_actual; //int(11) MAX 11 Null=NO  
	private $semana_inicio; //date Null=NO  
	private $semana_termino; //date Null=NO  
	private $dias_disponible; //varchar(13) MAX 13 Null=NO  
	private $code_s; //varchar(30) MAX 30 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_semana,$id_agenda,$n_semana,$anio_actual,$semana_inicio,$semana_termino,$dias_disponible,$code_s,$activo){
		$this->id_semana=$id_semana;
		$this->id_agenda=$id_agenda;
		$this->n_semana=$n_semana;
		$this->anio_actual=$anio_actual;
		$this->semana_inicio=$semana_inicio;
		$this->semana_termino=$semana_termino;
		$this->dias_disponible=$dias_disponible;
		$this->code_s=$code_s;
		$this->activo=$activo;
	}

	function getId_semana(){
		return $this->id_semana;
	}

	function getId_agenda(){
		return $this->id_agenda;
	}

	function getN_semana(){
		return $this->n_semana;
	}

	function getAnio_actual(){
		return $this->anio_actual;
	}

	function getSemana_inicio(){
		return $this->semana_inicio;
	}

	function getSemana_termino(){
		return $this->semana_termino;
	}

	function getDias_disponible(){
		return $this->dias_disponible;
	}

	function getCode_s(){
		return $this->code_s;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_semana($id_semana){
		$this->id_semana=$id_semana;
	}

	function setId_agenda($id_agenda){
		$this->id_agenda=$id_agenda;
	}

	function setN_semana($n_semana){
		$this->n_semana=$n_semana;
	}

	function setAnio_actual($anio_actual){
		$this->anio_actual=$anio_actual;
	}

	function setSemana_inicio($semana_inicio){
		$this->semana_inicio=$semana_inicio;
	}

	function setSemana_termino($semana_termino){
		$this->semana_termino=$semana_termino;
	}

	function setDias_disponible($dias_disponible){
		$this->dias_disponible=$dias_disponible;
	}

	function setCode_s($code_s){
		$this->code_s=$code_s;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}