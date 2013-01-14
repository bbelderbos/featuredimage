<?php if($user): ?>
  <label style="color: green; font-weight: bold;">6. Save in your Images <br><small>(creates a link to the image)</small></label>
  <input type="checkbox" id="storeLink" name="storeLink" value="1" >
  <input type="hidden" id="fbid" name="fbid" value="<?php echo $user; ?>">
<?php endif; ?>

<input class="button" id="create" name="create" value="Bookmark Image" type='submit'>

<?php if(!$user): ?>
  <div id="loginLinkInForm">
    <div class="fb-login-button" data-show-faces="true" data-width="240" data-max-rows="1">Start to build your collection ...</div>              
  </div>
<?php endif; ?>
