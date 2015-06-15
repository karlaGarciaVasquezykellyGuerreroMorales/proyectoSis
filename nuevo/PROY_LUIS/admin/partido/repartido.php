<?php
require_once 'partido.entidad.php';
require_once 'partido.model.php';

// Logica
$alm = new Partido();
$model = new PartidoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',                  $_REQUEST['id']);
            $alm->__SET('NombrePartido',       $_REQUEST['NombrePartido']);
            $alm->__SET('Bandera',             $_REQUEST['Bandera']);
            $alm->__SET('Dui',                 $_REQUEST['Dui']);
            $alm->__SET('Responsable',         $_REQUEST['Responsable']);
            
            $model->Actualizar($alm);
            header('Location: repartido.php');
            break;

        case 'registrar':
            $alm->__SET('NombrePartido',       $_REQUEST['NombrePartido']);
            $alm->__SET('Bandera',             $_REQUEST['Bandera']);
            $alm->__SET('Dui',                 $_REQUEST['Dui']);
            $alm->__SET('Responsable',         $_REQUEST['Responsable']);
            
            $model->Registrar($alm);
            header('Location: repartido.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: repartido.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro de partidos</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

        <h1>BIENVENIDO AL SISTEMA DE REGISTRO DE PARTIDOS</h1><hr>
         <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
<h3><a id="pregunta" href= "../welcome.php">MENU PRINCIPAL</a><br></h3>

    <!-- Bootstrap core CSS -->
    <link href="../css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  <style id="holderjs-style" type="text/css"></style></head>
   
    </head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table style="width:500px;">

                        <tr>
                            <th style="text-align:left;">NombrePartido</th>
                            <td><input type="text" name="NombrePartido" value="<?php echo $alm->__GET('NombrePartido'); ?>" style="width:100%;" style="width:100%;"  value="" class="form-control" required=""/></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Bandera</th>
                            <td>
                                <select name="Bandera" style="width:100%;" style="width:100%;"  value="" class="form-control" required=""style="width:100%;"  value="" class="form-control" required=""/>
                                    <option value="1" <?php echo $alm->__GET('Bandera') == 1 ? 'selected' : ''; ?>>Tricolor</option>
                                    <option value="2" <?php echo $alm->__GET('Bandera') == 2 ? 'selected' : ''; ?>>Roja</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Dui</th>
                            <td><input type="text" name="Dui"  maxlength="10" placeholder="00000000-0" value="<?php echo $alm->__GET('Dui'); ?>" style="width:100%;" style="width:100%;"  value="" class="form-control" required=""/></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Responsable</th>
                            <td><input type="text" name="Responsable" value="<?php echo $alm->__GET('Responsable'); ?>" style="width:100%;" style="width:100%;"  value="" class="form-control" required=""/></td>
                        </tr>
        
                        
                        
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">REGISTRAR</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">nombrePartido</th>
                            <th style="text-align:left;">Bandera</th>
                            <th style="text-align:left;">Dui</th>
                            <th style="text-align:left;">Responsable</th>
                            
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('NombrePartido'); ?></td>
                            <td><?php echo $r->__GET('Bandera') == 1 ? 'Tricolor' : 'Roja'; ?></td>
                            <td><?php echo $r->__GET('Dui'); ?></td>
                            <td><?php echo $r->__GET('Responsable'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>