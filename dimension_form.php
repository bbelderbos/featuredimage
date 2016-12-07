<form id="setDimensions" name="setDimensions" method="POST">
  <label>W</label>
  <input type="text" class="smallInput" id="width" name="width" value="<?php echo $dimensions["width"]; ?>">
  <label>H</label>
  <input type="text" class="smallInput" id="height" name="height" value="<?php echo $dimensions["height"]; ?>">
  <input class="btn" type="submit" id="submitDimensions" name="submitDimensions" value="Set Canvas"/>
</form>
