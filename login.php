<div id="login">
  <?php if ($user): ?>
    <div style='border-bottom: 2px solid #ccc;'>
      Welcome back, <?php echo $user_profile['first_name']; ?> <small>( <a href="<?php echo $logoutUrl; ?>">logout</a> )</small>
    </div>
  <?php endif ?>
</div>
