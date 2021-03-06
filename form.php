<div id="formWrapper">

  <form id="addImage" name="addImage" method="get">
    <label>Canvas background / Title color</label>
    <div id="colorHandles">
      <input type="color" class="smallInput" id="bgcolor" name="bgcolor" value="<?php echo $bgcolor; ?>">
      <input type="color" class="smallInput" id="titlecolor" name="titlecolor" value="<?php echo $title["titlecolor"]; ?>">
    </div>
    <label class="newsection">Title text in image (blog post)</label>
    <input class="newsection" type="text" id="title" name="title" value="<?php echo $title["text"]; ?>">
    <label>  - Margin-top / <a href="http://www.google.com/webfonts">Google Font</a></label>
    <select id="font" name="font">
    <?php
    foreach($fonts as $k=>$v){
      echo "<option value='$k' ";
      if($k == $title["font"]) echo " selected='selected'"; 
      $displayTitle = str_replace("'", "", $v);
      echo ">$displayTitle</option>";
    }
    ?>
    </select>
    <select id="topoffset" name="topoffset">
    <?php
    foreach($topmarginsTitle as $v){
      echo "<option value='$v' ";
      if($v == $title["topoffset"]) echo " selected='selected'"; 
      echo ">$v</option>";
    }
    ?>
    </select>
    <label class="newsection">
		<select id="collection" name="collection">
		<?php
		foreach($collections as $c){
		echo "<option value='$c' ";
		if($c == $active_coll) echo " selected='selected'"; 
		echo ">BG theme: $c</option>";
		}
		?>
		</select>
	</label>
    <input class="newsection" type="text" id="bg1_url" name="bg1_url" value="<?php echo $images["bg1"]["url"]; ?>">
    <span class="spinner"><img src="i/mini-loader.gif"></span>
    </label>
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
      echo ">$v%</option>";
    }
    ?>
    </select>
	
		<label class="newsection">Second overlay image (paste URL)</label>
		<input class="newsection" type="text" id="overlay_url" name="overlay_url" value="<?php echo $images["overlay"]["url"]; ?>">
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
		echo ">$v%</option>";
		}
		?>
		</select>
		<label>  - Bg repeat / opacity</label>
		<select id="overlay_repeat" name="overlay_repeat">
		<?php
		foreach($repeatOptions as $v){
		echo "<option value='$v' ";
		if($v == $images["overlay"]["repeat"]) echo " selected='selected'";
		echo ">$v</option>";
		}
		?>
		</select>
		<select id="overlay_opacity" name="overlay_opacity">
		<?php
		foreach($opacities as $v){
		echo "<option value='$v' ";
		if($v == $images["overlay"]["opacity"]) echo " selected='selected'";
		echo ">$v</option>";
		}
		?>
		</select>
  </form>
</div>
