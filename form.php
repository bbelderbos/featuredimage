<div id="formWrapper">
  <h1>Create Your Image</h1>
  <a style="margin: 5px; color: red;" href='?'>Start over</a>
  <form id="addImage" name="addImage" method="get">
    <label>1. <a href="http://www.google.com/webfonts">Google Font</a> / Bg color hex</label>
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
    <label>2. Blog Title</label>
    <input id="title" name="title" value="<?php echo $title["text"]; ?>">
    <label>- Color hex / Px margin-top</label>
    <input class="smallInput auto_submit_item" id="topoffset" name="topoffset" value="<?php echo $title["topoffset"]; ?>">
    <input class="smallInput" id="titlecolor" id="titlecolor" name="titlecolor" value="<?php echo $title["titlecolor"]; ?>">
    <label>3. Bg image #1 url</label>
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
    <label>4. Bg image #2 url (optional)</label>
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
    <label>5. Overlay image url</label>
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
    <label style="color: green; font-weight: bold;">6. Happy with the result? Mark this box and click "Create image"<br><small>(this saves the image by creating a link at the right)</small></label>
    <input type="checkbox" id="storeLink" name="storeLink" value="1" >
    <input id="create" name="create" value='Create image' type='submit'>
  </form>
</div>
