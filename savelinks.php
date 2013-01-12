<?php if($user): ?>
  <label style="color: green; font-weight: bold;">6. Save image link <br><small>(creates a link at the right side)</small></label>
  <input type="checkbox" id="storeLink" name="storeLink" value="1" >
  <input class="button" id="create" name="create" value="Create image" type='submit'>
  <input type="hidden" id="fbid" name="fbid" value="<?php echo $user; ?>">
<?php else: ?>
   <div id="loginLinkInForm">
     <br><br><fb:login-button size="small">Login with Facebook to save your images</fb:login-button>             
   </div>
<?php endif; ?>
