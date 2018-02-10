<?php
defined('BASEPATH') OR exit('No direct script access allowed');
foreach ($title as $value) {
	$title = $value->title;
}
$i=0;
foreach ($content as $c) {
	$section[$i]	= $c->section;
	$body[$i]		= $c->body;
	$colors[$i]		= $c->color;
	//separate #tags
	$bodyArray[$i] = explode("##",$body[$i]);
	$sizeArray[$i] = count($bodyArray[$i]);
	$i++;
}
?>
<div id="pagepiling">
	<?
	for($a=0;$a<$i;$a++){
		echo "<div class='section' id='section".$a."'>";
		echo "<div class='container'>";
		if(strlen($bodyArray[$a][0])>0):
			for($s=0;$s<$sizeArray[$a];$s++):
				echo "<p ";
				echo $a==0 ? "id='zero' class='firstContent'" : "";
				echo ">".$bodyArray[$a][$s]."</p>";
			endfor;
		else:
			echo "<p>".$body[$a]."</p>";
		endif;
		echo "</div>";
		echo "</div>";
		
	} 
	?>
</div>
