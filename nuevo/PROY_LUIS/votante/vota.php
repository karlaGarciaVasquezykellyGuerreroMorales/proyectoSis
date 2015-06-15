<?php
	if(isset($_GET["dui"])){
		$con=mysql_connect("localhost","root");
		mysql_select_db("re_votaciones");
		$dui=$_GET["dui"];
		if(mysql_query( $sql = "UPDATE `diputados` SET clicks = clicks+1 WHERE `diputados`.`id` = ".$_GET["partido"].";")){

			echo "GUARDADO";
		
		  mysql_query("update ciudadano set estado=1 where dui='".$dui."'");
			 header("location: municipio.php");
		
		
		}else{
			echo "error";
			}
	}
?>