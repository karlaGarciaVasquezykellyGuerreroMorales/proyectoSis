<?php
class Candidato
{
	private $id;
	private $Dui;
	private $Nombre;
	private $Apellido; 
	private $Bandera;
	private $Partido;
	private $Departamento;
	private $Municipio;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}