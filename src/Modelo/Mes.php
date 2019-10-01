<?php 
class Mes {
	private $id_mes; //int(11) MAX 11 Null=NO  auto_increment
	private $id_agenda; //int(11) MAX 11 Null=NO  
	private $cant_visitas; //int(11) MAX 11 Null=SI  
	private $n_mes; //int(11) MAX 11 Null=NO  
	private $anio_actual; //int(11) MAX 11 Null=NO  
	private $dias_disponible; //varchar(13) MAX 13 Null=NO  
	private $code_m; //varchar(30) MAX 30 Null=NO  
	private $activo; //int(11) MAX 11 Null=NO  

	function __construct($id_mes,$id_agenda,$cant_visitas,$n_mes,$anio_actual,$dias_disponible,$code_m,$activo){
		$this->id_mes=$id_mes;
		$this->id_agenda=$id_agenda;
		$this->cant_visitas=$cant_visitas;
		$this->n_mes=$n_mes;
		$this->anio_actual=$anio_actual;
		$this->dias_disponible=$dias_disponible;
		$this->code_m=$code_m;
		$this->activo=$activo;
	}

	function getId_mes(){
		return $this->id_mes;
	}

	function getId_agenda(){
		return $this->id_agenda;
	}

	function getCant_visitas(){
		return $this->cant_visitas;
	}

	function getN_mes(){
		return $this->n_mes;
	}

	function getAnio_actual(){
		return $this->anio_actual;
	}

	function getDias_disponible(){
		return $this->dias_disponible;
	}

	function getCode_m(){
		return $this->code_m;
	}

	function getActivo(){
		return $this->activo;
	}

	function setId_mes($id_mes){
		$this->id_mes=$id_mes;
	}

	function setId_agenda($id_agenda){
		$this->id_agenda=$id_agenda;
	}

	function setCant_visitas($cant_visitas){
		$this->cant_visitas=$cant_visitas;
	}

	function setN_mes($n_mes){
		$this->n_mes=$n_mes;
	}

	function setAnio_actual($anio_actual){
		$this->anio_actual=$anio_actual;
	}

	function setDias_disponible($dias_disponible){
		$this->dias_disponible=$dias_disponible;
	}

	function setCode_m($code_m){
		$this->code_m=$code_m;
	}

	function setActivo($activo){
		$this->activo=$activo;
	}

	function __toString(){
		return print_r($this,true);
	}
}