<?php
include 'session.php';
include 'functions.php'; 
include 'googlefonts.php';
include 'initdata.php'; 
include 'formsubmit.php';
include 'header.php';
include 'dimension_form.php';
?>
  <div id="testdiv"></div>
  <?php include 'form.php'; ?>

  <div id="results">
    <div id="outerWrapper">
      <div id="innerWrapper">
        <div id="featImg">
          <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
          <div id='overlay'></div>
        </div>
      </div>
	  <input class="btn" type="submit" id="btnSave" value="Save image"/>
	  <input class="btn" type="submit" id="bookmark" value="Bookmark image"/>
      <div id="img-out"></div>
    </div> 
  </div>
  
<?php include 'footer.php'; ?>
