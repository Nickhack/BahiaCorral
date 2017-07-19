<script Defer>
//clock utc
!function(t,n,o){function e(){var t=new i;t.startClock()}function i(){this.time=""}o(function(){e()}),i.prototype={startClock:function(){var t=this;setInterval(this.updateClock.bind(this,t),500)},updateClock:function(t){var n=t.getTime();this.updateClockView(n)},updateClockView:function(t){for(var n=o(".clock-container>ul>li>span"),e=0;5>e;e++)n.eq(e).html(t[e])},getTime:function(){var t=new Date,n=t.getUTCHours(),o=t.getUTCMinutes(),e=t.getUTCSeconds(),i=this.convertHourByTimeZone(n);o=this.fixLayout(o),e=this.fixLayout(e);for(var r=[],u=0;5>u;u++){var c=i[u]+":"+o+":"+e;r.push(c)}return r},convertHourByTimeZone:function(t){for(var n=[<?php echo $UTC; ?>],o=[],e=0;5>e;e++){var i=t+n[e];i>=24?i-=24:0>i&&(i=24+i),o.push(i)}return o},fixLayout:function(t){return 10>t&&(t="0"+t),t}}}(window,document,window.jQuery);
<!-- 3 day forecast  for homeweather station --->
setTimeout(function() {
$(document).ready(function($){
getForecast();
function buildForecast(forecasts){
    if(typeof forecasts=='undefined'||forecasts.length===3){$("forecast").toggleClass("error");}
    else{
        $("#wuforecasts").html("");
        for(var i=0;i<forecasts.length;i++){
            var currentDay=forecasts[i];
            $("#wuforecasts").append("<div id='wuforecast'><h1 id='weekday'>"+currentDay.date.weekday+"  "+currentDay.date.day+"</h1><img id='icon' src='css/icons/"+currentDay.icon+".svg'></img>"+
                "<span style='color:RGBA(250, 145, 0, 1.00);font-size:12px;font-weight:bold;'> "+
<?php if ($weather["temp_units"] == 'C') { ?>
            currentDay.high.celsius+"°</span> | "+"<span style='color:#00adbc;font-size:12px;font-weight:bold;'> "+
                currentDay.low.celsius<?php
} else { ?>
            currentDay.high.fahrenheit+"°</span> | "+"<span style='color:#00adbc;font-size:12px;font-weight:bold;'> "+
                currentDay.low.fahrenheit<?php } ?>
                +"° "+"</span><br>"+"<span style='color:#00adbc;font-size:10px;font-family:Helvetica, Arial, sans-serif;font-weight:bold;'> "+
                currentDay.pop+"% <span style='font-size:9px;font-family:Helvetica, Arial;'> precip</span></span><span class='fgtext' style='padding-right:3px;font-size:10px;font-family:Helvetica, Arial, sans-serif;font-weight:normal;'><br> "+
                    <?php if ($weather["wind_units"] == 'km/h') {
                        echo 'currentDay.avewind.dir + " " + currentDay.maxwind.kph+" km/h ';
} elseif ($weather["wind_units"] == 'mph') {
    echo 'currentDay.avewind.dir + " " + currentDay.maxwind.mph+" mph ';
} elseif ($weather["wind_units"] == 'm/s') {
    echo ' Math.round(0.2777778 * currentDay.maxwind.kph * 100)/100 + " m/s ';
} elseif ($weather["wind_units"] == 'kts') {
    echo ' Math.round(0.5399568 * currentDay.maxwind.kph * 100)/100 + " kts ';
} ?><br><span style='color:#00adbc;padding-right:3px;font-size:11px;font-family:Helvetica, Arial, sans-serif;font-weight:bold;'>"+
            //currentDay.snow_allday.cm+" <span style='color:#00adbc;font-size:9px;font-family:Helvetica, Arial, sans-serif;'> cm <div class='wi wi-snowflake-cold'></div><div class='wi wi-snowflake-cold'></div>"
<?php if ($weather["rain_units"] == "mm") { ?>
            currentDay.qpf_allday.mm+" <span style='color:#00adbc;font-size:9px;font-family:Helvetica, Arial, sans-serif;'> mm<?php
} else { ?>
            currentDay.qpf_allday.in+" <span style='color:#00adbc;font-size:9px;font-family:Helvetica, Arial, sans-serif;'> in<?php } ?> <div class='wi wi-raindrop wi-rotate-45'></div>"
                );}}}
function scopedForecast(forecast){return _.reject(forecast,function(weather){});}
function getForecast(){$.ajax({cache:false,url:'jsondata/wuweatherupdate.txt',dataType:"json",success:function(json){var forecastData=json.forecast.simpleforecast.forecastday;var forecasts=scopedForecast(forecastData);buildForecast(forecasts);}});}
function getParameter(theParameter){var params=window.location.search.substr(1).split('&');for(var i=0;i<params.length;i++){var p=params[i].split('=');if(p[0]==theParameter){return decodeURIComponent(p[1]);}}return false;}
}); }, 1000);
//Tiempo Local
var refreshId;$(document).ready(function(){indoor()});function indoor(){$.ajax({cache:false,success:function(a){$("#indoor").html(a);<?php if ($indoorRefresh > 0) {
	echo 'setTimeout(indoor,' . 60000*$indoorRefresh.')';
} ?>},
  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
  type:"GET",url:"<?php 
  if ($indoor == true) {echo "indoor.php" ;}
  else {echo "optional.php"; }   
  ?>"})};
  
//notifications Lluvias
var refreshId;$(document).ready(function(){notification()});function notification(){$.ajax({cache:false,success:function(a){$("#notification").html(a);<?php if ($notifyRefresh > 0) {
    echo 'setTimeout(notification,' . 1000*$notifyRefresh.')';
} ?>},type:"GET",url:"notification.php"})};

//notifications Vientos
var refreshId;$(document).ready(function(){notification2()});function notification2(){$.ajax({cache:false,success:function(a){$("#notification2").html(a);<?php if ($notifyRefresh > 0) {
    echo 'setTimeout(notification2,' . 1000*$notifyRefresh.')';
} ?>},type:"GET",url:"notification2.php"})};

//Temperatura
var refreshId;$(document).ready(function(){temperature()});function temperature(){$.ajax({cache:false,success:function(a){$("#temperature").html(a);<?php if ($tempRefresh > 0) {
    echo 'setTimeout(temperature,' . 1000*$tempRefresh.')';
} ?>},type:"GET",url:"temperature.php"})};

// Velocidad del viento y Direccion
var refreshId;$(document).ready(function(){windspeed()});function windspeed(){$.ajax({cache:false,success:function(a){$("#windspeed").html(a);<?php if ($windSpeedRefresh > 0) {
    echo 'setTimeout(windspeed,' . 1000*$windSpeedRefresh.')';
} ?>},type:"GET",url:"windspeeddirection.php"})};     

//Presion
var refreshId;$(document).ready(function(){barometer()});function barometer(){$.ajax({cache:false,success:function(a){$("#barometer").html(a);<?php if ($baroRefresh > 0) {
    echo 'setTimeout(barometer,' . 1000*$baroRefresh.')';
} ?>},type:"GET",url:"barometer.php"})};

//Lluvias
var refreshId;$(document).ready(function(){rainfall()});function rainfall(){$.ajax({cache:false,success:function(a){$("#rainfall").html(a);<?php if ($rainRefresh > 0) {
    echo 'setTimeout(rainfall,' . 1000*$rainRefresh.')';
} ?>},type:"GET",url:"rainfall.php"})};

//puerto
var refreshId;$(document).ready(function(){puerto()});function puerto(){$.ajax({cache:false,success:function(a){$("#puerto").html(a);<?php if ($tempRefresh > 0) {
    echo 'setTimeout(puerto,' . 1000*$tempRefresh.')';
} ?>},type:"GET",url:"puerto.php"})};

//ioc
var refreshId;$(document).ready(function(){ioc()});function ioc(){$.ajax({cache:false,success:function(a){$("#ioc").html(a);<?php if ($tempRefresh > 0) {
    echo 'setTimeout(ioc,' . 1000*$tempRefresh.')';
} ?>},type:"GET",url:"ioc.php"})};

</script>