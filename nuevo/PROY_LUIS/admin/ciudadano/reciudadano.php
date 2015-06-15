<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 're_votaciones');
require_once 'ciudadano.entidad.php';
require_once 'ciudadano.model.php';

// Logica
$alm = new Ciudadano();
$model = new CiudadanoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Dui',             $_REQUEST['Dui']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
            $alm->__SET('Departamento',    $_REQUEST['Departamento']);
            $alm->__SET('Municipio',       $_REQUEST['Municipio']);

            $model->Actualizar($alm);
            header('Location: reciudadano.php');
            break;

        case 'registrar':
            $alm->__SET('Dui',             $_REQUEST['Dui']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
            $alm->__SET('Departamento',    $_REQUEST['Departamento']);
            $alm->__SET('Municipio',       $_REQUEST['Municipio']);

            $model->Registrar($alm);
            header('Location: reciudadano.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: reciudadano.php');
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
        <title>Registro de Ciudadanos</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
         <h1>BIENVENIDO AL  REGISTRO DE CIUDADANOS</h1><hr>
         <script language="javascript" src="js/jquery.js"></script>
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
                    <input   type="hidden" name="id"  value="<?php echo $alm->__GET('id'); ?> "   />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;" value="" class="form-control" required=""/>Dui</th>
                            <td><input type="text" name="Dui"  maxlength="10" placeholder="00000000-0" svalue="<?php echo $alm->__GET('Dui'); ?>" style="width:100%;" value="" class="form-control" required=""/</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;" >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" style="width:100%;"  value="" class="form-control" required=""/></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;" >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" style="width:100%;"   value="" class="form-control" required=""/></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"  value="" class="form-control" required=""/>Sexo</th>
                            <td>
                                <select name="Sexo" style="width:100%;"  value="" class="form-control" required=""/>
                                    <option value="M" <?php echo $alm->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="F" <?php echo $alm->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;" >Fecha</th>
                            <td><input type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"  value="" class="form-control" required=""/>Departamento</th>
                            <td>
                                <select name="Departamento" style="width:100%;" id="depto"  value="" class="form-control" required=""/>
                                   
                            <option value="">--------</option>
                            <?php
                            $result = $conexion->query("SELECT * FROM departamentos");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</option>';
                                }
                            }
                            ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;" >Municipio</th>
                            <td>
                                <select name="Municipio" style="width:100%;" id="municipio"  value="" class="form-control" required=""/>
                                    <option value="">------</option>


                                </select>
                            </td>
                        </tr>

                     
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">REGISTRAR</button>
                            </td>
                        </tr>
                    </table>
                </form>
                   <script language="javascript">
                            $(document).ready(function(){
                                $("#depto").change(function () {
                                    $("#depto option:selected").each(function () {
                                        id_depto = $(this).val();
                                        $.post("municipios.php", { id_depto: id_depto }, function(data){
                                            $("#municipio").html(data);
                                        });
                                    });
                                })
                            });
                        </script>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Dui</th>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Nacimiento</th>
                            <th style="text-align:left;">Departamento</th>
                            <th style="text-align:left;">Municipio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Dui'); ?></td>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Apellido'); ?></td>
                            <td><?php echo $r->__GET('Sexo') == 1 ? 'M' : 'F'; ?></td>
                            <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                            <td><?php echo $r->__GET('Departamento')== 1 ? 'Usulutan' : 'La Libertad'; ?></td>
                            <td><?php echo $r->__GET('Municipio')== 1 ? 'San Marcos' : 'San Jacinto'; ?></td>
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