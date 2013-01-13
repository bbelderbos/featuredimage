<?php
$siteName = "CSS Featured Image Creator";
$admin = "628517118";
$baseurl = "http://".$_SERVER["HTTP_HOST"];
$subdir = "featured_image";
$appUrl = "$baseurl/$subdir/";
$prevUrl = $_SERVER['HTTP_REFERER'];
$startOverUrl = $baseurl . "/$subdir/?bgcolor=#e9ebde&font=Limelight&title=Title+of+blog+post%3F&topoffset=60&titlecolor=#000000&bg1_url=http%3A%2F%2Ft2.gstatic.com%2Fimages%3Fq%3Dtbn%3AANd9GcREry7t0Az6wMvtc_P4H842sMTfmcH2yOqtgHhJdu-4hI_GaRJC2LWL5uI&bg1_pos=1&bg1_size=2&bg2_url=http%3A%2F%2Ft2.gstatic.com%2Fimages%3Fq%3Dtbn%3AANd9GcREry7t0Az6wMvtc_P4H842sMTfmcH2yOqtgHhJdu-4hI_GaRJC2LWL5uI&bg2_pos=7&bg2_size=2&overlay_url=http%3A%2F%2Ft2.gstatic.com%2Fimages%3Fq%3Dtbn%3AANd9GcREry7t0Az6wMvtc_P4H842sMTfmcH2yOqtgHhJdu-4hI_GaRJC2LWL5uI&overlay_pos=1&overlay_size=6&overlay_opacity=3&create=Create+image";
$logfile = "images.txt";
$bgcolor = "#e9ebde"; # color of background frame around images on my blog
$dimensions = array(
  # rfe - scale, but for now I want to use it for blog featured images which are 200x200
  "width" => $_SESSION['width'], 
  "height" => $_SESSION['height'],
);
$wrapper_dimensions = array(
  "width" => $dimensions["width"]*1.25,
  "height" => $dimensions["height"]*2,
);
$positions = array(
  1 => "left top",
  2 => "left center",
  3 => "left bottom",
  4 => "right top",
  5 => "right center",
  7 => "right bottom",
  8 => "center top",
  9 => "center center",
  10 => "center bottom",
  11 => "25% 25%",
  12 => "25% 50%",
  13 => "25% 75%",
  14 => "50% 25%",
  15 => "50% 50%",
  16 => "50% 75%",
  17 => "75% 25%",
  18 => "75% 50%",
  19 => "75% 75%",
  20 => "10% 10%",
  21 => "25% 25%",
  22 => "40% 40%",
  23 => "50% 50%",
  24 => "60% 60%",
  25 => "75% 75%",
  26 => "90% 90%",
);
$sizes = array(
  1 => "10%",
  2 => "25%",
  3 => "40%",
  4 => "50%",
  5 => "75%",
  6 => "100%",
  7 => "150%",
  8 => "200%",
  9 => "300%",
  10 => "400%",
  11 => "500%",
  12 => "1000%",
);
$opacities = array(
  1 => "0.1",
  2 => "0.2",
  3 => "0.3",
  4 => "0.4",
  5 => "0.5",
  6 => "0.6",
  7 => "0.7",
  8 => "0.8",
  9 => "0.9",
  10 => "1",
);
$border = "#ccc";
$title = array( 
  "text" => "Title of image",
  "titlecolor" => "#000000", 
  "size" => "12",
  "font" => "Limelight", 
  "topoffset" => "60",
);
$fonts = array();
foreach($fontArray as $font){
  $fonts[$font['css-name']] = str_replace('font-family: ', '', $font['font-family']);
}
$images = array(
  "bg1" => array(
    "url" => "", 
    "position" => 1,
    "size" => 2,
  ),
  "bg2" => array(
    "url" => "http://castlefmscotland.com/wp-content/themes/premiumnews/styles/red/ribbon.png", # placeholder image
    "position" => 4,
    "size" => 4,
  ),
  "overlay" => array(
    "url" => "http://digital-photography-school.com/wp-content/uploads/2009/08/landscape-photography-challenge.png", # placeholder image
    "position" => 9,
    "size" => 8,
    "opacity" => 3,
  ),
);
?>
