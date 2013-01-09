<?php
# form (start simple)
if(isset($_GET['bgcolor'])){
  $bgcolor = $_GET['bgcolor'];
  $title["text"] = ucwords($_GET['title']);
  $title["font"] = $_GET['font'];
  $title["topoffset"] = $_GET['topoffset'];
  $title["titlecolor"] = $_GET['titlecolor'];
  $images["bg1"]["url"] = $_GET["bg1_url"];
  $images["bg1"]["position"] = $_GET["bg1_pos"];
  $images["bg1"]["size"] = $_GET["bg1_size"];
  $images["bg2"]["url"] = $_GET["bg2_url"];
  $images["bg2"]["position"] = $_GET["bg2_pos"];
  $images["bg2"]["size"] = $_GET["bg2_size"];
  $images["overlay"]["url"] = $_GET["overlay_url"];
  $images["overlay"]["position"] = $_GET["overlay_pos"];
  $images["overlay"]["size"] = $_GET["overlay_size"];
  $images["overlay"]["opacity"] = $_GET["overlay_opacity"];

  # get stored urls
  $file = fopen($logfile, "r") or exit("Unable to open file!");
  $storedUrls = array();
  while(!feof($file)) {
    $url = fgets($file);
    array_push($storedUrls, $url);
  }
  fclose($file);

  # write the entry to file
  if(isset($_GET["storeLink"]) && $_GET["storeLink"] == 1){ 
    $actual_link = $_SERVER["REQUEST_URI"];
    $actual_link = str_replace("&storeLink=1", "", $actual_link); # kick this var out
    if(!in_array($actual_link, $storedUrls)){
      $fh = fopen($logfile, 'a') or die("can't open file");
      fwrite($fh, $actual_link."\n");
      fclose($fh);
    }
  }
}
?>
