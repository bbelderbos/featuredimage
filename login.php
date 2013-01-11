<div id="login">
  <?php if ($user): ?>
    Welcome back, <?php echo $user_profile['first_name']; ?> (<a href="<?php echo $logoutUrl; ?>">logout</a>)
  <?php else: ?>
    <div>
      <!--<a href="<?php //echo $loginUrl; ?>">Login with Facebook to save your images</a>-->
      <fb:login-button size="small">Login with Facebook to save your images</fb:login-button>
    </div>
  <?php endif ?>
</div>
