<?php
$siteName = "Featured Image Creator";
$admin = "628517118";
$baseurl = "http://".$_SERVER["HTTP_HOST"];
$subdir = "featured_image";
$appUrl = "$baseurl/$subdir/";
$currentUrl = get_current_url();
$startOverUrl = $baseurl . "/$subdir/";
$bgcolor = "#FFFFFF"; 
$dimensions = array(
  "width" => $_SESSION['width'], 
  "height" => $_SESSION['height'],
);
$wrapper_dimensions = array(
  "width" => $dimensions["width"]*1.25,
  "height" => $dimensions["height"]*2,
);

// form values
$positions = array(
  "left top", "left center", "left bottom", "right top", "right center", 
  "right bottom", "center top", "center center", "center bottom", 
);
$sizes = array(
  "10", "25", "40", "50", "75", "100", "125", "150", "200", "300", "400", "500", "1000",
);
$repeatOptions = array(
  "no-repeat", "repeat", "repeat-x", "repeat-y",
);
$opacities = array(
  "0.1", "0.2", "0.3", "0.4", "0.5", "0.6", "0.7", "0.8", "0.9", "1",
);
$border = "#ccc";
$title = array( 
  "text" => "Title of image",
  "titlecolor" => "#000000", 
  "size" => "16",
  "font" => "Ubuntu", 
  "topoffset" => "60px",
);

include 'googlefonts.php';

$topmarginsTitle = array(
  "0px", "10px", "20px", "30px", "40px", "50px", "60px", "70px", "80px", "90px", "100px", 
  "110px", "120px", "130px", "140px", "150px", "175px", "200px", "250px", "300px",
);

$defaultPos = "center center";
$defaultRepeat = "no-repeat";
$defaultOpacity = "0.3";

$images = array(
  "bg1" => array(
    "url" => "", 
    "position" => $defaultPos,
    "size" => 200,
  ),
  "overlay" => array(
    "url" => "", 
    "position" => $defaultPos,
    "size" => 100,
    "repeat" => $defaultRepeat,
    "opacity" => $defaultOpacity,
  ),
);
?>
