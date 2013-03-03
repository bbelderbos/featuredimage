<?php
// Create our FB App instance 
if(strstr($baseurl, "127.0.0.1")){
  $facebook = new Facebook(array(
    'appId'  => '',
    'secret' => '',
  ));
} else {
  # http://bobbelderbos.com/featured_image/?
  $facebook = new Facebook(array(
    'appId'  => '',
    'secret' => '',
  ));
}
?>
