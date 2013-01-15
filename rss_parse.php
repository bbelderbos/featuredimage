<?php  
if (!isset($_GET["term"])) {
  return;
}
$search = strtolower($_GET["term"]);

$user = "bbelderbos";
$feed_url = "http://statigr.am/feed/$user";
$return_arr = array();

$content = file_get_contents($feed_url);  
$x = new SimpleXmlElement($content);  
$i = 0;

foreach($x->channel->item as $entry) {  
  if(!strstr(strtolower($entry->title), $search)) continue;
  $item = array();
  $item['id'] = ++$i;
  $img = preg_replace("/.*src='([^']+)'.*/", "$1", $entry->description);
  $item['value'] = $img;
  array_push($return_arr, $item);
}  

if(empty($return_arr)) {
  $item = array();
  $item['id'] = ++$i;
  $item['value'] = "i/nothing_found.png";
  array_push($return_arr, $item);
}

echo json_encode($return_arr);
?> 
