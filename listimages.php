<?php
$file = fopen($logfile, "r") or exit("Unable to open file!");
$seen = array();
$allImages = array();
$userImages = array();

while(!feof($file)) {
  $url = fgets($file);
  if(trim($url) == '') continue;

  # extract title
  $title = preg_replace('/.*title=([^&]+).*/', '\1', $url);
  $title = str_replace('+', ' ', $title);
  if(strstr($url, "fbid=")){
    $fbid = preg_replace('/.*fbid=(.*?)(&|$)/', '\1', $url);
  } else {
    $fbid = False;
  }

  # only unique urls
  if(!in_array($url, $seen)){ 
    if(strlen($title)>15){
      $title = substr($title, 0, 15)."..";
    }
    $allImages[$title] = "<li><a href='$baseurl$url'>$title</a></li>";

    # if fb id in link and same as logged in user, save in his/her images
    if(strstr($fbid, $user)){ # == did not work
      $userImages[$title] = $allImages[$title];
    }
    # keep track of processed urls
    array_push($seen, $url);
  }
}
fclose($file);

# list user titles
if($userImages){
  echo "<h3>Your Images</h3>";
  echo "<div>";
    foreach($userImages as $k=>$v){
      echo $v;
    }
  echo "</div>";
}

# list unique titles of all users
echo "<h3 style='padding-top: 30px;'>All Images</h3>";
echo "<div>";
  foreach($allImages as $k=>$v){
    echo $v;
  }
echo "</div>";

?>
