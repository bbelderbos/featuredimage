<?php
$css = <<<EOD
#wrapper {
  background-color: #$bgcolor;
}
#featImg { 
  width: {$dimensions["width"]}; height: {$dimensions["height"]};
  border: 1px solid $border;
  background-image: url({$images["bg1"]["url"]}), url({$images["bg2"]["url"]});
  background-position: {$positions[$images["bg1"]["position"]]}, {$positions[$images["bg2"]["position"]]};
  background-size: {$sizes[$images["bg1"]["size"]]}, {$sizes[$images["bg2"]["size"]]};
}
#featImg, img, #overlay {
  border-radius: $radius; -webkit-border-radius: $radius; -moz-border-radius: $radius;
}
#overlay {
  width: {$dimensions["width"]}; height: {$dimensions["height"]};
  opacity: {$opacities[$images["overlay"]["opacity"]]};
  background: url({$images["overlay"]["url"]}) {$positions[$images["overlay"]["position"]]} no-repeat;  
  background-size: {$sizes[$images["overlay"]["size"]]};
}
h1#blogtitle {
  color: #{$title["titlecolor"]};
  font-family: {$fonts[$title["font"]]}
  font-size: {$title["size"]};
  top: {$title["topoffset"]}px; 
}
input#create {
  border-radius: $radius; -webkit-border-radius: $radius; -moz-border-radius: $radius;
}
EOD;
print $css;
?>
