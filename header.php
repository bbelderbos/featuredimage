<!DOCTYPE html>
<html>
<head>
  <title><?php echo $siteName; ?></title>
  <link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
  <link id="titleGoogleFont" href='http://fonts.googleapis.com/css?family=<?php echo $title["font"]; ?>' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
  <link rel="stylesheet" href="css/spectrum.css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />

  <meta property="og:description" content="Start to build your collection of blog images. This Javascript + CSS solution lets you combine images into beautiful thumbnails, which you can save and share. Ideally suited for blog featured images. " />
  <meta property="og:url" content="<?php echo $appUrl; ?>" />
  <meta property="og:title" content="<?php echo $siteName; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo $appUrl."i/logo.png"; ?>" />

  <style>
    <?php include 'dynamic_css.php'; ?>
  </style>
</head>
<body>
<div class="overlay">

<div id="aboutTxt">
  <h1>
    <a id="contact" href="http://bobbelderbos.com/2016/12/featured-image-creator/" title="more info tool / developer blog" target="_blank"><img src="i/info.png"></a> 
    <a id="homeLink" href="<?php echo $appUrl; ?>" title="reset/ home"><?php echo $siteName; ?></a> 
  </h1>
</div>
<span style="display:none" id="coverImg"><?php // include "set_bg.php"; ?></span>
