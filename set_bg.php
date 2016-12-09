<?php
$basedir = "images/material-design";
$bgImgArr = array();
if ($handle = opendir($basedir)) {
    while (false !== ($entry = readdir($handle))) {
		if (preg_match('/_full\.(jpg|png)$/i', $entry)){
			$img = $basedir . "/" . $entry;
		    array_push($bgImgArr, $img);
        }
    }
    closedir($handle);
}
echo $bgImgArr[array_rand($bgImgArr)];
?>
