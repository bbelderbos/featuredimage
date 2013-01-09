<?php
$file = fopen($logfile, "r") or exit("Unable to open file!");
$seen = array();
$output = array();
while(!feof($file)) {
  $url = fgets($file);
  $title = preg_replace('/.*title=([^&]+).*/', '\1', $url);
  $title = str_replace('+', ' ', $title);
  if(trim($url) == '') continue;
  if(!in_array($url, $seen)){
    if(strlen($title)>15){
      $title = substr($title, 0, 15)."..";
    }
    $output[$title] = "<li><a href='$baseurl$url'>$title</a></li>";
    array_push($seen, $url);
  }
}
fclose($file);

# list unique titles
foreach($output as $k=>$v){
  echo $v;
}
?>
