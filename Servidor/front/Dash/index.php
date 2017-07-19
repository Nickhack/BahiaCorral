<?php include('livedata.php');
include('common.php');
include('settings1.php');header('Content-type: text/html; charset=iso-8859-1');
date_default_timezone_set($TZ);?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $stationlocation; ?> Estacion Meteorologica</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	
<link href="css/main.<?php echo $theme; ?>.css?v=3.6" rel="stylesheet prefetch">
<script src="js/jquery.js"></script>
</head>
<body>
<BODY BACKGROUND=fondo.jpeg>

<!--Fila 0-->
<div class="weather2-container">
  <!--Cuadro 1-->
  <div class="weather2-alert">
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" /></svg> <?php echo " Alertas de lluvia";?> <span style="color:#fff;"></span>
    <div class="indoorvalues">
      <div id="notification" ></div>
	</div>
    <div class="alerttopicons">
      <svg width="16" height="16" viewBox="0 0 100 100">
      <path fill="#fff" stroke="#fff" d="M91.17 81.374l.006-.004-.139-.24c-.068-.128-.134-.257-.216-.375l-37.69-65.283c-.611-1.109-1.776-1.87-3.133-1.87-1.47 0-2.731.887-3.285 2.153l-.004-.002L9.312 80.529l.036.021a3.553 3.553 0 0 0-.82 2.257 3.59 3.59 0 0 0 3.588 3.59h75.767a3.59 3.59 0 0 0 3.589-3.589c0-.511-.11-.994-.302-1.434zm-41.135-1.757c-2.874 0-5.201-2.257-5.201-5.13 0-2.874 2.326-5.2 5.201-5.2 2.803 0 5.13 2.325 5.13 5.2a5.123 5.123 0 0 1-5.13 5.13zm5.13-45.367v28.299h-.002l.002.016c0 1.173-.95 2.094-2.094 2.094l-.014-.001v.001h-6.093c-1.174 0-2.123-.921-2.123-2.094l.002-.016h-.002V34.326c-.001-.026-.008-.051-.008-.077 0-1.117.865-1.996 1.935-2.078v-.016h6.288v.001c1.149.007 2.074.897 2.103 2.039h.005v.055h.001z"/></svg>
    </div>
  </div>
  <!--Cuadro 2-->   
  <div class="weather2-clock">
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
    </svg> <?php echo $lang['Localtime'];?><br>
    <div class="clock-container">
      <span style="position:absolute;margin-left:30px;font-size:10px;margin-top:-25px;text-transform:uppercase;">
               <?php echo strftime(" %a %b") ,date(" jS Y") ;?></span>
               <ul> <li><span></span></li></ul>
	</div>
           
    <div class="alerttopicons">
      <svg width="16" height="16" viewBox="0 0 64 64"><g>
      <path fill="none" stroke="#fff" stroke-width="5" d="M 59.125,32 A 27.0625,27 0 1 1 5,32 27.0625,27 0 1 1 59.125,32 z" />
      <path fill="none" stroke="#fff" stroke-width="5" stroke-linecap="square" d="m 32.0625,32 0,-17.645625"/>
      <path fill="none" stroke="#fff" stroke-width="5" stroke-linecap="square" d="m 45.556603,31.84375 -13.337853,0"/></g>
      </svg>
    </div>
  </div>
  <!--Cuadro 3-->  
  <div class="weather2-alert">
    <svg id="i-info2" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" /></svg> <?php echo "Alertas de Vientos";?> <span style="color:#fff;"></span>
    <div class="indoorvalues">
      <div id="notification2" ></div>
	</div>
    <div class="alerttopicons">
      <svg width="16" height="16" viewBox="0 0 100 100">
        <path fill="#fff" stroke="#fff" d="M91.17 81.374l.006-.004-.139-.24c-.068-.128-.134-.257-.216-.375l-37.69-65.283c-.611-1.109-1.776-1.87-3.133-1.87-1.47 0-2.731.887-3.285 2.153l-.004-.002L9.312 80.529l.036.021a3.553 3.553 0 0 0-.82 2.257 3.59 3.59 0 0 0 3.588 3.59h75.767a3.59 3.59 0 0 0 3.589-3.589c0-.511-.11-.994-.302-1.434zm-41.135-1.757c-2.874 0-5.201-2.257-5.201-5.13 0-2.874 2.326-5.2 5.201-5.2 2.803 0 5.13 2.325 5.13 5.2a5.123 5.123 0 0 1-5.13 5.13zm5.13-45.367v28.299h-.002l.002.016c0 1.173-.95 2.094-2.094 2.094l-.014-.001v.001h-6.093c-1.174 0-2.123-.921-2.123-2.094l.002-.016h-.002V34.326c-.001-.026-.008-.051-.008-.077 0-1.117.865-1.996 1.935-2.078v-.016h6.288v.001c1.149.007 2.074.897 2.103 2.039h.005v.055h.001z"/></svg>
    </div>
  </div>
</div>

<!--Fila 1-->
<div class="weather-container">
  <!--Cuadro 1-->
  <div class="weather-item">
    <div class="chartforecast">
         <a href="chartswu/yearrainfall.php" data-featherlight="iframe" ><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo date('Y');?></span> </a>
         <a href="chartswu/monthrainfall.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo strftime(" %b") ;?></span> </a>
         <a href="chartswu/todayrainfall.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo $lang['Today']; ?></span> </a>
    </div>
    <span class='fgtext' style="font-size:11px;font-weight:bold;text-transform:uppercase"><?php echo 'Pluviometría'; ?></span><br />
   
    <div id="rainfall"></div>
  </div>
  <!--Cuadro 2-->
  <div class="weather-item">
    <div class="chartforecast">
         <a href="chartswu/yeartemperature.php" data-featherlight="iframe" >
         <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg>
            <?php echo date('Y');?></span> </a>
         <a href="chartswu/monthtemperature.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo strftime(" %b") ;?></span> </a>
         <a href="chartswu/todaytemperature.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo $lang['Today']; ?></span> </a>
    </div>
      <span class='fgtext' style="font-size:11px;font-weight:bold;text-transform:uppercase"> <?php echo $lang['Temperature']; ?> <span class="fgcontrast"><?php echo "&deg;" . $weather["temp_units"] . " \n";?></span><br /></span>
   
    <div id="temperature"></div><br>
  </div>
  <!--Cuadro 3-->
  <div class="weather-item">
    <div class="chartforecast">
         <a href="chartswu/yearwindspeedgust.php" data-featherlight="iframe" ><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo date('Y');?></span> </a>
         <a href="chartswu/monthwindspeedgust.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo strftime(" %b") ;?></span> </a>
         <a href="chartswu/todaywindspeedgust.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo $lang['Today']; ?></span> </a>
    </div>
    <span class='fgtext' style="font-size:11px;font-weight:bold;text-transform:uppercase"><?php echo $lang['Windspeed'] ;?> | <?php echo $lang['Gust'] ;?></span><br />
          
    <div id="windspeed">Collecting Wind Speed</div>
  </div>
</div>
<!--Fila 2-->
<div class="weather-container">
  <!--Cuadro 1-->
  <div class="weather-item">
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" /></svg> <?php echo " Informacion Puerto";?> <span style="color:#fff;"></span>
    <div id="puerto">Recolectando Informacion</div><br>
  </div>
  
  
  
  <!--Cuadro 2-->
  <div class="weather-item" align=center>
    <div class="chartforecast">
         <a href="chartswu/yearbarometer.php" data-featherlight="iframe" ><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo date('Y');?></span> </a>
         <a href="chartswu/monthbarometer.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo strftime(" %b") ;?></span> </a>
         <a href="chartswu/todaybarometer.php" data-featherlight="iframe" style="margin-left:20px;text-transform:uppercase !important;"><svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo $lang['Today']; ?></span> </a>
      </div>
    <span class='fgtext' style="font-size:11px;font-weight:bold;text-transform:uppercase"><?php echo $lang['Barometer']; ?>   </span><br />
  
    <div id="barometer"></div>
  </div>
  <!--Cuadro 3-->
  <div class="weather-item">
  
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" /></svg> <?php echo " IOC - Nivel del Mar ";?><br/> <span style="color:#fff;"></span>
	
	<div id="ioc">Recolectando Informacion</div><br>
  </div>
</div>

<!--Pie de Pagina-->
<div class="weatherfooter-container">
  <div class="weatherfooter-item">
    <div class="cclicencelogo"><a href="cclicence/info.php" data-featherlight="iframe" title=" Creative Commons License">
      <?php  
	  if ($https == 'yes') {
	    echo '<img src="img/ssl.svg">';
      } else {
	    echo '<img src="img/cclicence.svg">';
      }?></a>
    </div>
    
	<div class="designedby">Diseñado por <a href="http://54.186.50.8" title="Fernando">Fernando Jaramillo </a> </div>
    <div class="footertext"><svg id="i-location" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <circle cx="16" cy="11" r="4" /> <path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" /></svg>&nbsp; <?php echo 'Ubicacion';?> :&nbsp; <a href="https://www.google.cl/maps/place/39°53'14.8S+73°25'40.1W" title="Mapa Ubicacion" target="_blank"> <?php echo "${lat} \n"; ?>&nbsp; <?php echo "${lon} \n"; ?> </a> &nbsp; &nbsp;<svg id="i-info" viewBox="0 0 32 32" width="8" height="8" fill="#88B04B" stroke="#88B04B" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <path d="M16 14 L16 23 M16 8 L16 10" /> <circle cx="16" cy="16" r="14" /></svg> &nbsp; Elevacion:  <?php echo "${elevation} \n"; ?> &nbsp; <svg id="i-info" viewBox="0 0 32 32" width="8" height="8" fill="#EE793A" stroke="#EE793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <path d="M16 14 L16 23 M16 8 L16 10" /> <circle cx="16" cy="16" r="14" /></svg> &nbsp; Fuente de Datos:  <?php echo "Multiples \n"; ?> &nbsp; <svg id="i-info" viewBox="0 0 32 32" width="8" height="8" fill="#00A4B4" stroke="#00A4B4" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <path d="M16 14 L16 23 M16 8 L16 10" /> <circle cx="16" cy="16" r="14" /></svg> &nbsp; Dispositivo: <?php echo "${hardware} \n"; ?> </div>
    <div class="footertext"></div>
    <div class="footertext"><svg id="i-info" viewBox="0 0 32 32" width="8" height="8" fill="#88B04B" stroke="#88B04B" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <path d="M16 14 L16 23 M16 8 L16 10" /> <circle cx="16" cy="16" r="14" /></svg>&nbsp; <?php echo $personalmessage ;?></div>
    <!-- load contact form--->
    <div id="contact" class="c"><a href="contactform/contactform.php" data-featherlight="iframe" class="cl"> <svg id="i-mail" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%"> <path d="M2 26 L30 26 30 6 2 6 Z M2 6 L16 16 30 6" /></svg></a> </div>
  </div>
</div>


<script DEFER src="js/combi.js" ></script>

<!--cron jobs no longer required this script automates the update every 30 minutes-->
<div id="blank" style="display:none;"></div>

<script DEFER type="text/livescript">
 //update the charts,eq,forecast data and current conditions//
  var refreshId;$(document).ready(function(){stationcron()});function stationcron(){$.ajax({cache:false,
  success:function(a){$("#blank")
  .html(a);<?php if ($wuupdate > 0) {
  echo 'setTimeout(stationcron,' . 1000*$wuupdate.')';}?>},
  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
  type:"GET",url:"jsondata/wuupdate.php"})};
</script>   

<?php include('updater.php');?>

</body>
   
</html>