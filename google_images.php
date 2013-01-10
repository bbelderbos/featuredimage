<?php
# modified script from https://developers.google.com/image-search/v1/jsondevguide
$mysite = "http://bobbelderbos.com";
$search = urlencode($_GET["term"]);
$ip =  gethostbyname(gethostname());
$filetype = "png";
$imagesize = "small|medium|large|xlarge";
$numresults = "8";
$url = "https://ajax.googleapis.com/ajax/services/search/images?" .
       "v=1.0&q=$search&userip=$ip&as_filetype=$filetype&imgsz=$imagesize&rsz=$numresults";
#echo $url;
$return_arr = array();

// sendRequest
// note how referer is set manually
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $mysite);
$body = curl_exec($ch);
curl_close($ch);

// now, process the JSON string
$json = json_decode($body);
# echo "<pre>"; print_r($json->responseData->results); echo "</pre>"; exit;

$entry = array();
$counter = 0;
foreach($json->responseData->results as $img){
  $counter++;
  $entry['id'] = $counter; # smaller pic
  $entry['url'] = $img->tbUrl; # smaller pic
  $entry['url_big'] = $img->url; # big img
  array_push($return_arr, $entry); 
}

$json = json_encode($return_arr);
echo $json;
