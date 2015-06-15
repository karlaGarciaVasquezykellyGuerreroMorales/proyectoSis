 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro de candidatos</title>

        <h1>APERTURA DE ELECCIONES</h1>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
         <hr>
           <script language="javascript" src="js/jquery.js"></script>
            <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
<h3><a id="pregunta" href= "../welcome.php">MENU PRINCIPAL</a><br></h3>

    <title>apertura_elecciones</title>

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
 