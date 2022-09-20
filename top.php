<?php
	$sitelink = 'http://localhost/pesapal3';
?>
<!DOCTYPE html>
<html class="jPanelMenu" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Pesapal">
    <meta name="description" content=""> 
    <title>How to use PesaPal's API| PesaPal</title>
    <link rel="shortcut icon" href=images/favicon.ico">
    <link rel="apple-touch-icon" href=images/apple-touch-icon.png">
	
	<!-- Style Sheets -->
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/style_forms_validation.css" rel="stylesheet" type="text/css">

    <!--<link href="/Content/styles_v2/template.css?v4" rel="stylesheet" type="text/css" />
    <link href="/Content/style_forms.css?v1" rel="stylesheet" type="text/css" />
    
	  
	<script src="/Scripts/jquery-1.9.1.min.js" type="text/javascript"></script>-->  
    <script src="js/ga.js" async type="text/javascript"></script><script src="js/jquery_002.js"></script>
    

<style id="css-ddslick" type="text/css">.dd-select{ position:relative; cursor:pointer;}.dd-desc { color:#aaa; display:block; overflow: hidden; font-weight:normal; line-height: 1.4em; }.dd-selected{ overflow:hidden; display:block; padding:7px 5px; font-weight:bold;}.dd-pointer{ width:0; height:0; position:absolute; right:5px; top:50%; margin-top:-3px;}.dd-pointer-down{ border:solid 5px transparent; border-top:solid 5px #000; }.dd-pointer-up{border:solid 5px transparent !important; border-bottom:solid 5px #000 !important; margin-top:-8px;}.dd-options{ border:solid 1px #ccc; border-top:none; list-style:none; box-shadow:0px 1px 5px #ddd; display:none; position:absolute; z-index:2000; margin:0; padding:0;background:#fff; overflow:auto;}.dd-option{ padding:7px 5px; display:block; border-bottom:solid 1px #ddd; overflow:hidden; text-decoration:none; color:#333; cursor:pointer;-webkit-transition: all 0.25s ease-in-out; -moz-transition: all 0.25s ease-in-out; transition: all 0.25s ease-in-out;-ms-transition: all 0.25s ease-in-out; }.dd-options > li:last-child > .dd-option{ border-bottom:none;}.dd-option:hover{ background:#f3f3f3; color:#000;}.dd-selected-description-truncated { text-overflow: ellipsis; white-space:nowrap; }.dd-option-selected { background:#f6f6f6; }.dd-option-image, .dd-selected-image { vertical-align:middle; float:left; margin-right:5px; max-width:64px;}.dd-image-right { float:right; margin-right:15px; margin-left:5px;}.dd-container{ position:relative;}​ .dd-selected-text { font-weight:bold}​</style></head>
<body data-menu-position="closed" id="bd">
<div style="position: relative; left: 0px;" class="jPanelMenu-panel"><div><div id="pp-wrapper">
<a id="top"></a>
	<header>
		<div class="header shadow3">
		<div class="container">
			<div class="row-fluid">
				<h2 id="pp-logo" class="span3">
                	<a href="https://www.pesapal.com/"><span>Pesapal - Kenya</span></a>
            	</h2>
                	<span class="poweredby">
					</script><img name="seal" src="<?php echo $sitelink ?>/images/getseal.gif" oncontextmenu="return false;" alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" border="true">
					</span>
				<div class="span4 offset1">
					<ul id="pp-mainnav">
						<li id="tm_020"><a href="https://www.pesapal.com/dashboard/account/register/?ppsid=eyZxdW90O1JlcXVlc3RJZCZxdW90OzomcXVvdDtlYjdmNjkxYiZxdW90OywmcXVvdDtTZXNzaW9uQ291bnRyeSZxdW90OzomcXVvdDtrZSZxdW90OywmcXVvdDtJc0RldmljZSZxdW90OzpmYWxzZX0%3D">Personal</a></li><li id="tm_050"><a href="https://www.pesapal.com/dashboard/account/register/?ppsid=eyZxdW90O1JlcXVlc3RJZCZxdW90OzomcXVvdDtlYjdmNjkxYiZxdW90OywmcXVvdDtTZXNzaW9uQ291bnRyeSZxdW90OzomcXVvdDtrZSZxdW90OywmcXVvdDtJc0RldmljZSZxdW90OzpmYWxzZX0%3D">Business</a></li>
					</ul>
				</div>				
			</div>
		</div>
	</div>
	</header>
	<section id="main">
        <div id="pp-main">
		    <div id="pp-content" class="">
    	        <div class="container ">