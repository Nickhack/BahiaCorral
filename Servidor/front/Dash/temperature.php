<?php include('livedata.php');
 include('common.php');header('Content-type: text/html; charset=utf-8');

echo getUpdatedString($weather["datetime"]);
if (array_key_exists("temp_trend", $weather))
{
	?>
	<div class="averagetempoutside">
	<?php
		if ($weather["temp_trend"] > 0)
			echo '<svg id="i-chevron-top" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#FF793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
		<path d="M30 20 L16 8 2 20" />
		</svg>&nbsp;'  . number_format($weather["temp_trend"], 1) . "&deg;<span><br>".$lang['Trend']."</span>";
		else if ($weather["temp_trend"] < 0)
			echo '<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#00adbc" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
		<path d="M30 12 L16 24 2 12" />
		</svg>&nbsp; '. number_format($weather["temp_trend"], 1) . "&deg;<span><br> ".$lang['Trend']." </span>";?>
	</div>
	<div class="feelstemp">
	<?php 
	if ($fireriskshow == true)
	{
		echo '
		<svg version="1.1" id="Layer_1" x="0px" y="0px"
		 width="10px" height="10px" viewBox="224.419 99.761 584.098 771.733"
		 style="enable-background:new 224.419 99.761 584.098 771.733;" xml:space="preserve">
		<path style="fill:#ff8841;stroke:#ccc;stroke-width:0.0938;" d="M536.9,99.9c6.8,5.2,12.7,11.6,19.2,17.2
		c58.7,55.4,112.5,116.6,155.8,184.9c41.9,66.1,74.101,139.2,88.4,216.4c7.899,42.3,10.5,85.699,5.899,128.5
		C804.1,664.8,801,682.7,795.3,699.8c-8,24.8-18.5,48.9-32.9,70.7C750,789.3,734.5,806.1,716.6,819.7
		C696.9,834.6,674.4,845.5,651,853c-29.101,9.3-59.601,13.9-90,16.4c-36.301,2.699-72.801,3.199-109-1.4c-41-5.1-81.7-16-118.2-35.7
		c-33.8-18.2-63.5-44.899-82.6-78.5C229.1,715.4,221.8,669.9,225.3,626c3.6-46.5,18.4-91.6,38-133.7c17-36.2,37.8-70.5,60.899-103.1
		c19.7-27.6,40.9-54.1,64.101-78.9c0.399-0.3,1.2-1,1.7-1.3c-0.4,20.9,1.6,41.9,7.6,62c6.1,20.5,16.4,39.8,30.1,56.3
		c0.801,1,1.4,2.4,2.9,2.601c29.7-22.3,57.8-47.3,79.7-77.4C533,321.4,548.199,285,554,246.9C561.699,197.6,555.1,146.3,536.9,99.9z"
		/></svg> ' .$lang["Firerisk"] .'<risk> ' .  $firerisk ,'% </risk>' ;
	}//Basados en la temperatura de sensasion mostramos animacion
	else if(anyToC($weather["temp_feel"]) < -4) 
		{echo "<img src='img/colder.svg'  width='23px' height='23px'></img>" .$lang['FreezingCold'];}
	else  if(anyToC($weather["temp_feel"]) < 0) 
		{echo "<img src='img/colder.svg'  width='23px' height='23px'></img> " .$lang['FeelingVeryCold'];}
	else  if(anyToC($weather["temp_feel"]) < 8)
		{echo "<img src='img/colder.svg'  width='23px' height='23px'></img>" .$lang['FeelingCold'];}
	else  if(anyToC($weather["temp_feel"]) < 13)
		{echo "<img src='img/cooler.svg'  width='23px' height='23px'></img>" .$lang['FeelingCool'];}
	else  if(anyToC($weather["temp_feel"]) < 18)
		{echo "<img src='img/comfortable.svg'  width='23px' height='23px'></img>" .$lang['FeelingComfortable'];}
	else  if(anyToC($weather["temp_feel"]) < 23)
		{echo "<img src='img/comfortable.svg'  width='23px' height='23px'></img>" .$lang['FeelingWarm'];}
	else  if(anyToC($weather["temp_feel"]) < 28)
		{echo "<img src='img/humidity.svg'  width='23px' height='23px'></img> " .$lang['FeelingHot'];}
	else  if(anyToC($weather["temp_feel"]) < 32)
		{echo "<img src='img/humidity.svg'  width='23px' height='23px'></img> " .$lang['FeelingUncomfortable'];}
	else  if(anyToC($weather["temp_feel"]) < 36)
		{echo "<img src='img/humidity.svg'  width='23px' height='23px'></img> " .$lang['FeelingVeryHot'];}
	else  if(anyToC($weather["temp_feel"]) < 50)
		{echo "<img src='img/humidity.svg'  width='23px' height='23px'></img>" .$lang['FeelingExtremelyHot'];}  
	?>
	</div>
	<?php 
} ?>

<div class="tempcontainer">
	<div class="circleOut">
		<?php 

		function echo_tempcircle($class, $temperature)
		{
			global $theme;
			if ($theme == 'dark')
			{
				echo "<div class=\"temperaturecircle\"></div><div class=\"temptext" . $class . "\">" . $temperature . "<suptemp>&deg;</suptemp></div>";
			}
			elseif ($theme == 'color')
			{
				echo "<div class=\"temperaturecircle\"></div><div class=\"temptext" . $class . "\">" . $temperature . "<suptemp>&deg;</suptemp></div>";
			}
			
			else
			{
				echo "<div class=\"" . $class . "\"></div><div class=\"temptext\">" . $temperature . "<suptemp>&deg;</suptemp></div>";
			}
		}

		if(anyToC($weather["temp"])<2){echo_tempcircle("freezing", $weather["temp"]);}
		else if(anyToC($weather["temp"])<5){echo_tempcircle("cold", $weather["temp"]);}
		else if(anyToC($weather["temp"])<7){echo_tempcircle("gettingcolder", $weather["temp"]);}
		else if(anyToC($weather["temp"])<10){echo_tempcircle("colder", $weather["temp"]);}
		else if(anyToC($weather["temp"])<12){echo_tempcircle("cooler", $weather["temp"]);}
		else if(anyToC($weather["temp"])<15){echo_tempcircle("mild", $weather["temp"]);}
		else if(anyToC($weather["temp"])<18){echo_tempcircle("milder", $weather["temp"]);}
		else if(anyToC($weather["temp"])<20){echo_tempcircle("gettingcooler", $weather["temp"]);}
		else if(anyToC($weather["temp"])<23){echo_tempcircle("warm", $weather["temp"]);}
		else if(anyToC($weather["temp"])<25){echo_tempcircle("warmer", $weather["temp"]);}
		else if(anyToC($weather["temp"])<27){echo_tempcircle("hot", $weather["temp"]);}
		else if(anyToC($weather["temp"])<30){echo_tempcircle("hotter", $weather["temp"]);}
		else if(anyToC($weather["temp"])<35){echo_tempcircle("hotter", $weather["temp"]);}
		else if(anyToC($weather["temp"])<40){echo_tempcircle("veryhot", $weather["temp"]);}
		else {echo_tempcircle("extremehot", $weather["temp"]);}
		?>
	</div>
	<?php
	if (array_key_exists("temp_today_high", $weather))
	{
		?>
		<div class="max">
			<?php 
				echo $weather["temp_today_high"] . "&deg;\n";
			?>
			<span style="color:#ccc;line-height:0.7em;font-size:16px;vertical-align:middle;font-weight:bold;"> |</span>
			<?php
				echo $weather["temp_today_low"] . "&deg;\n";
			?>
		</div>
	<?php 
	} else 
	{
		?>
		<div class="max"> <?php echo $lang['Feelslike']?> <?php echo $weather["temp_feel"]; ?>&deg;</div>
	<?php
	} ?>

	<div class="temptrend">
		<span style="font-size:0px;margin-left:10px;">
		<?php echo $weather["temp_trend"] . " </span>\n";
			if ($weather["temp_trend"]<0)
			{
				echo '<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#009BAC" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M30 12 L16 24 2 12" />
				</svg> ','<trendmovementfalling>&nbsp;',$lang['Falling'],'</trendmovementfalling>' ;
			}
			elseif ($weather["temp_trend"]>0)
			{
				echo '<svg id="i-chevron-top" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#FF793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M30 20 L16 8 2 20" />
			</svg>' ,'<trendmovementrising>&nbsp;&nbsp;',$lang['Rising'] ,'</trendmovementrising>';
			}
			else 
				echo '<svg id="i-chevron-right" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#9ABA2F" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M12 30 L24 16 12 2" />
				</svg>', '<trendmovementsteady>&nbsp;',$lang['Steady'],'</trendmovementsteady>' ;
		?>
		</span>
	</div>
</div>

<div class="heatcircle">
	<div class="heatcircle-content">
	<?php 
		if($showFeelsLike)
		{
			echo $lang['Feelslike']," <br><span style='font-weight:700;color:#ff9350;'>" . $weather["temp_feel"] . "&deg;" . $weather["temp_units"];
			echo "</span>";
		}
		else
		{
			echo $lang['Tempfactors'] ," <br><span style='font-weight:700;color:#ee7159;'>" . $lang['Nocautions']  . "</span>";
		}
	?>
</div>

<div class="heatcircle-content">
	<?php 
		echo $lang['Humidity'] ;
	?>
	<br><humiditycolor><?php echo $weather["humidity"]; ?>%</humiditycolor>
	<?php
	if (array_key_exists("humidity_trend", $weather))
	{
		if ($weather["humidity_trend"] > 0)
		{
			echo '<svg id="i-chevron-top" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="#f26c4f" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
			<path d="M30 20 L16 8 2 20" />
			</svg>';
		}
		else if ($weather["humidity_trend"] < 0)
		{
			echo '<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="#00adbc" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
			<path d="M30 12 L16 24 2 12" />
			</svg>';
		}
		else
		{
			echo '<svg id="i-chevron-right" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
			<path d="M12 30 L24 16 12 2" />
			</svg>';
		}
	}
	?>
	</span>
</div>

<div class="heatcircle-content">
	<?php 
		echo $lang['Dewpoint'] ;
	?> 
	<br><span style="font-weight:700;color:#00adbc;"><?php echo $weather["dewpoint"] . "&deg;" . $weather["temp_units"];
	?> 
	<?php
		if (array_key_exists("dewpoint_trend", $weather))
		{
			if ($weather["dewpoint_trend"] > 0)
			{
				echo '<svg id="i-chevron-top" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="#f26c4f" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M30 20 L16 8 2 20" />
				</svg>';
			}
			else if ($weather["dewpoint_trend"] < 0)
			{
				echo '<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="#00adbc" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M30 12 L16 24 2 12" />
				</svg>';
			}
			else
			{
				echo '<svg id="i-chevron-right" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
				<path d="M12 30 L24 16 12 2" />
				</svg>';
			}
		}
	?></span>
</div>