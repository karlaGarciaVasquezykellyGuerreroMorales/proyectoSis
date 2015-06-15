<?php
	// Recibimos la ID del vinculo desde la URL
	$id = $_REQUEST['id'];
	
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("votaciones") or die(mysql_error());

	// Incrementamos en 1 el contador del link con la ID especificada en la url
	$update = "UPDATE votos SET clicks=(clicks + 1) WHERE id='$id'";
	mysql_query($update) or die (mysql_error());

?>	
