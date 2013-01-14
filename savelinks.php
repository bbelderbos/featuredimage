<?php if($user): ?>
  <label style="color: green; font-weight: bold;">6. Save image link <br><small>(creates a link at the right side)</small></label>
  <input type="checkbox" id="storeLink" name="storeLink" value="1" >
  <!--<input class="button" id="create" name="create" value="Create image" type='submit'>-->
  <input type="hidden" id="fbid" name="fbid" value="<?php echo $user; ?>">
<?php else: ?>
  <!--<input class="button" id="create" name="create" style='margin-top:20px;' value="Create image" type='submit'>-->
  <div id="loginLinkInForm">
    <div class="fb-login-button" data-show-faces="true" data-width="240" data-max-rows="1">Start to build your collection ...</div>              
  </div>
<?php endif; ?>
