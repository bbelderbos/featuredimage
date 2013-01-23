<?php
if(is_file($logfile)){
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
      $moreInfo = $title;
      if(strlen($title)>15){
        $title = substr($title, 0, 15)."..";
      } 
      $html = "<li><a href='$baseurl$url' title='$moreInfo'>".urldecode($title)."</a></li>";

      # if fb id in link and == logged in user show in "my images", else in everybody's images
      # if($fbid == $user){ # does not work
      if(strstr($fbid, $user)){ 
        $userImages[$title] = $html; 
      } else { 
        $allImages[$title] = $html;
      }

      # keep track of processed urls
      array_push($seen, $url);
    }
  }
  fclose($file);

  # list user titles
  if($userImages){
    echo "<ul id='prevImg'>";
      echo "<h3><img src='https://graph.facebook.com/$user/picture'><span class='myimages'>My Images</span></h3>";
      echo "<ul>";
        foreach($userImages as $k=>$v){
          echo $v;
        }
      echo "</ul>";
    echo "</ul>";
  } 
}
?>
