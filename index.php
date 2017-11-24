<?php
define('CONFIG', 1);
require_once('inc.globals.php');


$artists = array(
	'miles-davis' => array(
		'artist' => 'Miles Davis',
		'song' => 'Blue In Green',
		'embed' => 'PoPL7BExSQU'
	),
	'brian-wilson' => array(
		'artist' => 'Brian Wilson',
		'song' => 'Let\'s Go Away for Awhile',
		'embed' => 'iu67G0xOfTY'
	),
	'john-lennon' => array(
		'artist' => 'John Lennon',
		'song' => 'God',
		'embed' => 'nZ5PQppudHc'
	),
	'kate-bush' => array(
		'artist' => 'Kate Bush',
		'song' => 'Sunset',
		'embed' => 'pOseQL6mpIg'
	),
	'lou-reed' => array(
		'artist' => 'Lou Reed',
		'song' => 'Perfect Day',
		'embed' => '9wxI4KK9ZYo'
	),
	'david-bowie' => array(
		'artist' => 'David Bowie',
		'song' => 'Heroes (live)',
		'embed' => 'LBpyJ3bqs6I'
	),
	'janis-joplin' => array(
		'artist' => 'Janis Joplin',
		'song' => 'Ball & Chain (live)',
		'embed' => 'X1zFnyEe3nE'
	),
	'elton-john' => array(
		'artist' => 'Elton John',
		'song' => 'Curtains',
		'embed' => 'g_bJhnJlCDg'
	),
	'kurt-cobain' => array(
		'artist' => 'Kurt Cobain',
		'song' => 'All Apologies',
		'embed' => '0LFVQpDKHk4'
	),
	'tony-iommi' => array(
		'artist' => 'Tony Iommi',
		'song' => 'Sprial Architect',
		'embed' => 'lkx7SQ4Wuh0'
	),
	'jimmy-page' => array(
		'artist' => 'Jimmy Page',
		// 'song' => 'That\'s the Way (live)',
		// 'embed' => '0EZ8SstLHYE'
		'song' => 'The Lemon Song',
		'embed' => 'Zyhu2ysqKGk'
	),
	'billy-joel' => array(
		'artist' => 'Billy Joel',
		'song' => 'Captain Jack',
		'embed' => '2xxugNQUtpE'
	),
	'sandy-denny' => array(
		'artist' => 'Sandy Denny',
		'song' => 'I\'ll keep it with mine',
		'embed' => 'CUtFXmS9FmA'
	),
	'jim-morrison' => array(
		'artist' => 'Jim Morrison',
		'song' => 'The End',
		'embed' => 'JSUIQgEVDM4'
	),
	'roy-orbison' => array(
		'artist' => 'Roy Orbison',
		'song' => 'In Dreams',
		'embed' => 'TPqZs7Vl_xg'
	),
	'elvis-presley' => array(
		'artist' => 'Elvis Presley',
		'song' => 'An American Trilogy (live)',
		'embed' => '8gyvTV5OJ5E'
	),
	'frank-sinatra' => array(
		'artist' => 'Frank Sinatra',
		'song' => 'I\'ve got you under my skin',
		'embed' => '_XCVnV5CGh0'
	),
	'ravi-shankar' => array(
		'artist' => 'Ravi Shankar',
		'song' => 'Raga Bhimpalasi (live)',
		'embed' => 'lk60ObnbIOk'
	),
	'jimi-hendrix' => array(
		'artist' => 'Jimi Hendrix',
		'song' => 'Third Stone From The Sun',
		'embed' => 'G6bkx3-fLL8'
	),
	'grace-slick' => array(
		'artist' => 'Grace Slick',
		'song' => 'Today (live)',
		'embed' => 'XzPDZINn9V0'
	),
	'paul-mccartney' => array(
		'artist' => 'Paul McCartney',
		'song' => 'Let Me Roll It',
		'embed' => 'kWFehaQEMYI'
	),
	'freddy-mercury' => array(
		'artist' => 'Freddy Mercury',
		'song' => 'Don\'t Stop Me Now',
		'embed' => 'HgzGwKwLmgM'
	),
	'peter-allen' => array(
		'artist' => 'Peter Allen',
		'song' => 'Quiet Please, There\'s a Lady on Stage',
		'embed' => 'WoOfc3YJ3hM'
	),
	// 'roger-waters' => array(
		// 'artist' => 'Roger Waters',
		// 'song' => 'Mother',
		// 'embed' => 'lX3uCuFKlqw'
	// ),
	'pete-townshend' => array(
		'artist' => 'Pete Townshend',
		'song' => 'Imagine a Man',
		'embed' => 'sBN5U-nA6Is'
	),
	'carlos-santana' => array(
		'artist' => 'Carlos Santana',
		'song' => 'Life Is A Lady/Holiday',
		'embed' => 'GZ2ya7G7wlI'
	),
	'george-harrison' => array(
		'artist' => 'George Harrison',
		'song' => 'Something',
		// 'embed' => 'sd0FpsC87Y8'
		// 'embed' => 'FX92FJ-lwXI'
		'embed' => 'xrYb4HQY5rQ'
	),
	'roger-daltry' => array(
		'artist' => 'Roger Daltry',
		'song' => 'See Me Feel Me',
		'embed' => 'hZPtrWvlFRU'
	),
	'nico' => array(
		'artist' => 'Nico',
		'song' => 'Femme Fatale',
		'embed' => 'jog8gh40Fho'
	),
	'john-lydon' => array(
		'artist' => 'John Lydon',
		'song' => 'Pretty Vacant',
		'embed' => 'VcauCclfytI'
	),
	'nina-simone' => array(
		'artist' => 'Nina Simone',
		'song' => 'I Shall Be Released (live)',
		'embed' => 'w-du8MDE8nk'
	),
	'scott-walker' => array(
		'artist' => 'Scott Walker',
		'song' => 'The Sun Ain\'t Gonna Shine Anymore',
		'embed' => 'Q11ium_-Lv8'
	),
	'neil-young' => array(
		'artist' => 'Neil Young',
		'song' => 'Cortez The Killer',
		'embed' => 'm-b76yiqO1E'
	),
	'paul-simon' => array(
		'artist' => 'Paul Simon',
		'song' => 'Graceland',
		'embed' => 'H9M4XJXnCcw'
	),
	'stevie-wonder' => array(
		'artist' => 'Stevie Wonder',
		'song' => 'Sir Duke',
		'embed' => '6sIjSNTS7Fs'
	),
	// 'ismael-lo' => array(
		// 'artist' => 'Ismael Lo',
		// 'song' => 'Jammu Africa',
		// 'embed' => '035WIWKn4cA'
	// ),
	'marvin-gaye' => array(
		'artist' => 'Marvin Gaye',
		'song' => 'What\'s Going On',
		'embed' => 'H-kA3UtBj4M'
	),
	// 'ritchie-blackmore' => array(
		// 'artist' => 'Ritchie Blackmore',
		// 'song' => 'Child in Time',
		// 'embed' => 'PfAWReBmxEs'
	// ),
	'aretha-franklin' => array(
		'artist' => 'Aretha Franklin',
		'song' => 'Bridge Over Troubled Water',
		'embed' => '_9-yfeA2JZs'
	),
	'barry-white' => array(
		'artist' => 'Barry White',
		'song' => 'I\'ve Got So Much to Give',
		'embed' => 'RVF_H21yg9E'
	),
	'bob-marley' => array(
		'artist' => 'Bob Marley',
		'song' => 'Could You Be Loved',
		'embed' => 'sL_BcaI0i0w'
	),
	'jeff-buckley' => array(
		'artist' => 'Jeff Buckley',
		'song' => 'Lover, You Should\'ve Come Over',
		'embed' => '-Giu0vGllUE'
	),
	'devo' => array(
		'artist' => 'Gerald Casale',
		'song' => 'Planet Earth',
		'embed' => 'yzwrefrmNAM'
	),

	// 'keith-richards' => array(
		// 'artist' => 'Keith Richards',
		// 'song' => 'Can\'t You Hear Me Knocking',
		// 'embed' => '6HDdiz8MU8o'
	// ),
	// 'michael-jackson' => array(
		// 'artist' => 'Michael Jackson',
		// 'song' => 'Smooth Criminal ',
		// 'embed' => 'h_D3VFfhvs4'
	// ),
	// 'beethoven' => array(
		// 'artist' => 'Ludwig van Beethoven',
		// 'song' => 'Sonata "Pathetique" Op. 13 - I. Grave. Allegro di molto e con brio',
		// 'embed' => 'kqvBJc9IovI'
	// ),
	// 'john-denver' => array(
		// 'artist' => 'John Denver',
		// 'song' => '?????????',
		// 'embed' => 'fzNOEpZSMwM'
	// ),
	// 'ralf-hutter' => array(
		// 'artist' => 'Ralf Hutter',
		// 'song' => 'Spiegelsaal',
		// 'embed' => 'fzNOEpZSMwM'
	// ),
	// 'joe-satriani' => array(
		// 'artist' => 'Joe Satriani',
		// 'song' => 'Echo',
		// 'embed' => '0U3GkXWJTSk'
	// ),
	// 'stevie-nicks' => array(
		// 'artist' => 'Stevie Nicks',
		// 'song' => 'Silver Springs (live)',
		// 'embed' => 'Sr1-FYFZGeQ'
	// )
);


function _shuffle_assoc(&$array) {
	$keys = array_keys($array);
	shuffle($keys);
	foreach($keys as $key) {
		$new[$key] = $array[$key];
	}
	$array = $new;
	return true;
}

// _shuffle_assoc($artists);
	
	
?><!doctype html>
<html class="no-js" lang="en">
	<!--
	Seems the price for courage is fear - it accepts no other currency.
	
	~~~~ And a big HELLO hello to all the crawly googlebotty bot bots, thank you for coming tonight. ~~~~~
	
	This website is dedicated to Robert Desmond Emery. He inspired me to be everything I can be, we love you dad.
	And my name is Matt Emery and I built this website when I was drunk. Cheers :-)
	-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>thetasteofmusic.com - a website to have a drink with. Cheers :-)</title>
	<!-- favicon stuff ...because they're cute. -->
	<link rel="apple-touch-icon" sizes="57x57" href="/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon-180x180.png">
	<meta name="apple-mobile-web-app-title" content="TasteOfMusic">
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/img/favicons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#9f00a7">
	<meta name="msapplication-TileImage" content="/img/favicons/mstile-144x144.png">
	<meta name="application-name" content="TasteOfMusic">
	<!--
	Just say NO to OG tags.
	-->
	<?php include('inc.html.meta-head.php'); ?>
	<style>
		body {
			/* lulz ensue... */
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
		ul.wall a.bright {
			background:#d82ba1;
		}
		ul.wall a.bright img {
			animation-name: blink;
			animation-duration: 0.5s;
			animation-iteration-count: 10;
			/* animation-direction: alternate; */
			animation-timing-function: ease-in-out;
			animation-fill-mode: forwards;
			/* animation-delay: 1s; */
			
			-webkit-animation-name: blink;
			-webkit-animation-duration: 0.5s;
			-webkit-animation-iteration-count: 10;
			/* -webkit-animation-direction: alternate; */
			-webkit-animation-timing-function: ease-in-out;
			-webkit-animation-fill-mode: forwards;
			/* -webkit-animation-delay: 1s; */
		}
		@keyframes blink {  
			0% { opacity: 1.0; }
			50% { opacity: 0.5; }
			100% { opacity: 1.0; }
		}
		@-webkit-keyframes blink {  
			0% { opacity: 1.0; }
			50% { opacity: 0.5; }
			100% { opacity: 1.0; }
		}
		<?php
		for($i=-1,$count=count($artists); $i<$count; $i++)
		foreach($artists AS $key => $val) {
			$i++;
			echo"ul.wall a.bright[data-idx='$i'] img { animation-delay: ". ($i * 0.1) ."s; -webkit-animation-delay: ". ($i * 0.1) ."s; }\n";
		}
		?>
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
			foreach($artists AS $key => $val) {
				echo"<li><a href='#$key' data-artist='". htmlspecialchars($val['artist'], ENT_QUOTES) ."' data-embed='{$val['embed']}' data-idx='$i'><img src='img-songs/". $key .".jpg' alt=''><div><span>{$val['artist']}</span>\n<span>{$val['song']}</span></div></a></li>";
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
		
		var bgAudio = document.getElementById('bg-audio');
		bgAudio.volume = 0.2;
	
		$(document).ready(function() {
			var ul = $('ul.wall'),
				li = ul.find('li'),
				a = ul.find('a'),
				persona = $('#persona'),
				personaClose = persona.find('a.close'),
				iframe = null,
				ulActive = false,
				hash = window.location.hash;
			
			$('body').on('mousewheel', 'ul.wall.scrub', function(event) {
				// console.log(event.deltaX, event.deltaY, event.deltaFactor);
				this.scrollLeft -= event.deltaY * (event.deltaFactor * 2);
				event.preventDefault();
			});
			
			
			var	cssTimeout = setTimeout(function(){
					a.addClass('bright');
				}, 8000);
			
			a.one('click', function(){
				a.removeClass('bright');
				clearTimeout(cssTimeout);
			});
			
			a.on('click', function(e){
				bgAudio.pause();
				if(iframe !== null) {
					iframe.remove();
				}				
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
				iframe = $("<iframe class='video' src='//www.youtube-nocookie.com/embed/"+ $(this).data('embed') +"?autoplay=1&controls=1&loop=0&rel=0&showinfo=0&autohide=1&wmode=transparent&hd=1' allowfullscreen></iframe>").prependTo(persona);
				ulActive = true;				
				<?php if(SERVER != 'dev') { ?>
				ga('send', 'event', 'artist', 'click', $(this).data('artist'), 1);
				<?php } ?>
			});
			
			personaClose.on('click', function(){
				bgAudio.play();
				ulActive = false;
				persona.hide();
				iframe.remove();
				ul.removeClass('scrub').css('height', 'auto');
			});
			
			// cl($.cache());
		});
		
		$(window).load(function() {
			//location
			if(window.location.hash.length) {
				$('ul.wall').find('a[href="'+ window.location.hash +'"]').trigger('click');
				bgAudio.pause();
			}
			else {
				bgAudio.play();
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