<?php
# depending the canvas size the font size of title is increased proportionally
$fontsizeBlogtitle = $title["size"] * $fontScaling;
# outerwrapper is width specified, inner is -11 (accounting for border of 1px)
# ff printscreen = screenshot test.png --selector #innerWrapper
$featImgWidth = $dimensions["width"] - 11;
$featImgHeight = $dimensions["height"] - 11;
$css = <<<EOD
#outerWrapper {
  background-color: $bgcolor;
  width: {$wrapper_dimensions["width"]}px; 
  height: {$wrapper_dimensions["height"]}px;
}
#innerWrapper {
  width: {$dimensions["width"]}px;  
  height: {$dimensions["height"]}px;
}
#featImg { 
  width: {$featImgWidth}px; 
  height: {$featImgHeight}px;
  border: 1px solid $border;
  background-image: url({$images["bg1"]["url"]}), url({$images["bg2"]["url"]});
  background-position: {$images["bg1"]["position"]}, {$images["bg2"]["position"]};
  background-size: {$images["bg1"]["size"]}, {$images["bg2"]["size"]};
}
#featImg, img, #overlay {
  border-radius: $radius; -webkit-border-radius: $radius; -moz-border-radius: $radius;
}
#overlay {
  width: {$featImgWidth}px; 
  height: {$featImgHeight}px;
  opacity: {$images["overlay"]["opacity"]};
  background: url({$images["overlay"]["url"]}) {$images["overlay"]["position"]} no-repeat;  
  background-size: {$images["overlay"]["size"]};
}
h1#blogtitle {
  color: {$title["titlecolor"]};
  font-family: {$fonts[$title["font"]]}; 
  font-size: {$fontsizeBlogtitle}pt;
  top: {$title["topoffset"]}px; 
}
input#create {
  border-radius: $radius; -webkit-border-radius: $radius; -moz-border-radius: $radius;
}
EOD;
print $css;
?>
