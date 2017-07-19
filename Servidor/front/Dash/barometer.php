<?php 
	include_once('livedata.php');
	include('common.php');
	header('Content-type: text/html; charset=utf-8');
	echo getUpdatedString($weather["datetime"]);
	if(array_key_exists("barometer_trend",$weather))
	{
		if($weather["barometer_trend"]!=0)
		{
			$decimalPlaces=2;
			if($pressureunit!="inHg")
			{
				$decimalPlaces=1;
			}
			echo "<div class='barometertrend1'>\n";
			if($weather ["barometer_trend"]>0)
			{
				echo '<svg id="i-caret-top" viewBox="0 0 32 32" width="10" height="10" fill="#FF9350" stroke="#FF9350" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M30 22 L16 6 2 22 Z" /></svg>&nbsp;';
			}
			if($weather ["barometer_trend"]<0)
			{
				echo '<svg id="i-caret-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#009BAC" stroke="#009BAC" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M30 10 L16 26 2 10 Z" /></svg>&nbsp;';
			}
			echo number_format($weather["barometer_trend"],2)." <supmb>".$weather["barometer_units"]."</supmb> <br><hourtrend>".$lang['Trend']."</hourtrend></div>";
		}
	}
?>
<div id="circularGaugeContainer" style="height:150px"></div>
<div class="barometertrend"><span style='font-size:0px;color:#ccc'>
<?php
	echo $weather["barometer_trend"],"</span><falling>";
	if($weather["barometer_trend"]<0)
	{
		echo $lang['Falling'].'<falling></falling><span style="color:#00adbc;">
		<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#00adbc" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%"><path d="M30 12 L16 24 2 12" /></svg></span>';
	}
	else if($weather["barometer_trend"]>0)
	{
		echo $lang['Rising'].'<rising></rising><span style="color:#F75C46;">
		<svg id="i-chevron-top" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#FF793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%"><path d="M30 20 L16 8 2 20" /></svg></span>';
	}
	else
		echo '<span style="color:#9ABA2F;">'.$lang['Trend'].'	<svg id="i-chevron-right" viewBox="0 0 32 32" width="8" height="8" fill="none" stroke="#9ABA2F" stroke-linecap="round" stroke-linejoin="round" stroke-width="10%">
		<path d="M12 30 L24 16 12 2" /></svg></span>
		<steady>'.$lang['Steady'].'</steady>';
		$colorabove='rgba(0,0,0,0.5)';
		$colormajortick='rgba(255,255,0,0.1)';
		$colorfont='';
		if($theme=='dark')
		{
			$colorabove='rgba(95,96,97,1)';
			$colormajortick='rgba(255,255,255,0)';
			$colorfont=',color:"#aaa"';
		}
		if($theme=='color')
		{
			$colorabove='rgba(95,96,97,1)';
			$colormajortick='rgba(255,255,255,0)';
			$colorfont=',color:"#aaa"';
		}
		$baroStart=960;
		$baroEnd=1050;
		$tickInterval=10;
		$minorTickInterval=5;
		if($weather["barometer_units"]=="inHg")
		{
			$baroStart=28;
			$baroEnd=31;
			$tickInterval=0.5;
			$minorTickInterval=0.25;
		}
?></span>
</div>
<div class="h2mbvalue">
<?php 
	echo $weather["barometer"];
?>
<supunit><?php echo $weather["barometer_units"];?></supunit>
<script defer="defer">/*<![CDATA[*/$("#circularGaugeContainer").dxCircularGauge({rangeContainer:{width:8,offset:-2,ranges:[{startValue:<?php echo $baroStart;?>,endValue:<?php print $weather["barometer"]."\n";?>,color:'#<?php if($theme=='color')echo "516376";if($theme=='dark')echo "516376";if($theme=='light')echo "00adbc";?>'},{startValue:<?php print $weather["barometer"]."\n";?>,endValue:<?php echo $baroEnd;?>,color:'<?php if($theme=='color')echo "rgba(95,96,97,0.5)";if($theme=='dark')echo "rgba(95,96,97,0.5)";if($theme=='light')echo "#777";?>'},{startValue:<?php print $weather["barometer_trend"]."\n";?>,endValue:<?php print $weather["barometer_max"]."\n";?>,color:'<?php if($theme=='color')echo "rgba(95,96,97,0.5)";if($theme=='dark')echo "rgba(95,96,97,0.5)";if($theme=='light')echo "#f26c4f";?>'},{startValue:<?php print $weather["barometer"]."\n";?>,endValue:<?php print $weather["barometer_max"]."\n";?>,color:'#<?php if($theme=='color')echo "516376";if($theme=='dark')echo "516376";if($theme=='light')echo "0B717A";?>'},]},scale:{startValue:<?php echo $baroStart;?>,endValue:<?php echo $baroEnd;?>,majorTick:{tickInterval:<?php echo $tickInterval;?>,visible:true,color:'<?php echo $colormajortick;?>'},minorTick:{color:'rgba(102,161,168,0)',visible:true,minorTickInterval:<?php echo $minorTickInterval;?>,},label:{format:'',font:{size:10<?php echo $colorfont;?>},}},valueIndicator:{type:'TriangleNeedle',color:'#999',secondColor:'#fff',width:5,offset:-10,},value:<?php print $weather["barometer"]?>,subvalues:<?php if(array_key_exists("barometer_max",$weather)&&$weather["barometer_max"]>0)echo $weather["barometer_max"];else echo $weather["barometer"];?>,color:'rgba(255,255,255,1)',subvalueIndicator:{type:'triangleMarker',color:'#<?php if($theme=='color')echo "8EB42C";if($theme=='dark')echo "8EB42C";if($theme=='light')echo "ccc";?>',space:0,length:10,width:10,offset:0,},});/*]]>*/</script><!--20-March-2017 HOMEWEATHERSTATION -->