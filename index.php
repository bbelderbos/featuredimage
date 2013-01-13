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
   </div> 

    <ul id="prevImg">
      <?php include 'listimages.php'; ?>
    </ul>
  </div>
  
<?php include 'footer.php'; ?>
