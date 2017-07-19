<?php include('livedata.php');
 include('common.php');header('Content-type: text/html; charset=utf-8');

echo '<div class="updatedtime"><span>Datos en Horario</span>' . "&nbsp;UTC" . '</div>';

	?>


<style>
.frame
{
    width: 1280px;
    height: 786px;
    border: 0;

    -ms-transform: scale(0.43);
    -moz-transform: scale(0.43);
    -o-transform: scale(0.43);
    -webkit-transform: scale(0.43);
    transform: scale(0.43);

    -ms-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
}
</style>

<div class="circleOut">
<br/>
<iframe class="frame" frameborder="0" frameborder="0" src="<?php print ("http://www.cona.cl/mareas/grafico.php?estacion=cor"); ?>" />

	
</div>