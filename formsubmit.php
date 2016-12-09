<?php
if(isset($_GET['bg1_url'])){
    #print_r($_GET); exit;
	$bgcolor = $_GET['bgcolor'];
	$title["text"] = $_GET['title'];
	$title["font"] = $_GET['font'];
	$title["topoffset"] = $_GET['topoffset'];
	$title["titlecolor"] = $_GET['titlecolor'];
	$images["bg1"]["url"] = $_GET["bg1_url"];
	$images["bg1"]["position"] = $_GET["bg1_pos"];
	$images["bg1"]["size"] = $_GET["bg1_size"];
	$images["overlay"]["url"] = $_GET["overlay_url"];
    $images["overlay"]["position"] = $_GET["overlay_pos"];
    $images["overlay"]["size"] = $_GET["overlay_size"];
    $images["overlay"]["repeat"] = $_GET["overlay_repeat"];
    $images["overlay"]["opacity"] = $_GET["overlay_opacity"];
}
?>
