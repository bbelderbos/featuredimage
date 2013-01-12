<?php
include 'googlefonts.php';
include 'initdata.php'; 
include 'fbapi.php'; 
include 'formsubmit.php';
?>
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
<style>
<?php include 'dynamic_css.php'; ?>
</style>
</head>

<body>
  <?php include 'login.php'; ?>
  <div id="testdiv"></div>
  <?php include 'form.php'; ?>

  <div id="results">
    <h1>Featured Images</h1>
    <div id="wrapper">
      <div id="featImg">
        <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
        <div id='overlay'></div>
      </div>
    </div>

    <ul id="prevImg">
      <?php include 'listimages.php'; ?>
    </ul>
  </div>
  
  <?php include 'js.php'; ?>

</body>
</html>
