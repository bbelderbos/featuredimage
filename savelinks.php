<?php if($user): ?>
  <label style="color: green; font-weight: bold;">6. Save image link <br><small>(creates a link at the right side)</small></label>
  <input type="checkbox" id="storeLink" name="storeLink" value="1" >
  <input class="button" id="create" name="create" value="Create image" type='submit'>
  <input type="hidden" id="fbid" name="fbid" value="<?php echo $user; ?>">
<?php else: ?>
  <input class="button" id="create" name="create" value="Create image" type='submit'>
  <div id="loginLinkInForm">
    <br><br>
    <div class="fb-login-button" data-show-faces="true" data-width="300" data-max-rows="1">Login with Facebook to save your images ...</div>
  </div>
<?php endif; ?>
