<?php
class Partido
{
	private $id;
	private $NombrePartido; 
	private $Bandera;
	private $Dui;
	private $Responsable;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}