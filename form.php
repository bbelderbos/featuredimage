<div id="formWrapper">
  <h1>Create Your Image</h1>
  <!-- need to have url string with placeholder images, otherwise it will not work properly -->
  <ul id="nav">
    <li><a href='<?php echo $prevUrl; ?>'>Undo last change</a></li>
    <li><a href='<?php echo $startOverUrl; ?>'>Start over</a></li>
    <li><div class="spinner"><img src="i/mini-loader.gif"></div></li>
  </ul>

  <form id="addImage" name="addImage" method="get">
    <label>1. Canvas background / Title color</label>
    <div id="colorHandles" style="position: relative; left: 12px; padding: 5px 0;">
      <input type="color" class="smallInput" id="bgcolor" name="bgcolor" value="<?php echo $bgcolor; ?>">
      <input type="color" class="smallInput" id="titlecolor" id="titlecolor" name="titlecolor" value="<?php echo $title["titlecolor"]; ?>">
    </div>
    <label>2. Title text in image (blog post)</label>
    <input type="text" id="title" name="title" value="<?php echo $title["text"]; ?>">
    <label>  - Margin-top (in px) / <a href="http://www.google.com/webfonts">Google Font</a></label>
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
    <input type="text" class="smallInput auto_submit_item" id="topoffset" name="topoffset" value="<?php echo $title["topoffset"]; ?>">
    <label>3. First background image url</label>
    <input type="text" id="bg1_url" name="bg1_url" value="<?php echo $images["bg1"]["url"]; ?>">
    <label>  - Scale / Position</label>
    <select id="bg1_pos" name="bg1_pos">
    <?php
    foreach($positions as $v){
      echo "<option value='$v' ";
      if($v == $images["bg1"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="bg1_size" name="bg1_size">
    <?php
    foreach($sizes as $v){
      echo "<option value='$v' ";
      if($v == $images["bg1"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>4. Second background image url</label>
    <input type="text" id="bg2_url" name="bg2_url" value="<?php echo $images["bg2"]["url"]; ?>">
    <label>  - Scale / Position</label>
    <select id="bg2_pos" name="bg2_pos">
    <?php
    foreach($positions as $v){
      echo "<option value='$v' ";
      if($v == $images["bg2"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="bg2_size" name="bg2_size">
    <?php
    foreach($sizes as $v){
      echo "<option value='$v' ";
      if($v == $images["bg2"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>5. Third overlay image url</label>
    <input type="text" id="overlay_url" name="overlay_url" value="<?php echo $images["overlay"]["url"]; ?>">
    <label>  - Scale / Position</label>
    <select id="overlay_pos" name="overlay_pos">
    <?php
    foreach($positions as $v){
      echo "<option value='$v' ";
      if($v == $images["overlay"]["position"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <select id="overlay_size" name="overlay_size">
    <?php
    foreach($sizes as $v){
      echo "<option value='$v' ";
      if($v == $images["overlay"]["size"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <label>  - Opacity of overlay</label>
    <select id="overlay_opacity" name="overlay_opacity">
    <?php
    foreach($opacities as $v){
      echo "<option value='$v' ";
      if($v == $images["overlay"]["opacity"]) echo " selected='selected'";
      echo ">$v</option>";
    }
    ?>
    </select>
    <?php
    include 'savelinks.php';
    ?>
  </form>
</div>
