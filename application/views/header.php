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
	$i++;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$title?></title>
	<meta property="og:title" content="Portfolio <?=$title?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.sejan.is-great.org/" />
	<meta property="og:image" content="https://s19.postimg.org/e1pc4i8fn/Screenshot_297.png" />
	<meta property="og:description" content="Porfolio template made with CodeIgniter"/> 
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Portfolio <?=$title?>">
	<meta itemprop="description" content="This is the page description">
	<meta itemprop="image" content="https://s19.postimg.org/e1pc4i8fn/Screenshot_297.png">
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@publisher_handle">
	<meta name="twitter:title" content="Portfolio <?=$title?>">
	<meta name="twitter:description" content="Porfolio template made with CodeIgniter">
	<meta name="twitter:creator" content="@author_handle">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="https://s19.postimg.org/e1pc4i8fn/Screenshot_297.png">
	<!-- Open Graph data -->
	<meta property="og:title" content="Portfolio <?=$title?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.sejan.is-great.org/" />
	<meta property="og:image" content="https://s19.postimg.org/e1pc4i8fn/Screenshot_297.png" />
	<meta property="og:description" content="Porfolio template made with CodeIgniter" />
	<meta property="og:site_name" content="Portfolio <?=$title?>" />
	<meta property="article:section" content="Website" />
	<meta property="article:tag" content="about,portfolio,it,cse,engineer,showcase,aboutmeg" />
	<meta name="author" content="S.M. Mominul Haque" />
	<meta name="description" content="Porfolio template made with CodeIgniter" />
	<meta name="keywords"  content="about,portfolio,it,cse,engineer,showcase,aboutme" />
	<meta name="Resource-type" content="Document" />
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
	<link rel="stylesheet" href="assets/css/combined.css" media="screen"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.4/jquery.pagepiling.min.js" async></script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		var sections = <?=json_encode($section)?>;
		var colors = <?=json_encode($colors)?>;
		$('#pagepiling').pagepiling({
			direction: 'horizontal',
			menu: '#menu',
			anchors: sections,
			sectionsColor: colors,
			loopTop: true,
			loopBottom: true,
			navigation: {
				'position': 'right'
			},
			afterRender: function(){
				$('#pp-nav').addClass('custom');
			},
			afterLoad: function(anchorLink, index){
				if(index>1){
					$('#pp-nav').removeClass('custom');
				}else{
					$('#pp-nav').addClass('custom');
				}
			}
		});
		//adding css to images
		$('p > img').addClass('my_image');
	});
	</script>
	<link rel="icon" type="image/x-icon" href="assets/images/fav.ico">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" data-toggle="collapse" data-target=".navbar-collapse.in">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul id="menu">
					<li><a href="<?=base_url()?>"><?=$title?></a></li>
					<?
					for($a=0;$a<$i;$a++){?>
						<li data-menuanchor="<?=$section[$a]?>" class="<?=$a==0?'active':''?>"><a class="page-scroll" href="#<?=$section[$a]?>"><?=$section[$a]?></a></li>
					<?	}
					?>
				</ul>
			</div>
		</div>
	</nav>