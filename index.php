<?php
include 'googlefonts.php';
include 'initdata.php'; 
include 'formsubmit.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Featured image creator for blog post</title>
<link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=<?php echo $title["font"]; ?>' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="js/colorpicker/css/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />                                                                                    
<style>
<?php include 'dynamic_css.php'; ?>
</style>
</head>

<body>
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
      <h3>Saved Images</h3>
      <?php include 'listimages.php'; ?>
    </ul>
  </div>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/colorpicker/js/colorpicker.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
