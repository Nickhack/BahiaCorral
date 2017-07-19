<?php include('livedata.php');
include('common.php');header('Content-type: text/html; charset=utf-8');

date_default_timezone_set($TZ);
  ?>

<body><?php echo str_replace("updatedtime", "updatedtimealert", getUpdatedString($weather["datetime"])); ?>
<div class="info"></div>
      <?php

 if(($weather["rain_units"] == 'mm' && $weather["rain_rate"] > $notifyFlooding) || ($weather["rain_units"] == 'in' && $weather["rain_rate"] > $notifyFlooding / 25.4)) {echo "<div class='homeweathernotify'>
   
  <br> 
  <img src='img/heavyrain.svg' width='35px'></img><hv>" . $weather["rain_rate"] . "</hv> ".$weather['rain_units']." per/hr ".$lang['Flooding']." </span><br>
  ";} 
  


  //rainrate
 else  if(($weather["rain_units"] == 'mm' && $weather["rain_rate"] > $notifyRainRate) || ($weather["rain_units"] == 'in' && $weather["rain_rate"] > $notifyRainRate / 25.4)) {echo "<div class='homeweathernotify'>
   
  <br> 
 <img src='img/heavyrain.svg' width='35px'></img><hv>" . $weather["rain_rate"] . "</hv> ".$weather['rain_units']." ".$lang['Rainratealert']." </span><br>
  ";} 
  
  
     
  //no cautions
 else  {
	echo '<div class="homeweathernotify">
	<br><br>
	<hvempty>'.  "Sin Alertas por Lluvias" . '</hvempty> 
	
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