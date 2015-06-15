
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>SISTEMA DE VOTACIÓN</title>
<link rel="stylesheet" href="estilo.css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
 <body style="padding:100px;">
<div class="contenedor">
    
    
    <div id="formulario">
        <form method="POST" action="return false" onsubmit="return false">

            <h2>BIENVENIDO</h2><br></h2><br><br>
            <img src="Usuarios.jpg" alt="" width="80" height="80">
            <div id="resultado"></div>
            <p><input type="text" name="user" id="user" value="" placeholder="USUARIO"></p><br>
            <p><input type="password" name="pass" id="pass" value="" placeholder="*******"></p><br><br><br>
            <p><button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">ACCEDER</button></p>
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