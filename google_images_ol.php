<?php
include 'google_image_api.php';

$entry = array();
if($json->responseData->results){
  foreach($json->responseData->results as $img){
    $entry['value'] = $img->url; # big img
    array_push($return_arr, $entry); 
  }
} else {
  $entry['value'] = "i/nothing_found.png";
  array_push($return_arr, $entry);
}

echo json_encode($return_arr);
?>
