<form id="setDimensions" name="setDimensions" method="POST">
  <label>Width in px: </label>
  <input type="text" class="smallInput" id="width" name="width" value="<?php echo $dimensions["width"]; ?>">
  <label>Height in px: </label>
  <input type="text" class="smallInput" id="height" name="height" value="<?php echo $dimensions["height"]; ?>">
  <input class="button" type="submit" id="submitDimensions" name="submitDimensions" value="Set Canvas">
</form>
