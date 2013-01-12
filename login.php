<div id="login">
  <?php if ($user): ?>
    <div style='border-bottom: 2px solid #ccc;'>
      Welcome back, <?php echo $user_profile['first_name']; ?> <small>( <a href="<?php echo $logoutUrl; ?>">logout</a> )</small>
    </div>
  <?php else: ?>
    <div>
      <!--<a href="<?php //echo $loginUrl; ?>">Login with Facebook to save your images</a>-->
      <fb:login-button size="small">Build your Blog Featured Image collection ...</fb:login-button>
    </div>
  <?php endif ?>
</div>
