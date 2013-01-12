<?php
include 'googlefonts.php';
include 'initdata.php'; 
include 'fbapi.php'; 
include 'formsubmit.php';
include 'header.php';
?>
  <?php include 'login.php'; ?>
  <div id="testdiv"></div>
  <?php include 'form.php'; ?>

  <div id="results">
    <h1>Featured Images<span id="progress"></span></h1>
    <div id="wrapper">
      <div id="featImg">
        <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
        <div id='overlay'></div>
      </div>
      <a href='#' class='button' id='saveImage'>Save image</a>
    </div>
    

    <ul id="prevImg">
      <?php include 'listimages.php'; ?>
    </ul>
  </div>
  
<?php include 'footer.php'; ?>
