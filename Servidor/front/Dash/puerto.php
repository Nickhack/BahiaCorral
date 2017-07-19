<?php include('livedata.php');
 include('common.php');header('Content-type: text/html; charset=iso-8859-1');
 


 $hostname = "localhost";
 $database = "tesis";
 $username = "carga";
 $password = "carga";
 
 $Conn = new mysqli($hostname, $username, $password, $database);  

 if($Conn->connect_errno)
 {
	printf("Conexion fallida: %s", $Conn->connect_error);
	exit();
 }
 
  $query_info = "SELECT * FROM puerto ORDER BY fecha DESC limit 1";
  $info = $Conn->query("SET NAMES 'utf8'");//arregla acentos en al codificacion erronea de la bd
  $info = $Conn -> query($query_info);
  $ultima = $info -> fetch_row();

  $hora== explode(" ", $ultima[4]);
  
  
echo '<div class="updatedtime"><span>Actualizado</span><br />' . $ultima[4] . '</div>';

	?>




<div class="circleOut">
	<div class="heatcircle-content">
	
	<table width='300'>
	<tr>
	<td width='150'>
		<?php 

			echo "Estado"," <br><span style='font-weight:700;color:#ffffff;'>" . $ultima[1];
			echo "</span>";

		?>
	</td>
	<td></td>
	<td  valign=top>
	<?php 
		echo "Condicion" ;
	?>
	
	<br><humiditycolor><?php echo $ultima[2]; ?></humiditycolor>
	</td>
	</tr>
	<tr>
	<td colspan=3 align=left>
	<?php 
		echo "Adicional" ;
	?>
	<textarea name="comment" rows="3" cols="35" style='background-color:transparent;font-weight:700;color:#ffffff;resize:none;'><?php echo $ultima[3];
	?></textarea>
	<br>

	</td>
	</tr>
	</table>
	
	
	
</div>