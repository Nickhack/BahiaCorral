<?php


$hostname = "localhost";
$database = "tesis";
$username = "carga";
$password = "carga";

$HR = htmlspecialchars($_GET["HR"],ENT_QUOTES);
$TDHT = htmlspecialchars($_GET["TDHT"],ENT_QUOTES);
$TBMP = htmlspecialchars($_GET["TBMP"],ENT_QUOTES);
$PABS = htmlspecialchars($_GET["PABS"],ENT_QUOTES);
$PREL = htmlspecialchars($_GET["PREL"],ENT_QUOTES);
$DIR = htmlspecialchars($_GET["DIR"],ENT_QUOTES);
$VEL = htmlspecialchars($_GET["VEL"],ENT_QUOTES);
$LLUVIA = htmlspecialchars($_GET["LLUVIA"],ENT_QUOTES);

if($LLUVIA>"3")
{
	$LLUVIA = 0;
}
//GET /adb/carga.php?HR1=65.10&TDHT=24.70&TBMP=23.27&PABS=1012.72&PREL=1236.87&DIR=Alguna parte&VEL=560&LLUVIA=560 HTTP/1.0


$Conn = new mysqli($hostname, $username, $password, $database);  

if($Conn->connect_errno)
{
	printf("Conexion fallida: %s", $Conn->connect_error);
	exit();
}

mysqli_set_charset($Conn,'utf8');

	$sql = "INSERT INTO datos(HR,TDHT,TBMP,PABS,PREL,DIR,VEL,LLUVIA,FECHA) VALUES ('$HR','$TDHT','$TBMP','$PABS','$PREL','$DIR','$VEL','$LLUVIA',NOW())";
	$result = $Conn -> query($sql) || die ("Ha ocurrido un problema al agregar datos");

	echo "Datos Cargados";
	echo "<br>";
	
	
	$query_info = "SELECT * FROM datos ORDER BY FECHA DESC limit 2";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	
	$HR1 = $ultima[0];
	$TDHT1 = 0.0 + $ultima[1];
	$TBMP1 = $ultima[2];
	$PABS1 = $ultima[3];
	$PREL1 = 0.00 + $ultima[4];
	$DIR1 = $ultima[5];
	$VEL1 = $ultima[6];
	$LLUV1 = $ultima[7];
	$FECHA1 = $ultima[8];
	
	for($i=0;$i<count($ultima);$i++)
	{
		echo $ultima[$i] . " ";
	}
	

	echo "<br>";
	
	$ultima = $info -> fetch_row();
	
	for($i=0;$i<count($ultima);$i++)
	{
		echo $ultima[$i] . " ";
	}

	$HR2 = $ultima[0];
	$TDHT2 = 0.0 + $ultima[1];
	$TBMP2 = $ultima[2];
	$PABS2 = $ultima[3];
	$PREL2 = 0.00 + $ultima[4];
	$DIR2 = $ultima[5];
	$VEL2 = $ultima[6];
	$LLUV2 = $ultima[7];
	$FECHA2 = $ultima[8];
	
	
	//Calculo lluvia dia
	$dia = date("Y-m-d");
    $query_info = "SELECT SUM(LLUVIA) FROM datos WHERE CAST(FECHA AS DATE) = '$dia'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$LLuviaDia = round($ultima[0],2);

	//Calculo LLuvia mes
	$ano = date("Y");
	$mes = date("m");
	$query_info = "SELECT SUM(LLUVIA) FROM datos WHERE YEAR(FECHA) = '$ano' AND MONTH(FECHA) = '$mes'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$LLuviaMes = round($ultima[0],2);
	
	//Calcula LLuvia Año
	$query_info = "SELECT SUM(LLUVIA) FROM datos WHERE YEAR(FECHA) = '$ano'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$LLuviaano = round($ultima[0],2);
	
	//Calcular Tmax y Tmin del dia
    $query_info = "SELECT MAX(TDHT) FROM datos WHERE CAST(FECHA AS DATE) = '$dia'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$Tmax = round($ultima[0],2);

	$query_info = "SELECT MIN(TDHT) FROM datos WHERE CAST(FECHA AS DATE) = '$dia'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$Tmin = round($ultima[0],2);
	
	
	
	//Calculo de ultima variacion de temperatura, presion y humedad
	$VarP = round($PREL1 - $PREL2,2);
	$VarT = round($TDHT1 - $TDHT2,2);
	$VarH = round($HR1 - $HR2,2);
	
	//Calculo punto de rocio actual y anterior
	$Procio = round((pow(($HR1/100),1/8) * (112 + (0.9 * $TDHT1)) + (0.1 * $TDHT1) - 112),2);
	$Procio2 = round((pow(($HR2/100),1/8) * (112 + (0.9 * $TDHT2)) + (0.1 * $TDHT2) - 112),2);
	$VarProcio = round($Procio - $Procio2,2);
	
	//Flecha del barometro :X
	$FlechaP = "1010.0";
	
	//Calculo promedio de direccion viento
	$query_info = "SELECT DIR FROM datos ORDER BY FECHA DESC limit 12";//hora
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$PromVientoaux = 0;
	do{
		$PromVientoaux = $PromVientoaux + round($ultima[0],2);	
	}while($ultima = $info -> fetch_row());
	
	$PromViento = $PromVientoaux / 4;	
	
	//Calcular Viento del dia maxima velocidad
    $query_info = "SELECT MAX(VEL) FROM datos WHERE CAST(FECHA AS DATE) = '$dia'";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$MaxViento = round($ultima[0],2);	
	
    //Calcular rafagas de ultima hora 
    $query_info = "SELECT VEL FROM datos ORDER BY FECHA DESC limit 12";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$Rafagas = 0;
	do{
		if($ultima[0]>$Rafagas)
		{
			$Rafagas = round($ultima[0],2);	
		}
	}while($ultima = $info -> fetch_row());
	
	
		
    //Calcular rafagas de ultimas 4 horas 
    $query_info = "SELECT VEL FROM datos ORDER BY FECHA DESC limit 48";
	$info = $Conn -> query($query_info);
	$ultima = $info -> fetch_row();
	$MRafaga = 0;
	do{
		if($ultima[0]>$MRafaga)
		{
			$MRafaga = round($ultima[0],2);	
		}
	}while($ultima = $info -> fetch_row());
	
	
	
	$sensasiontermica = "0";
	

	
	if($TDHT1>27)
	{
		$AlertCalor = $TDHT1;
	}else
	{
		$AlertCalor = 0;
	}

	
	$cadena = "0 " . $VarH . " " . $Rafagas . " " . $DIR1 . " " . $TDHT1 . " " . $HR1 . " " . $PREL1 . " " . $LLuviaDia . " " . $LLuviaMes . " " . $LLuviaano . " " . $LLUV1 . " 0 0 0 0 " . $VarProcio . " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " . $sensasiontermica . " 0 " . $Tmin . " " . $Tmax . " 0 0 " . $VarP . " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " . $MRafaga . " " . $Procio . " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " . $AlertCalor . " " . $MaxViento . " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 " . $FlechaP . " 0 0 0 0 0 0 0 0 0 0 0 " . $VarT . " 0 0 " . $PromViento . " 0 0 0 0 0 0 0 0 0 0 0 " . $VEL1 . " 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ";
	
	echo "<br><br>";
	
	echo $cadena;
			
	echo "<br><br>";
	
	
	$fp = fopen("../front/Dash/demodata/clientraw.txt","w");
	fputs($fp,$cadena);
	fclose($fp);

			
?>

