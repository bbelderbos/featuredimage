<?php
require 'googlefonts.php';
$baseurl = "http://".$_SERVER["HTTP_HOST"];
$logfile = "images.txt";
$bgcolor = "#eff1e1";
$dimensions = array(
  "width" => "200px",
  "height" => "200px",
);
$positions = array(
  1 => "left top",
  2 => "left center",
  3 => "left bottom",
  4 => "right top",
  5 => "right center",
  7 => "right bottom",
  8 => "center top",
  9 => "center center",
  10 => "center bottom",
);
$sizes = array(
  1 => "10%",
  2 => "25%",
  3 => "40%",
  4 => "50%",
  5 => "75%",
  6 => "100%",
  7 => "200%",
  8 => "500%",
  9 => "1000%",
);
$opacities = array(
  1 => "0.1",
  2 => "0.2",
  3 => "0.3",
  4 => "0.4",
  5 => "0.5",
  6 => "0.6",
  7 => "0.7",
  8 => "0.8",
  9 => "0.9",
  10 => "1",
);
$border = "#ccc";
$radius = "8px";
$title = array( 
  "text" => "blog title placeholder",
  "titlecolor" => "000", 
  "size" => "16px", # rfe - in form?
  "font" => "Limelight", # default
  "topoffset" => "60px",
);
$fonts = array();
foreach($fontArray as $font){
  $fonts[$font['css-name']] = str_replace('font-family: ', '', $font['font-family']);
}
$images = array(
  "bg1" => array(
    "url" => "https://twimg0-a.akamaihd.net/profile_images/2357974774/vsuua7vxeim2khmxgjrx_bigger.png",
    "position" => 1,
    "size" => 2,
  ),
  "bg2" => array(
    "url" => "..",
    "position" => 7,
    "size" => 2,
  ),
  "overlay" => array(
    "url" => "http://peppoj.net/wp-content/uploads/2010/07/512-Terminal.png",
    "position" => 1,
    "size" => 6,
    "opacity" => 3,
  ),
);

# form (start simple)
if(isset($_GET['bgcolor'])){
  $bgcolor = $_GET['bgcolor'];
  $title["text"] = ucwords($_GET['title']);
  $title["font"] = $_GET['font'];
  $title["topoffset"] = $_GET['topoffset'];
  $title["titlecolor"] = $_GET['titlecolor'];
  $images["bg1"]["url"] = $_GET["bg1_url"];
  $images["bg1"]["position"] = $_GET["bg1_pos"];
  $images["bg1"]["size"] = $_GET["bg1_size"];
  $images["bg2"]["url"] = $_GET["bg2_url"];
  $images["bg2"]["position"] = $_GET["bg2_pos"];
  $images["bg2"]["size"] = $_GET["bg2_size"];
  $images["overlay"]["url"] = $_GET["overlay_url"];
  $images["overlay"]["position"] = $_GET["overlay_pos"];
  $images["overlay"]["size"] = $_GET["overlay_size"];
  $images["overlay"]["opacity"] = $_GET["overlay_opacity"];

  # get stored urls
  $file = fopen($logfile, "r") or exit("Unable to open file!");
  $storedUrls = array();
  while(!feof($file)) {
    $url = fgets($file);
    array_push($storedUrls, $url);
  }
  fclose($file);

  # write the entry to file
  if(isset($_GET["storeLink"]) && $_GET["storeLink"] == 1){ 
    $actual_link = $_SERVER["REQUEST_URI"];
    $actual_link = str_replace("&storeLink=1", "", $actual_link); # kick this var out
    if(!in_array($actual_link, $storedUrls)){
      $fh = fopen($logfile, 'a') or die("can't open file");
      fwrite($fh, $actual_link."\n");
      fclose($fh);
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Featured image creator for blog post</title>
<link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=<?php echo $title["font"]; ?>' rel='stylesheet' type='text/css'>
<style>
<?php
$css = <<<EOD
body {
  font-size: 85%;
}
ul {
  margin: 0px;
  padding: 0px;
}
li {
  list-style: none;
  float: left;
}
#results {
  width: 550px;
  margin: 25px 0 0 5px;
  float: left;
  font-size: 85%;
  font: 'Courier New';
}
#wrapper {
  float: left;
  margin-top: 35px;
  overflow: hidden;
  width: 222px;
  height: 222px;
  background-color: $bgcolor;
}
ul#prevImg {
  margin-top: 20px;
  width: 250px;
  float: right; 
}
ul#prevImg li {
  width: 100px;
  padding: 4px;
  margin: 4px 4px 2px 0;
  border: 1px solid #ddd;
}
#featImg { 
  width: {$dimensions["width"]}; height: {$dimensions["height"]};
  margin: 10px;
  position: relative;
  border: 1px solid $border;
  background-image: url({$images["bg1"]["url"]}), url({$images["bg2"]["url"]});
  background-position: {$positions[$images["bg1"]["position"]]}, {$positions[$images["bg2"]["position"]]};
  background-size: {$sizes[$images["bg1"]["size"]]}, {$sizes[$images["bg2"]["size"]]};
  background-repeat: no-repeat;
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
h1,h2,h3 {
  color: #000;
  font-family: 'Montez', cursive;
  padding: 2px 5px;
  background-color: rgba(255, 255, 255, .7); 
  z-index: 990;
}
h1#blogtitle {
  color: {$title["titlecolor"]};
  font-family: {$fonts[$title["font"]]}
  font-size: {$title["size"]};
  position: absolute;
  top: {$title["topoffset"]}; 
}
#formWrapper {
  float: left; 
  margin: 20px;
}
form {
  overflow: hidden;
  border-right: 1px solid #ddd;
  padding: 10px 20px 10px 0;
  width: 500px;
}
label {
  clear: both;
  float: left;
  margin: 5px;
  width: 170px;
  padding-top: 5px;
}
input, select {
  border: 1px solid #ddd;
  margin: 5px;
  width: 300px;
  height: 22px;
  float: right;
}
select, .smallInput {
  width: 146px; 
}
input#storeLink {
  width: 20px; 
  height: 20px; 
  float: left; 
  margin: 10px 0 0 15px;  
}
input#submit {
  border-radius: $radius; -webkit-border-radius: $radius; -moz-border-radius: $radius;
  border: none;
  height: 30px;
  color: #fff;
  background-color: #000;
  clear: both;
  float: right; 
  width: 100px;
}
EOD;
print $css;
?>
</style>
</head>

<body>

  <div id="formWrapper">
    <h1>Create Your Image</h1>
    <a style="margin: 5px; color: red;" href='?'>Start over</a>
    <form id="addImage" name="addImage" method="get">
      <label>1. <a href="http://www.google.com/webfonts">Google Font</a> / Bg color hex</label>
      <input class="smallInput" name="bgcolor" value="<?php echo $bgcolor; ?>">
      <select name="font">
      <?php
      foreach($fonts as $k=>$v){
        echo "<option value='$k' ";
        if($k == $title["font"]) echo " selected='selected'"; 
        $displayTitle = str_replace(array("'", ";"), "", $v);
        echo ">$displayTitle</option>";
      }
      ?>
      </select>
      <label>2. Blog Title</label>
      <input name="title" value="<?php echo $title["text"]; ?>">
      <label>Px margin-top / Color hex</label>
      <input class="smallInput" name="topoffset" value="<?php echo $title["topoffset"]; ?>">
      <input class="smallInput" name="titlecolor" value="<?php echo $title["titlecolor"]; ?>">
      <label>3. Bg image #1 url</label>
      <input name="bg1_url" value="<?php echo $images["bg1"]["url"]; ?>">
      <label>Scale / Position</label>
      <select name="bg1_pos">
      <?php
      foreach($positions as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["bg1"]["position"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <select name="bg1_size">
      <?php
      foreach($sizes as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["bg1"]["size"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <label>4. Bg image #2 url (optional)</label>
      <input name="bg2_url" value="<?php echo $images["bg2"]["url"]; ?>">
      <label>Scale / Position</label>
      <select name="bg2_pos">
      <?php
      foreach($positions as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["bg2"]["position"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <select name="bg2_size">
      <?php
      foreach($sizes as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["bg2"]["size"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <label>5. Overlay image url</label>
      <input name="overlay_url" value="<?php echo $images["overlay"]["url"]; ?>">
      <label>Scale / Position</label>
      <select name="overlay_pos">
      <?php
      foreach($positions as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["overlay"]["position"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <select name="overlay_size">
      <?php
      foreach($sizes as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["overlay"]["size"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <label>Opacity of overlay</label>
      <select name="overlay_opacity">
      <?php
      foreach($opacities as $k=>$v){
        echo "<option value='$k' ";
        if($k == $images["overlay"]["opacity"]) echo " selected='selected'";
        echo ">$v</option>";
      }
      ?>
      </select>
      <label style="color: green; font-weight: bold;">6. Happy with the result? Mark this box and click "Create image"<br><small>(this saves the image by creating a link at the right)</small></label>
      <input type="checkbox" name="storeLink" id="storeLink" value="1" >
      <input id="submit" value='Create image' type='submit'>
    </form>
  </div>

  <div id="results">
    <h1>Featured Images</h1>
    <div id="wrapper">
      <div id="featImg">
        <h1 id="blogtitle"><?php echo $title["text"]; ?></h1>
        <div id='overlay'></div>
      </div>
    </div>

    <ul id="prevImg">
      <h3>Saved Images</h3>
      <?php
      $file = fopen($logfile, "r") or exit("Unable to open file!");
      $seen = array();
      while(!feof($file)) {
        $url = fgets($file);
        $title = preg_replace('/.*title=([^&]+).*/', '\1', $url);
        $title = str_replace('+', ' ', $title);
        if(trim($url) == '') continue;
        if(!in_array($url, $seen)){
          if(strlen($title)>15){
            $title = substr($title, 0, 15)."..";
          }
          echo "<li><a href='$baseurl$url'>$title</a></li>";
          array_push($seen, $url);
        }
      }
      fclose($file);
      ?>
    </ul>
  </div>


</body>
</html>
