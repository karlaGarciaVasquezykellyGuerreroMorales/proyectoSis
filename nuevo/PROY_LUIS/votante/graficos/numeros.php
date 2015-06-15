<!DOCTYPE html PUBLIC >

<html >

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Validar textobox que reciba solo números</title>

<script language="javascript">

function validarNro(e) {

var key;

if(window.event) // IE

{

key = e.keyCode;

}

else if(e.which) // Netscape/Firefox/Opera

{

key = e.which;

}

if (key < 48 || key > 57)

{

if(key == 46 || key == 8 ) // Detectar . (punto) y backspace (retroceso)

    { return true; }
else 
    { return false; }

}

return true;

}

</script>

</head>

<body>

<p><strong>Validar textbox que reciba solo números</strong><br />



<form id="form1" name="form1" method="post" action="">

<input type="text" name="textfield" id="textfield" onkeypress="javascript:return validarNro(event)" />

</form>

</p>

</body>

</html>



