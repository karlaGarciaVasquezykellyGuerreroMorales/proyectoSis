

<?php
error_reporting(0);
session_start();
 @$numero = $_REQUEST['dui'];
$conexion = mysql_connect("localhost", "root") or die ("PROBLEMA AL CONECTAR");


 mysql_select_db("re_votaciones", $conexion) or die ("ERROR AL CONECTAR A LA BASE DE DATOS");

 
 $estandar= mysql_query( "SELECT * FROM ciudadano where dui = '".$numero."'" ,$conexion);

 if($row = mysql_fetch_array($estandar)){
  $_SESSION['dui'] = $row;
    header("location: precidente.php" method="post" id="voto");

} else {
   
}
?>