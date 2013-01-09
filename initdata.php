<?php
$baseurl = "http://".$_SERVER["HTTP_HOST"];
$logfile = "images.txt";
$bgcolor = "#e9ebde"; # color of background frame around images on my blog
$dimensions = array(
  "width" => "200px",
  "height" => "200px",
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
);
$sizes = array(
  1 => "10%",
  2 => "25%",
  3 => "40%",
  4 => "50%",
  5 => "75%",
  6 => "100%",
  7 => "200%",
  8 => "500%",
  9 => "1000%",
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
  "text" => "blog title placeholder",
  "titlecolor" => "000", 
  "size" => "16px", # rfe - in form?
  "font" => "Limelight", # default
  "topoffset" => "60",
);
$fonts = array();
foreach($fontArray as $font){
  $fonts[$font['css-name']] = str_replace('font-family: ', '', $font['font-family']);
}
$images = array(
  "bg1" => array(
    "url" => "https://twimg0-a.akamaihd.net/profile_images/2357974774/vsuua7vxeim2khmxgjrx_bigger.png",
    "position" => 1,
    "size" => 2,
  ),
  "bg2" => array(
    "url" => "..",
    "position" => 7,
    "size" => 2,
  ),
  "overlay" => array(
    "url" => "http://peppoj.net/wp-content/uploads/2010/07/512-Terminal.png",
    "position" => 1,
    "size" => 6,
    "opacity" => 3,
  ),
);
?>
