<?php 
# thanks to http://phat-reaction.com/googlefonts.php
# to refresh cache uncomment the following and save outputs to googlefonts.txt file
#$fontsSeraliazed = file_get_contents('http://phat-reaction.com/googlefonts.php?format=php');
#$fontArray = unserialize($fontsSeraliazed);
#print_r($fontArray); exit()
#foreach($fontArray as $font){
#  echo $font['css-name']."::".$font['font-family']. "\n"; 
#}
#exit();

$file = fopen('googlefonts.txt', "r") or exit("Unable to open file!");

$fonts = array();
while(!feof($file)) {
  $line = trim(fgets($file));
  if($line == '') continue;
  list($css, $font) = explode("::", $line);
  $fonts[$css] = str_replace('font-family: ', '', $font);
}

fclose($file);
#print_r($fonts); exit;
?>
