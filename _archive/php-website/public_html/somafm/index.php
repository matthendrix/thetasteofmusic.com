<?php
define('CONFIG', 1);
require_once('inc.globals.php');

// echo date('D M  j H:i:s Y', strtotime('Fri Mar  1 00:00:24 2013')) ."<br>";
// echo 'Fri Mar  1 00:00:24 2013';
// exit;

if(!empty($_GET['action']) && $_GET['action'] == 'get-station' || 1==1) {
	$output = array();
	$result = $db->query("SELECT * FROM `soma_playlists` WHERE `station` = 'illstreet' ORDER BY `year` DESC, `month` DESC");	
	while($row = $db->fetch($result)) {
		$output[$row['year'] . $row['month']] = array(
			'year' => $row['year'],
			'month' => $row['month']
		);
	}
	_printr($output);
	exit;
	echo json_encode($output);
	exit;
}



if(!empty($_GET['action']) && $_GET['action'] == 'get-stationz') {
	$output = array();
	$result = $db->query("SELECT * FROM `soma_playlist` WHERE `station` = 'illstreet' ORDER BY `date` DESC LIMIT 100");
	while($row = $db->fetch($result)) {
		$output[$row['id']] = array(
			'id' => $row['id'],
			'station' => $row['station'],
			'date' => $row['date'],
			'num_listeners' => $row['num_listeners'],
			'artist' => $row['artist'],
			'song' => $row['song'],
			'album' => $row['album']
		);
	}
	echo json_encode($output);
	exit;
}

//get stations
$stations = array();
$result = $db->query("SELECT `id`, `station` FROM `soma_playlists` GROUP BY `station` ORDER BY `station` ASC");
while($row = $db->fetch($result)) {
	$stations[$row['id']] = $row['station'];
}
// _printr($stations);
// exit;

?><!doctype html>
<html class="no-js" lang="en">
	<!--
	SomaFM
	-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SomaFM Plylists - thetasteofmusic.com</title>
	<link rel="apple-touch-icon" sizes="57x57" href="/somafm/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/somafm/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/somafm/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/somafm/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/somafm/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/somafm/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/somafm/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/somafm/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/somafm/img/favicons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/somafm/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/somafm/img/favicons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="/somafm/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/somafm/img/favicons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/somafm/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/somafm/img/favicons/manifest.json">
	<link rel="shortcut icon" href="/somafm/img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-TileImage" content="/somafm/img/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="/somafm/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<meta name="application-name" content="SomaFM-TheTasteOfMusic">
	<?php include('inc.html.meta-head.php'); ?>
	<style>
		body {
			/* ...and soul */
		}
		ul.wall {
			list-style-type:none;
			margin:0 auto;
			padding:0;
		}
		ul.wall li {
			float:left;
		}		
		ul.wall a {
			background:#000;
			display:block;
			outline:none;
			position:relative;
		}
		ul.wall img {
			height:auto;
			width:100%;
			-webkit-transition: opacity 400ms ease;
			transition: opacity 1.4s ease-out;
		}
		ul.wall div {
			background:rgba(0,0,0, 0.7);
			bottom:0;
			color:#fff;
			padding:0.25em;
			position:absolute;
			left:0;
			width:100%;
		}
		ul.wall div span {
			display:block;
			line-height:1.2;
			text-shadow:0 0 15px #000;
		}
		ul.wall div span:last-child {
			font-size:0.8em;
		}
		
		@media only screen and (max-width:20em) { /* max-width 320px, mobile-only styles */
			ul.wall li {
				width:100%;
			}			
		}		
		@media only screen and (max-width:40em) { /* max-width 640px, mobile-only styles */
			ul.wall li {
				width:50%;
			}			
		}
		@media only screen and (min-width: 40.063em) { /* min-width 641px, > mobile screens */
			ul.wall li {
				width:25%;
			}		
		}
		@media only screen and (min-width : 768px) and (max-width : 1024px) and (orientation : landscape) { /* iPad in landscape */
			ul.wall li {
				width:20%;
			}		
		}
		@media only screen and (min-width: 64.063em) { /* min-width 1025px, >= large screens */
			ul.wall li {
				width:12.5%;
			}		
		}
		@media only screen and (min-width: 90.063em) { /* min-width 1441px, xlarge screens */
			ul.wall li {
				width:12.5%;
			}		
		}
		@media only screen and (min-width: 120.063em) { /* min-width 1921px, xxlarge screens */
			ul.wall li {
				width:10%;
			}		
		}
		
		ul.wall {
			bottom:100%;
			-webkit-transition: bottom 400ms ease;
			transition: bottom 0.2s ease;
		}		
		
		ul.wall.scrub {
			background:rgba(0,0,0,1);
			bottom:0;
			box-shadow:0 -32px 32px rgba(50, 50, 50, 0.2);
			height:30%;
			overflow-x:scroll;
			position:fixed;
			width:100%;
			white-space:nowrap;
		}
		ul.wall.scrub li {
			display:inline-block;
			float:none;
		}
		ul.wall.scrub li a {
			-webkit-transition: 300ms ease-out;
			transition: opacity 300ms ease-out;
			opacity:0.5;
		}
		ul.wall.scrub li div {
			white-space:normal;
		}
		ul.wall.scrub li.active {
		}
		ul.wall.scrub li.active div {
			background:rgba(0,0,0, 0.9);
		}
		ul.wall.scrub li.active a {
			opacity:1;
		}
		
		#persona {
			background:#000 url('img/loading-1.gif') no-repeat center center;
			color:#ddd;
			display:none;
			height:70%;
			padding:2em;
			position:relative;
		}		
		#persona iframe.video {
			border:none;
			height:80%;
			width:100%;
		}
		#persona div.critique {
			margin:0 auto;
			max-width:62.5em;
		}
		
		#persona a.close {
			color:#eee;
			font-size:2em;
			position:absolute;
			right:0.25em;
			top:0;
		}
	</style>
</head>
<body>
	
	<?php //include('inc.html.header.php'); ?>
	
	<div id='persona'>
		<!--
		<div class='critique'>
			<h2>Header Level 2</h2>	       
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
			<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
		</div>
		-->
		<a href='#' class='close'>&times;</a>
	</div>
	
	<ul class='wall clearfix'>
		<?php
			$i = 0;
			foreach($stations AS $key => $val) {
				echo"<li><a href='#$key' data-station='". htmlspecialchars($val, ENT_QUOTES) ."' data-idx='$i'><img src='coverart/". $val .".jpg' alt=''><!--<div><span>History Listen</span>\n<span>Listen</span></div>--></a></li>";
				$i++;
			}
		?>
	</ul>
	
	<audio id='bg-audio' loop preload='auto'>
		<source src="/audio/vinyl-21.mp3" type="audio/mpeg">
	</audio> 

	<?php include('inc.html.footer.php'); ?>
	<script src="/js/vendor/jquery.mousewheel.min.js"></script>
	
	<script>
		// https://developers.google.com/youtube/iframe_api_reference
		// http://www.w3schools.com/tags/ref_av_dom.asp

	
		$(document).ready(function() {
			var ul = $('ul.wall'),
				li = ul.find('li'),
				a = ul.find('a'),
				persona = $('#persona'),
				personaClose = persona.find('a.close'),
				ulActive = false,
				hash = window.location.hash;
			
			$('body').on('mousewheel', 'ul.wall.scrub', function(event) {
				// console.log(event.deltaX, event.deltaY, event.deltaFactor);
				this.scrollLeft -= event.deltaY * (event.deltaFactor * 2);
				event.preventDefault();
			});
			
			a.on('click', function(e){
				li.removeClass('active');
				$(this).parents('li').addClass('active');
				if(!ulActive) {
					var liWidth = li.width();
					ul.css('height', li.height() + 20 +'px').addClass('scrub');
					ul.scrollLeft(Math.floor(
						(liWidth * $(this).data('idx')) - ($('body').width() / 2) + (liWidth / 2)
					));
					persona.show();
				}				
				// iframe = $("<iframe class='video' src='//www.youtube-nocookie.com/embed/"+ $(this).data('embed') +"?autoplay=1&controls=1&loop=0&rel=0&showinfo=0&autohide=1&wmode=transparent&hd=1' allowfullscreen></iframe>").prependTo(persona);
				// .prependTo(persona);
				
				var jqxhr = $.ajax('index.php?action=get-station')
				.done(function(data) {
					cl(data);
					// persona.html(data)
				})
				.fail(function() {
					cl( "error" );
				})
				.always(function() {
					cl( "complete" );
				});
  
				
				ulActive = true;
				return false;
			});
			
			personaClose.on('click', function(){
				ulActive = false;
				persona.hide();
				ul.removeClass('scrub').css('height', 'auto');
			});
			
			// cl($.cache());
		});
		
		$(window).load(function() {
			//location
			if(window.location.hash.length) {
				$('ul.wall').find('a[href="'+ window.location.hash +'"]').trigger('click');
			}
		});
	</script>
	<?php if(SERVER != 'dev') { ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-68064-26', 'auto');
	  // ga('require', 'displayfeatures');
	  ga('send', 'pageview');
	</script>
	<?php } ?>
</body>
</html>