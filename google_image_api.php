<?php
if (!isset($_GET["term"])) {
  return;
}
# modified script from https://developers.google.com/image-search/v1/jsondevguide
$mysite = "http://bobbelderbos.com";
$search = urlencode($_GET["term"]);
$ip = $_SERVER["REMOTE_ADDR"];
$filetype = "png";
$imagesize = "small|medium|large|xlarge";
$as_rights = "cc_publicdomain";
$numresults = "8";
$url = "https://ajax.googleapis.com/ajax/services/search/images?" .
       "v=1.0&q=$search&userip=$ip&as_filetype=$filetype&imgsz=$imagesize&as_rights=$as_rights&rsz=$numresults";
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
?>
