<?php 
$this->load->library('user_agent');
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en-US"> 
	<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php ?></title> 
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="imagetoolbar" content="false" /> <!-- Suppressing IE6 Image toolbars --> 
	<meta http-equiv="cleartype" content="on" /> <!-- Mobile IE :: ClearType technology for smoothing fonts for easy reading -->
	<meta name="author" content="...a few good Hip.Hoppers...www.5ivedesign.co.za" />
	<!-- Mobile viewport optimization h5bp.com/ad -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />
	<meta name="pinterest" content="nopin" />
	<meta name='robots' content='noindex,nofollow' />
	<link rel="icon" type="image/png" href="./favicon.png" />
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//code.jquery.com">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel='stylesheet' id='bootstrap-css'  href='assets/css/bootstrap.min.css?ver=2.3.1' type='text/css' media='all' />
    <link rel="stylesheet" id='plugins-css' href="assets/css/plugins.css?ver=0.5.0" type="text/css" media="all" />
    <?php /** ?>
	<?php 
	if ($this->agent->mobile()) {
		?>
		<link rel="stylesheet" id='jqueryMobile-css' href="//code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" type="text/css" media="all" />
		<?php
	};?>
	<?php /**/?>
    <link rel="stylesheet" id='theme-css' href="assets/css/style.css"  type="text/css" media="all" />
	<script type="text/javascript" src="assets/js/vanilla.core.js"></script>
</head> 
<body class="ui-hover nl-blurred"> 

<div id="container" data-role="page">

	<?php 
	/**
	if ($this->agent->mobile()) {
		?>
		<header id="branding" data-role="header" data-theme="b">
			 <a href="./" class="btn fl" data-icon="home" data-iconpos="notext" data-transition="fade">Home</a>
		</header>
		<?php
	} else {
	/**/?>
		<header id="branding" data-role="header" data-theme="b">
			<nav id="navigation" class="clearfix" role="navigation">
            <?php /** ?>
			    <a href="./" class="btn fl" data-icon="home" data-iconpos="notext" data-transition="fade">Home</a>
			<?php /**/?>
				<a href="#" class="btn btn-inverse fr dsbtn_rounded" id="localize" data-icon="location" data-iconpos="notext" data-transition="fade">Localize</a>
			</nav>
			<h1><?php ?></h1>
		</header>
	<?php /**};/**/ ?>
	<section id="content" data-role="content">
		<div id="content-inner">