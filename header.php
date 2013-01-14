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
<div class='fb-like' data-href='<?php echo $appUrl; ?>' data-send='true' data-width='480' data-show-faces='true' data-action='like' data-font='lucida grande'></div> 
