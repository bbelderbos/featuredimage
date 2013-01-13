<?php
include 'session.php';
include 'googlefonts.php';
include 'initdata.php'; 
include 'fbapi.php'; 
include 'formsubmit.php';
include 'header.php';
include 'dimension_form.php';
?>
  <?php include 'login.php'; ?>
  <div id="testdiv"></div>
  <?php include 'form.php'; ?>

  <div id="results">
    <h1>Featured Images<span id="progress"></span></h1>
    <div id="outerWrapper">
      <div id="innerWrapper">
        <div id="featImg">
          <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
          <div id='overlay'></div>
        </div>
      </div>
      <a href='#' class='button' id='saveImage'>Download</a>
      <div id="instructions">
        <label>Firefox Dev Toolbar - after shift+F2, copy/paste:</label>
        <?php $filename = strtolower(substr(str_replace(" ", "_", $title["text"]), 0, 10)); ?>
        <input type="text" id="cmd" value="screenshot <?php echo $filename; ?>.png --selector #innerWrapper">
        <label>Or printscreen On Mac - select area with:</label>
        <input type="text" readonly="readonly" value="Shift-Command-4">
        <label>** I am still looking for a way to convert the html/css div to an image ...</label>
      </div>
   </div> 

    <ul id="prevImg">
      <?php include 'listimages.php'; ?>
    </ul>
  </div>
  
<?php include 'footer.php'; ?>
