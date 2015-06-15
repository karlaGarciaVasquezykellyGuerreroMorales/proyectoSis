<?php
class eleccion{
	private $id;
	private $presidencial;
	private $municipal;
	private $diputado;
	private $perioda;

	public function getId()
{
	return $this->id;
}

 public function getPresidencial()
 {
 	return $this->presidencial;
 }
 public function getMunicipal()
 {
 	return $this->municipal;
 }
 public function getDiputado()
 {
 	return $this->diputado;
 }

 public function getPeriodo()
 {
 	return $this->periodo;
 }

 public function setId($id){
 $this->id = $id;}

 public function setPresidencial($presidencial){
 	$this->presidencial = $presidencial;
 }

 public function setMunicipal($municipal){
 	$this->municipal = $municipal;
 }

 public function setDiputado($diputado){
 	$this->diputado = $diputado;
 }

 public function setPeriodo($period){
 	$this->perioda = $perioda;
 }
}