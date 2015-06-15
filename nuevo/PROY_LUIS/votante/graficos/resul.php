<head><title>Resultados</title></head><center>


<?php 
   mysql_connect("localhost", "root", "","") or die(mysql_error());
   mysql_select_db("votaciones") or die(mysql_error());
   $result=mysql_query("select * from  votos"); 
?>

<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=1> 


<?php 
    

   while($row = mysql_fetch_array($result)) { 
      printf("<tr><td><BR>&nbsp;<font color='green' size='4'><center><b>por la candidata '%s' se han obtenido:</b> <font color='darkblue'>'%s'</font> votos</font></center></font></td></TR>",$row["id"],$row["clicks"]);
}    
   mysql_free_result($result); 

?> 


</table>

</center>