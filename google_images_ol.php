<?php
include 'google_image_api.php';

$entry = array();
foreach($json->responseData->results as $img){
  $entry['value'] = $img->url; # big img
  array_push($return_arr, $entry); 
}

$json = json_encode($return_arr);
echo $json;
