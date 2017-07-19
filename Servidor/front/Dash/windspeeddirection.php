<?php
	include_once('livedata.php');
	include('common.php');
	header('Content-type: text/html; charset=utf-8');
?>
<style>/*<![CDATA[*/.thearrow2{-webkit-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-moz-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-o-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-ms-transform:rotate(<?php echo $weather["wind_direction"];?>deg);transform:rotate(<?php echo $weather["wind_direction"];?>deg);position:absolute;z-index:200;top:0;left:50%;margin-left:-5px;width:10px;height:50%;-webkit-transform-origin:50% 100%;-moz-transform-origin:50% 100%;-o-transform-origin:50% 100%;-ms-transform-origin:50% 100%;transform-origin:50% 100%;-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:after{content:'';position:absolute;left:50%;top:0;height:10px;width:10px;background-color:NONE;width:0;height:0;border-style:solid;border-width:14px 9px 0 9px;border-color:RGBA(255,121,58,1.00) transparent transparent transparent;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:before{content:'';width:6px;height:6px;position:absolute;z-index:9;left:2px;top:-5px;border:2px solid RGBA(255,255,255,0.8);-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%}/*]]>*/</style>
<?php 
	echo getUpdatedString($weather["datetime"]);
?>
	<div class="averagedir1">
		<?php
			if(array_key_exists("wind_direction_avg",$weather))
			{
				echo '<span2>',$lang['Avg'],'</span2>',$weather["wind_direction_avg"],'&deg;',' ';
			}
			if($weather["wind_direction_avg"]<12)
			{
				echo $lang['North'];
			}else if($weather["wind_direction_avg"]<57)
			{
				echo $lang['NNE'];
			}else if($weather["wind_direction_avg"]<79)
			{
				echo $lang['ENE'];
			}else if($weather["wind_direction_avg"]<102)
			{
				echo $lang['East'];
			}else if($weather["wind_direction_avg"]<124)
				{echo $lang['ESE'];
			}else if($weather["wind_direction_avg"]<147)
			{
				echo $lang['SE'];
			}else if($weather["wind_direction_avg"]<169)
			{
				echo $lang['SSE'];
			}else if($weather["wind_direction_avg"]<192)
			{
				echo $lang['South'];
			}else if($weather["wind_direction_avg"]<214)
			{
				echo $lang['SSW'];
			}else if($weather["wind_direction_avg"]<237)
			{
				echo $lang['SW'];
			}else if($weather["wind_direction_avg"]<259)
			{
				echo $lang['WSW'];
			}else if($weather["wind_direction_avg"]<282)
			{
				echo $lang['West'];
			}else if($weather["wind_direction_avg"]<304)
			{
				echo $lang['WNW'];
			}else if($weather["wind_direction_avg"]<327)
			{
				echo $lang['NW'];
			}else if($weather["wind_direction_avg"]<355)
			{
				echo $lang['NNW'];
			}
		?>
	</div>
<br />
<div class="windicons1">
	<?php
		echo $weather["wind_speed"]."</windgust> \n";
		if($weather["wind_speed"]*$toKnots==0)
		{
			echo "<img src='css/windspeed/wind0kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<2.5)
		{
			echo "<img src='css/windspeed/wind2kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<7.5)
		{
			echo "<img src='css/windspeed/wind7kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<12.5)
		{
			echo "<img src='css/windspeed/wind12kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<17.5)
		{
			echo "<img src='css/windspeed/wind17kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<22.5)
		{
			echo "<img src='css/windspeed/wind22kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<27.5)
		{
			echo "<img src='css/windspeed/wind27kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<32.5)
		{
			echo "<img src='css/windspeed/wind32kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<37.5)
		{
			echo "<img src='css/windspeed/wind37kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<42.5)
		{
			echo "<img src='css/windspeed/wind42kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<47.5)
		{
			echo "<img src='css/windspeed/wind47kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<52.5)
		{
			echo "<img src='css/windspeed/wind52kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<57.5)
		{
			echo "<img src='css/windspeed/wind57kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<62.5)
		{
			echo "<img src='css/windspeed/wind62kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<102.5)
		{
			echo "<img src='css/windspeed/wind102kts.svg' ></img>";
		}else if($weather["wind_speed"]*$toKnots<107.5)
		{
			echo "<img src='css/windspeed/wind107kts.svg' ></img>";
		}
	?>
</div>
<div class="beaufort1">
	<?php 
		if($weather["wind_speed"]*$toKnots<0.57)
		{
			echo '&nbsp;&nbsp;',$lang['Calm'];
		}else if($weather["wind_speed"]*$toKnots<2.99)
		{
			echo '&nbsp;',$lang['Lightair'];
		}else if($weather["wind_speed"]*$toKnots<6.42)
		{
			echo '&nbsp;',$lang['Lightbreeze'];
		}else if($weather["wind_speed"]*$toKnots<10.64)
		{
			echo '&nbsp;',$lang['Gentelbreeze'];
		}else if($weather["wind_speed"]*$toKnots<15.51)
		{
			echo '&nbsp;',$lang['Moderatebreeze'];
		}else if($weather["wind_speed"]*$toKnots<22.5)
		{
			echo '&nbsp;',$lang['Freshbreeze'];
		}else if($weather["wind_speed"]*$toKnots<26.93)
		{
			echo '&nbsp;',$lang['Strongbreeze'];
		}else if($weather["wind_speed"]*$toKnots<33.38)
		{
			echo '&nbsp;',$lang['Neargale'];
		}else if($weather["wind_speed"]*$toKnots<40.27)
		{
			echo '&nbsp;',$lang['Galeforce'];
		}else if($weather["wind_speed"]*$toKnots<47.58)
		{
			echo '&nbsp;',$lang['Stronggale'];
		}else if($weather["wind_speed"]*$toKnots<55.29)
		{
			echo '&nbsp;','&nbsp;',$lang['Storm'];
		}else if($weather["wind_speed"]*$toKnots<63.37)
		{
			echo '&nbsp;',$lang['Violentstorm'];
		}else
		{
			echo '&nbsp;',$lang['Hurricane'];
		}
	?>
</div>
<div class="windspeedvalues">
	<div class="windspeedvalue">
		<?php
			echo $weather["wind_speed"];
		?>
		<div class="windunitidspeed"><?php echo $weather["wind_units"];?> </div>
	</div>
	<div class="windgustvalue">
		<?php
			echo "";
			if($weather["wind_gust_speed"]*$toKnots>24.2981)
			{
				echo "<span style='color:#f26c4f;'>".$weather["wind_gust_speed"]."</span>";
			}else
				echo $weather["wind_gust_speed"];
		?>
		<div class="windunitidgust"><?php echo $weather["wind_units"];?> </div>
		</span>
	</div>
</div>
<?php
	if(array_key_exists("wind_speed_max",$weather))
	{
		?>
		<div class="windspeedtrend1">
			<?php 
				echo "<supmb>Max </supmb>"."<max>".$weather["wind_speed_max"]."</max>"."<supmb> ".$weather["wind_units"]."</supmb> ".$lang['Windspeed']."";
			?>
		</div>
		<div class="gustspeedtrend1">
			<?php 
				echo "<supmb>Max </supmb>"."<max>".$weather["wind_gust_speed_max"]."</max>"."<supmb> ".$weather["wind_units"]."</supmb> ".$lang['Gust']." ";
			?>
		</div>
		<?php
	}else if(array_key_exists("wind_speed_trend",$weather))
	{
		if($weather["wind_speed_trend"]<>0)
		{?>
			<div class="windspeedtrend1">
			<?php
				if($weather["wind_speed_trend"]>0)
					echo "+";
				echo $weather["wind_speed_trend"]."<supmb> "."<max>".$weather["wind_units"]."</max>"."</supmb> <br> ".$lang['Windspeed']."";
			?>
			</div>
			<?php
		}
		if($weather["wind_gust_speed_trend"]<>0)
		{
			?>
			<div class="gustspeedtrend1">
			<?php
				if($weather["wind_gust_speed_trend"]>0)
					echo "+";
				echo $weather["wind_gust_speed_trend"]."<supmb> "."<max>".$weather["wind_units"]."</max>"."</supmb> <br> ".$lang['Gust']." ";
			?>
			</div>
		<?php
		}
	}
?>

<div class="homeweathercompass1">
	<div class="homeweathercompass-line1">
		<div class="thearrow2"></div>
	</div>
	<div class="text1">
		<div class="windvalue1" id="windvalue">
		<?php
			echo $weather["wind_direction"];
		?>&deg;
		</div>
	</div>
	<div class="windirectiontext1">
		<?php
			if($weather["wind_direction"]<12)
			{
				echo $lang['Northdir'];
			}else if($weather["wind_direction"]<57)
			{
				echo $lang['NNEdir'];
			}else if($weather["wind_direction"]<79)
			{
				echo $lang['ENEdir'];
			}else if($weather["wind_direction"]<102)
			{
				echo $lang['Eastdir'];
			}else if($weather["wind_direction"]<124)
			{
				echo $lang['ESEdir'];
			}else if($weather["wind_direction"]<147)
			{
				echo $lang['SEdir'];
			}else if($weather["wind_direction"]<169)
			{
				echo $lang['SSEdir'];
			}else if($weather["wind_direction"]<192)
			{
				echo $lang['Southdir'];
			}else if($weather["wind_direction"]<214)
			{
				echo $lang['SSWdir'];
			}else if($weather["wind_direction"]<237)
			{
				echo $lang['SWdir'];
			}else if($weather["wind_direction"]<259)
			{
				echo $lang['WSWdir'];
			}else if($weather["wind_direction"]<282)
			{
				echo $lang['Westdir'];
			}else if($weather["wind_direction"]<304)
			{
				echo $lang['WNWdir'];
			}else if($weather["wind_direction"]<327)
			{
				echo $lang['NWdir'];
			}else if($weather["wind_direction"]<355)
			{
				echo $lang['NWNdir'];
			}else
			{
				echo $lang['Northdir'];
			}
		?>
	</div>
</div>