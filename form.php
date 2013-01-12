<div id="formWrapper">
  <h1>Create Your Image</h1>
  <!-- need to have url string with placeholder images, otherwise it will not work properly -->
  <ul id="nav">
    <li><a href='<?php echo $prevUrl; ?>'>Undo last change</a></li>
    <li><a href='<?php echo $startOverUrl; ?>'>Start over</a></li>
    <li><div class="spinner"><img src="i/mini-loader.gif"></div></li>
  </ul>

  <form id="addImage" name="addImage" method="get">
    <label>1. <a href="http://www.google.com/webfonts">Google Font</a> / background color</label>
    <input class="smallInput" id="bgcolor" name="bgcolor" value="<?php echo $bgcolor; ?>">
    <select id="font" name="font">
    <?php
    foreach($fonts as $k=>$v){
      echo "<option value='$k' ";
      if($k == $title["font"]) echo " selected='selected'"; 
      $displayTitle = str_replace(array("'", ";"), "", $v);
      echo ">$displayTitle</option>";
    }
    ?>
    </select>
    <label>2. Title of image (blog post)</label>
    <input id="title" name="title" value="<?php echo $title["text"]; ?>">
    <label>- Color / margin-top of title in px</label>
    <input class="smallInput auto_submit_item" id="topoffset" name="topoffset" value="<?php echo $title["topoffset"]; ?>">
    <input class="smallInput" id="titlecolor" id="titlecolor" name="titlecolor" value="<?php echo $title["titlecolor"]; ?>">
    <label>3. First background image url</label>
    <input id="bg1_url" name="bg1_url" value="<?php echo $images["bg1"]["url"]; ?>">
    <label>- Scale / Position</label>
    <select id="bg1_pos" name="bg1_pos">
    <?php
    foreach($positions as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["bg1"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="bg1_size" name="bg1_size">
    <?php
    foreach($sizes as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["bg1"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>4. Second background image url</label>
    <input id="bg2_url" name="bg2_url" value="<?php echo $images["bg2"]["url"]; ?>">
    <label>- Scale / Position</label>
    <select id="bg2_pos" name="bg2_pos">
    <?php
    foreach($positions as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["bg2"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="bg2_size" name="bg2_size">
    <?php
    foreach($sizes as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["bg2"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>5. Third overlay image url</label>
    <input id="overlay_url" name="overlay_url" value="<?php echo $images["overlay"]["url"]; ?>">
    <label>- Scale / Position</label>
    <select id="overlay_pos" name="overlay_pos">
    <?php
    foreach($positions as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["overlay"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="overlay_size" name="overlay_size">
    <?php
    foreach($sizes as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["overlay"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>- Opacity of overlay</label>
    <select id="overlay_opacity" name="overlay_opacity">
    <?php
    foreach($opacities as $k=>$v){
      echo "<option value='$k' ";
      if($k == $images["overlay"]["opacity"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <?php
    include 'savelinks.php';
    ?>
  </form>
</div>
