<!DOCTYPE html>
<html>
<head>
<title>Featured image creator for blog post</title>
<link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=<?php echo $title["font"]; ?>' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="js/colorpicker/css/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />

<meta property="og:description" content="Start to build your collection of images, ideally suited for blog featured images." />
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