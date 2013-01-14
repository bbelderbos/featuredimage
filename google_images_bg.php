<?php
include 'google_image_api.php';

$entry = array();
$i = 0;
if($json->responseData->results){
  foreach($json->responseData->results as $img){
    $i++;
    $entry['id'] = $i;
    # wtf??! needs to have a value elem: http://stackoverflow.com/questions/13074997/jquery-ui-autocomplete-not-populating-from-remote-datasource
    $entry['value'] = $img->tbUrl; # smaller pic
    array_push($return_arr, $entry); 
  }
} else {
  array_push($return_arr, "No results found");
}

echo json_encode($return_arr);
?>
