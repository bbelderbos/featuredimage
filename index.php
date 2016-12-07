<?php
include 'session.php';
include 'functions.php'; 
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
    <div id="outerWrapper">
      <div id="innerWrapper">
        <div id="featImg">
          <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
          <div id='overlay'></div>
        </div>
      </div>
	  <input type="button" id="btnSave" value="Save image"/>
      <div id="img-out"></div>
    </div> 

    <?php if($user) include 'listimages.php'; ?>
  </div>
  
<?php include 'footer.php'; ?>
