<?php 
  include_once('livedata.php');
  include('common.php');
  header('Content-type: text/html; charset=utf-8');
?>
<div class="average">
  <span><?php echo $lang['Rate'];?></span>
  <?php 
    echo number_format($weather["rain_rate"],1)."\n";
  ?>
  <span><?php echo "mm/h"."\n";?></span> 
</div>
<?php echo getUpdatedString($weather["datetime"]);?>
<div id="raincontainer1">
	<div id="beaker">
	  <div class="rainvalue" style="z-index:auto;mix-blend-mode:<?php if($theme=='dark')echo 'screen';else echo 'multiply';?>">
	  <?php 
	    echo $weather["rain_today"]." <span>".$weather["rain_units"]."</span>\n";
		if($weather["rain_today"]<0.01)
		{
		  echo '<div class=\'norain fade-in norain\'></div>';
		}else
		{
		  echo "<div class=\'raintext1\'><span>".$lang['Measured']." </span></div>";
		}
	  ?>
	  </div>
    </div>
	<div id="raintoday"></div>
</div>
<?php 
  if(array_key_exists("rain_month",$weather))
  {?> 
    <div class="maxrainfallmonth">
	  <div class="maxrainfallmonth-content">
	    <span class='fgtext' style='font-weight:700;font-size:11px;display:block'><?php echo strftime(" %b");?></span>
		<span style='color:#00adbc;font-weight:700;font-size:11px;line-height:13px;display:block'> <?php echo $weather["rain_month"];?>
		  <span style='font-size:9px;color:#00adbc;line-height:10px;display:block'> <?php echo $weather["rain_units"];?> &nbsp;<div class='wi wi-raindrop wi-rotate-45'></div>
		  </span>
		</span></span>
		<div class="maxrainfallyear">
		  <div class="maxrainfallyear-content">
		    <span class='fgtext' style='font-weight:700;font-size:11px;display:block'><?php echo date('Y');?></span>
			<span style='color:#00adbc;font-weight:700;font-size:11px;line-height:13px'> <?php echo $weather["rain_year"];?>
			  <span style='font-size:9px;color:#00adbc;line-height:10px;display:block'> <?php echo $weather["rain_units"];?> &nbsp;<div class='wi wi-raindrop wi-rotate-45'></div> </span>
			</span></span>
		  </div>
		</div>
	  </div>
	</div><?php 
  }
?>
<div>
<script defer="defer">/*<![CDATA[*/$(document).ready(function(){$("#raintoday").delay(0).animate({height:"<?php $multiplier=1.5;if($weather["rain_units"]=="in"){$multiplier*=25.4;}echo $weather["rain_today"] *$multiplier *2;?>pt"},200)});/*]]>*/</script>