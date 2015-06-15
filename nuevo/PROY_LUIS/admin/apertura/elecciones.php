<?php
session_start();
if(isset($_SESSION['usuario'])){


?>
<?php include './clases/Coneccion.php';?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta meta="description" content="PROTOTIVO DE VOTACIONES" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>EL SALVADOR EN ELECCIONES</title>
  <link rel="stylesheet" href="css/estilo1.css">
  <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo3.css" />
  


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
  
 <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
    <script src="./libs/jquery-2.1.0.js"></script>
    <script src="./libs/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
  
</head>
<body>
 <header>


  <h1>ELIJE EL PREDIO DE ELECCION</h1>

  </header>
  <div id="header">
      <ul class="nav">
        <li><a href="/votacion2/tribunal.php">Inicio </a></li>
          <li><a href="/votacion2/elecciones/elecciones.php">Apertura de elecciones  </a></li>
         <li><a href="/votacion2/partido/partido.php">Partido politico  </a></li>
        <li><a href="">Incripciones</a>
          <ul>
            <li><a href="/votacion2/incripcion/alcalde/alcalde.php">Alcade</a></li>
            <li><a href="/votacion2/incripcion/presidente/presidente.php">Presidente</a></li>
            <li><a href="/votacion2/incripcion/diputados/diputado.php">Diputado</a></li>
            <li><a href="/votacion2/incripcion/cualicion/cualicion.php">Coaliciones</a>
            </li>
          </ul>
        </li>
        <li><a href="/votacion2/ciudadano/ciudadano.php">Ciudadano</a></li>
          </ul>
    </div>
    
  <body>

              <div class="jumbotron">
        <form action="manejadoreleccion.php?accion=save" method="post" id="eleciones">
            <table class="table-bordered">
            <div class="row">
            
                   <div class="col-xs-3">
                    Presidenciales
                </div>
                <div class="col-xs-2">
                    <input type="CHECKBOX" name="Presidenciales" value="Presidencial" class="required digits form-control" >
                </div>
                 </div>
              
               <div class="row">
                  <div class="col-xs-3">
                    Municipales
                </div>
                <div class="col-xs-2">
                    <input type="CHECKBOX" name="municipales" value="Municipal" class="required digits form-control" >
                </div>
                 </div>

                      <div class="row">
                 <div class="col-xs-3">
                    Asamblea
                </div>
                <div class="col-xs-2">
                    <input type="CHECKBOX" name="ansamblea"  value="Ansamblea" class="required digits form-control" >
                </div>
                 </div>

                  <div class="row">
                 <div class="col-xs-3">
                    Año
                </div>
                <div class="col-xs-2">
                    <input type="tex" name="año" class="required digits form-control" required digits>
                </div>
                 </div>

                 <div class="row">
       
                <td colspan="2">
                    <input type="submit" name='bot' value='Ingresar' class="btn btn-primary">

                </div>
            </div>
        </table>
        </form>
    </div>


  </body>

  </html>
  <?php
}else{
  header("location: /votacion2/inicio.php");
}
?>