<?php
$theme = isset($_GET['theme']) ? $_GET['theme'] : 'material-design';
$basedir = "images/$theme";
$term = isset($_GET['term']) ? $_GET['term'] : '';
$arr = array();
if ($handle = opendir($basedir)) {
    while (false !== ($entry = readdir($handle))) {
		if (preg_match('/_thumb\.(jpg|png)$/i', $entry)){
			$thumb = $entry;
			$full = str_replace("_thumb", "_full", $thumb);
			$item = array();
			$item['thumb'] = $basedir . "/" . $thumb;
			$item['full'] = $basedir . "/" . $full;
			if( $term === '' || (strpos($entry, $term) !== false)){
		        array_push($arr, $item);
			}
        }
    }
    closedir($handle);
}
echo json_encode($arr);
?>
