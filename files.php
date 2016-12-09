<?php
$theme = isset($_GET['theme']) ? $_GET['theme'] : 'material-design';
$images = "images";
$basedir = "$images/$theme";
$term = isset($_GET['term']) ? $_GET['term'] : '';
$arr = array();
if ($handle = opendir($basedir)) {
    while (false !== ($entry = readdir($handle))) {
		if (preg_match('/_full\.(jpg|png)$/i', $entry)){
			$full = $entry;
			$thumb = str_replace("_full", "_thumb", $full);
			$item = array();
			$item['thumb'] = $basedir . "/" . $thumb;
			$item['full'] = $basedir . "/" . $full;
			if( $term === '' || (strpos($term, $images) !== false) || (strpos($entry, $term) !== false)){
		        array_push($arr, $item);
			}
        }
    }
    closedir($handle);
}
echo json_encode($arr);
?>
