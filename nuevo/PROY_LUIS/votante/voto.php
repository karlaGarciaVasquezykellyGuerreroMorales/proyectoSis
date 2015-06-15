 <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta meta="description" content="PROTOTIVO DE VOTACIONES" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title> ELECCIONES </title>
  
   <link href="jquery.keypad.css" rel="stylesheet">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="fonts.css">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
        <script src="./libs/jquery-2.1.0.js"></script>
        <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
        <script src="./libs/validacion/jquery.validate.min.js"></script>
        <script src="./libs/validacion/messages.js"></script>
        <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
        <script src="./libs/jquery-2.1.0.js"></script>
        <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
        <script src="./libs/validacion/jquery.validate.min.js"></script>
        <script src="./libs/validacion/messages.js"></script>
        <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script  type = "text/javascript"  src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" > </script>
        <link href="jquery.keypad.css" rel="stylesheet">
        
         <style>
            #inlineKeypad { width: 10em; }
         </style>
             
             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
             <script src="jquery.plugin.js"></script>
             <script src="jquery.keypad.js"></script>

                 <script>
                   $(function () {
                   $('#defaultKeypad').keypad();
                   $('#inlineKeypad').keypad({onClose: function() {
                     alert($(this).val());
                      }});
                    });
                 </script>
               
    </head>

<body style="padding:55px;">
 
 <header>
     <h1>BIENVENIDO/A</h1>
 </header>
  
  <div id="formulario">
        <form action="voto.php" method="post" id="voto">
            <table class="table-bordered">
            <div class="row">

         
                <div class="col-xs-2">
                    Ingrese número de DUI:
                </div>
                <div class="col-xs-2">
                    <input type="text"  id="defaultKeypad"   name="dui" maxlength="10" placeholder="00000000-0" class="required digits form-control"required>
                </div>
            </div>
            <br>
            <div class="row">
                <td colspan="2">
                    <center><input type="submit" name='bot' value='BUSCAR' class="btn btn-primary"></center>
                </div>
            </div>
        </table>


        <h3><a id="pregunta" href= "graficos/preGrafica.php">CLIKC PARA VER RESULTADOS ELECTORALES</a><br></h3>
             <img src="partidos/buscar.jpg" height="300px" width="500px" ></img>
            
        </form>

    
</body>

</html>


<?php
error_reporting(0);
session_start();
 $nombre = $_REQUEST['dui'];

 $conexion = mysql_connect("localhost", "root") or die ("PROBLEMA AL CONECTAR");


 mysql_select_db("re_votaciones", $conexion) or die ("ERROR AL CONECTAR A LA BASE DE DATOS");

 
 $estandar= mysql_query( "SELECT * FROM ciudadano where dui= '".$nombre."' " ,$conexion);
if($row = mysql_fetch_array($estandar)){
       $_SESSION['dui'] = $row["dui"];
  header("location: precidente.php   ");
 }else if ( $row = mysql_fetch_array($admin)){
  
} else {
  
}