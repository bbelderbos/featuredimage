<?php
$siteName = "CSS Featured Image Creator";
$admin = "628517118";
$baseurl = "http://".$_SERVER["HTTP_HOST"];
$subdir = "featured_image";
$appUrl = "$baseurl/$subdir/";
$currentUrl = get_current_url();
$prevUrl = $_SERVER['HTTP_REFERER'];
$startOverUrl = $baseurl . "/$subdir/";
$bgcolor = "#FFFFFF"; 
$dimensions = array(
  # rfe - scale, but for now I want to use it for blog featured images which are 200x200
  "width" => $_SESSION['width'], 
  "height" => $_SESSION['height'],
);
$wrapper_dimensions = array(
  "width" => $dimensions["width"]*1.25,
  "height" => $dimensions["height"]*2,
);

// form values
$positions = array(
  "left top", "left center", "left bottom", "right top", "right center", "right bottom", "center top", "center center", "center bottom", "10% 10%", "25% 25%", "25% 50%", "25% 75%", "50% 25%", "50% 50%", "50% 75%", "75% 25%", "75% 50%", "75% 75%", "10% 10%", "25% 25%", "40% 40%", "50% 50%", "60% 60%", "75% 75%", "90% 90%",
);
$sizes = array(
  "10%", "25%", "40%", "50%", "75%", "100%", "125%", "150%", "200%", "300%", "400%", "500%", "1000%",
);
$opacities = array(
  "0.1", "0.2", "0.3", "0.4", "0.5", "0.6", "0.7", "0.8", "0.9", "1",
);
$border = "#ccc";
$title = array( 
  "text" => "Title of image",
  "titlecolor" => "#000000", 
  "size" => "14",
  "font" => "Ubuntu", 
  "topoffset" => "60px",
);

# $fonts array is set/read from googlefonts.txt (.php)

$topmarginsTitle = array(
  "0px", "10px", "20px", "30px", "40px", "50px", "60px", "70px", "80px", "90px", "100px", "110px", "120px", "130px", "140px",

);

$images = array(
  "bg1" => array(
    "url" => "", 
    "position" => "left top",
    "size" => "50%",
  ),
  "bg2" => array(
    "url" => "", 
    "position" => "right bottom",
    "size" => "50%",
  ),
  "overlay" => array(
    "url" => "", 
    "position" => "center center",
    "size" => "100%",
    "opacity" => "0.3",
  ),
);
?>
