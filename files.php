<?php
$term = $_GET['term'];
$arr = array();
if ($handle = opendir('images/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			$item = array();
			$item['id'] = $entry;
			$item['value'] = "images/" . $entry;
			if (strpos($entry, $term) !== false) {
				array_push($arr, $item);
			}
        }
    }
    closedir($handle);
}
echo json_encode($arr);
?>
