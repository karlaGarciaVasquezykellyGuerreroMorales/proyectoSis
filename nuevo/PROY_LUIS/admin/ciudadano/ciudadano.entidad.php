<?php
class Ciudadano
{
	private $id;
	private $Dui;
	private $Nombre;
	private $Apellido;
	private $Sexo;
	private $FechaNacimiento; 
	private $Departamento;
	private $Municipio;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}