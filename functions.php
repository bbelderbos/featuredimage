<?php
function get_current_url(){
  $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
?>
