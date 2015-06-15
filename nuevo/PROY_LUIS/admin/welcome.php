<?php
session_start();
if (isset($_SESSION['usuario']))
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>BIENVENIDO</title>
<link rel="stylesheet" href="estilo.css" />
</head>
<body>
<div class="contenedor">
	<tr></tr>
	<tr></tr>
    <h1>BIENVENIDO AL SISTEMA DE REGISTRO: <?php echo $_SESSION['usuario']; ?></h1><hr>
 <tr></tr>
 <tr></tr>
	<meta charset="UTF-8">
	<title>inicio_admin</title>
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="fonts.css">



	<body align="center">
	   

	   <img src="usuario1.jpg" alt="" width="500" height="300">
	    
	<a href="partido/repartido.php" class="button blue medium radius" / >
		<span class="icon-house"></span>REGISTRAR PARTIDO

		<a href="candidato/recandidato.php" class="button blue medium radius" / >
		<span class="icon-house"></span>REGISTRAR CANDIDATO

	</a>
	
    <a href="ciudadano/reciudadano.php" class="button yellow medium radius">
		<span class="icon-warning"  / ></span>REGISTRAR CIUDADANO
	</a>

	

	
   

    <p><a href="logout.php">CERRAR SESIÓN</a></p>
</div>
</body>
</html>
<?php
}
else
{
    echo '<script>location.href = "index.php";</script>'; 
}
?>