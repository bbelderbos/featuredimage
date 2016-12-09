<?php
session_start();
$defaultWidth = $defaultHeight = 300;
if(isset($_POST['submitDimensions'])){
  $_SESSION['width'] = $_POST['width'];
  $_SESSION['height'] = $_POST['height'];
} else {
  $_SESSION['width'] = isset($_SESSION['width'])? $_SESSION['width'] : $defaultWidth;
  $_SESSION['height'] = isset($_SESSION['height'])? $_SESSION['height'] : $defaultHeight;
}
$fontScaling = (float)(1 + ( ($_SESSION['height'] - $defaultHeight) / $defaultHeight )); 
if($_SESSION['width'] > 100 && $fontScaling < 1){
  $fontScaling = 1;
}
?>
