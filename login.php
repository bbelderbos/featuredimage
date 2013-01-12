<div id="login">
  <?php if ($user): ?>
    <div style='border-bottom: 2px solid #ccc;'>
      Welcome back, <?php echo $user_profile['first_name']; ?> <small>( <a href="<?php echo $logoutUrl; ?>">logout</a> )</small>
    </div>
  <?php else: ?>
    <div>
      <!--<a href="<?php //echo $loginUrl; ?>">Login with Facebook to save your images</a>-->
      <div class="fb-login-button" data-show-faces="true" data-width="300" data-max-rows="1">Build your Blog Featured Image collection ...</div>
    </div>
  <?php endif ?>
</div>
