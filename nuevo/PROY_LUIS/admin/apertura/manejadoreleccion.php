
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" >
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
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    </head>
<body>
   <h1></h1>

  </header>
  
   <nav id="menu">
 <div id="inicio">
      
  <nav>
    <ul>
      <li><a href="/votacion2/tribunal.php">INICIO</a></li>
      <li><a href="/votacion2/elecciones/elecciones.php">FORMULARIO DE INSCRIPCION</a></li>
     
    </ul>
  </nav>
</div>
</div>
<?php
  include './clases/coneccion.php';
 include './clases/eleccion.php';
  include './clases/controladoreleccion.php';

$elecionA = new controladorelecciones();
     $accion = $_REQUEST['accion'];
  switch ($accion) {
        case 'save':
    if(isset($_REQUEST['bot'])){
    $elecionA->setId_eleccion('null');
    @$elecionA->setPresidencial($_REQUEST['Presidenciales']);
    @$elecionA->setMunicipal($_REQUEST['municipales']);
    @$elecionA->setDiputado($_REQUEST['ansamblea']);
    @$elecionA->setPeriodo($_REQUEST['año']);
        $datosObj=array(
           $elecionA->getId_eleccion(),
           $elecionA->getPresidencial(),
           $elecionA-> getMunicipal(),
           $elecionA->getDiputado(),
           $elecionA->getPeriodo());
           print $elecionA ->guardarDatos($con,$datosObj);
           print '<a href=\'manejadoreleccion.php?accion=con\'>Ver datos</a>';
       }else{
           print 'No se ha enviado datos ';
       }
        break;
    case 'con':        
        $sql = 'SELECT * FROM elecciones';
        $datoss =  consultaD($con, $sql);

        print imprimetabla($datoss,"elecciones","table table-bordered table-striped",1);
        break;
        default:
        print 'No hay Accion que realizar';
        break;
      }
      


 ?>  
     </body>
</html>

 

    
