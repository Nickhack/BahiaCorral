<?php include('livedata.php');
include('common.php');header('Content-type: text/html; charset=utf-8');

date_default_timezone_set($TZ);
  ?>

<body><?php echo str_replace("updatedtime", "updatedtimealert", getUpdatedString($weather["datetime"])); ?>
<div class="info"></div>
      <?php

 //windgust 
 if($weather["wind_gust_speed"]*$toKnots > 24.2981) {echo "<div class='homeweathernotify'>
 
  <br> 
  <img src='img/windgust.svg' width='35px'></img> ".$lang['Windalert']." <hv> " . $weather["wind_gust_speed"] . " </hv><span>" . $weather["wind_units"]. " </span><br>
  ";}

   
     
  //no cautions
 else  {
	echo '<div class="homeweathernotify">
	<br><br>
	<hvempty>'.  "Sin Alertas por Viento" . '</hvempty> 
	
	';
}
  ?>
</div>
<div class="notificationinfo">
<svg id="i-info" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg>
<?php echo $lang ['WeatherStationNotifications']; ?> 
</div>