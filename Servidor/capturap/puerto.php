<?php
include_once('simple_html_dom.php');

// get DOM from URL or file
$html = file_get_html('http://meteoarmada.directemar.cl/site/estadopuertos/estadopuertos.html');

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

	mysqli_set_charset($Conn,'utf8');

$aux=0;


foreach($html->find('tr') as $e)
{
	//echo $e->outertext;
	
	if($aux==37)
	{
		$todo = $e->outertext;
		$cadenas = explode("<td>", $todo);
		
		/*for($i=0;$i<count($cadenas);$i++)
		{
			echo $i . " -> " . $cadenas[$i] . "<br>";
			
		}*/
		
		$puerto = $cadenas[2];
		$estado = $cadenas[3];
		$condicion = $cadenas[4];
		$adicional = $cadenas[5];
		$fecha = $cadenas[6];
		$viento = $cadenas[7];
		$mar = $cadenas[8];
		
	}
	$aux++;
}
//Limpieza de cadenas
		$puertof = trim($puerto);
		$puertof2 = rtrim($puertof,"</td>");
		
		$estadof = trim($estado);
		$estadof2 = rtrim($estadof,"</td>");
		
		$condicionf = trim($condicion);
		$condicionf2 = rtrim($condicionf,"</td>");
		
		$adicionalf = trim($adicional);
		$adicionalf2 = rtrim($adicionalf,"</td>");
		
		$fechaf = trim($fecha);
		$fechaf2 = rtrim($fechaf,"</td>");
		$fechaf3 = $fechaf2 . ":00";
		
		$fechaf4 = explode(" ", $fechaf3);
		$fechaf5 = explode("/", $fechaf4[0]);
		$fechaf6 = $fechaf5[2] ."-". $fechaf5[1] ."-". $fechaf5[0] ." ". $fechaf4[1];
		
		$vientof = trim($viento);
		$vientof2 = rtrim($vientof,"</td>");
		$vientof3 = trim($vientof2);
		$vientof4 = rtrim($vientof3,"<br />");
		$vientof5 = explode("</br>", $vientof4);
		$viento0f = trim($vientof5[0]);
		$viento1f = trim($vientof5[1]);
		$viento2f = trim($vientof5[2]);
        $vientoff = $viento0f . ", " . $viento1f	. ", " . $viento2f;
		
		$marf = rtrim($mar,"</tr>");
		$marf2 = trim($marf);
		$marf3 = rtrim($marf2,"</td>");
		$marf4 = trim($marf3);
		$marf5 = explode("</br>", $marf4);
		$mar0f = trim($marf5[0]);
		if(count($marf5)>1)
		{
			$mar1f = trim($marf5[1]);
			$marff = $mar0f . $mar1f;
		}else
		{
			$marff = $mar0f;
		}
		echo "Puerto ->" . $puertof2 . "<br />" ;
		echo "Estado ->" . $estadof2 . "<br />" ;	
		echo "Condicion ->" . $condicionf2 . "<br />" ;	
		echo "Adicional ->" . $adicionalf2 . "<br />" ;	
		echo "fecha ->" . $fechaf6 . "<br />" ;
		echo "Viento ->" . $vientoff . "<br />" ;	
		echo "Mar ->" . $marff . "<br />" ;
		
// Proceso de carga de Datos

		$query_info = "SELECT fecha FROM puerto ORDER BY fecha DESC";
		$info = $Conn -> query($query_info);
		$ultima = $info -> fetch_row();
		
		$ultima2 = date_format(date_create($ultima[0]), 'Y-m-d H:i:s');
		
		echo '<br> Fecha->'. $ultima2 . ' Comparada Con ' . $fechaf6 . '**';
		
		if($ultima2!=$fechaf6)
		{
			$sql = "INSERT INTO puerto(puerto,estado,condicion,adicional,fecha,viento,mar) VALUES ('$puertof2','$estadof2','$condicionf2','$adicionalf2','$fechaf6','$vientoff','$marff')";
			$result = $Conn -> query($sql) || die ("Ha ocurrido un problema al agregar datos");
		}else
		{
			echo 'Informacion repetida <br>';
		}
		
		
		
		
		
		
?>