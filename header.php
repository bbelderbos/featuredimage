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

  <meta property="og:description" content="Start to build your collection of blog images. This pure CSS solution takes my Instagram feed and let you combine images into beautiful 200x200 thumbnails, ideally suited for blog featured images" />
  <meta property="og:url" content="<?php echo $appUrl; ?>" />
  <meta property="og:title" content="<?php echo $siteName; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo $appUrl."i/logo.png"; ?>" />
  <meta property="fb:admins" content="<?php echo $admin; ?>" />
  <meta property="fb:app_id" content="<?php echo $facebook->getAppID() ?>">

  <style>
    <?php include 'dynamic_css.php'; ?>
  </style>
</head>
<body>
<div id="aboutTxt">
Hi, I built this app to easily create featured images for my blog. I liked to use the Google Search API but I don't want to violate copyright, so I started with my own instagram feed as input (see fields # 3.-4.-5. when typing). I am looking into the Instagram API to expand on this concept so anybody could login and use his/her feed with this app ... Any other ideas, please send me a <a target="_blank" href="http://bobbelderbos.com/contact">message</a>.
</div>
