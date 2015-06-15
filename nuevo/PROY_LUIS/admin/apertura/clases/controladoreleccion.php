<?php 
class controladorelecciones extends eleccion {
	public function guardarDatos($con,$objeleccion){
		$variableSql ="INSERT INTO elecciones";
      $variableSql.="(id, presidencial,municipal,diputado,perioda)";
      $variableSql.="VALUES(";
      	$variableSql.="'".$objeleccion[0]."',";
      	$variableSql.="'".$objeleccion[1]."',";
      	$variableSql.="'".$objeleccion[2]."',";
      	$variableSql.="'".$objeleccion[3]."',";
	   $variableSql.="'".$objeleccion[4]."');";
var_dump($objeleccion);
 return consultaA($con, $variableSql);
 }

}