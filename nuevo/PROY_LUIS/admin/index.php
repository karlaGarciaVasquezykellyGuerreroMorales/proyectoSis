<?php
session_start();
if (isset($_SESSION['usuario']))
{
    echo '<script>location.href = "welcome.php";</script>'; 
}
else
{
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>INICIO DE SESIÓN</title>
<link rel="stylesheet" href="estilo.css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
<div class="contenedor">
    <h1>SISTEMA DE REGUIROS</h1><hr>
    <h2>INICIA SESION </h2>
    
    <div id="formulario">
        <img src="ini.gif" alt="" width="150" height="100">
        <form method="POST" action="return false" onsubmit="return false">
            <div id="resultado"></div>
            <p><input type="text" name="user" id="user" value="" placeholder="USUARIO"></p>
            <p><input type="password" name="pass" id="pass" value="" placeholder="*******"></p>
            <p><button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">ENTRAR</button></p>
        </form>
        <script>
        function Validar(user, pass)
        {
            $.ajax({
                url: "validar.php",
                type: "POST",
                data: "user="+user+"&pass="+pass,
                success: function(resp){
                    $('#resultado').html(resp)
                }        
            });
        }
        </script>
    </div>
</div>
</body>
</html>
<?php
}
?>