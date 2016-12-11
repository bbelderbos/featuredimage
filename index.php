<?php
include 'session.php';
include 'functions.php'; 
include 'initdata.php'; 

if(isset($_GET['bg1_url'])){
	$bgcolor = $_GET['bgcolor'];
	$title["text"] = $_GET['title'];
	$title["font"] = $_GET['font'];
	$title["topoffset"] = $_GET['topoffset'];
	$title["titlecolor"] = $_GET['titlecolor'];
	$images["bg1"]["url"] = $_GET["bg1_url"];
	$images["bg1"]["position"] = $_GET["bg1_pos"];
	$images["bg1"]["size"] = $_GET["bg1_size"];
	$images["overlay"]["url"] = $_GET["overlay_url"];
    $images["overlay"]["position"] = $_GET["overlay_pos"];
    $images["overlay"]["size"] = $_GET["overlay_size"];
    $images["overlay"]["repeat"] = $_GET["overlay_repeat"];
    $images["overlay"]["opacity"] = $_GET["overlay_opacity"];
	$active_coll = $_GET["collection"];
}

include 'header.php';
?>
<form id="setDimensions" name="setDimensions" method="POST">
  <label>W</label>
  <input type="text" class="smallInput" id="width" name="width" value="<?php echo $dimensions["width"]; ?>">
  <label>H</label>
  <input type="text" class="smallInput" id="height" name="height" value="<?php echo $dimensions["height"]; ?>">
  <input class="btn" type="submit" id="submitDimensions" name="submitDimensions" value="Set Canvas"/>
</form>
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
	<input class="btn" type="submit" id="reset" value="Start fresh"/>
    <div id="img-out"></div>
    <div id="feedback"></div>
  </div> 
</div>
<?php include 'footer.php'; ?>
