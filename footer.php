<ul id="footer">
  <li><a href="http://bobbelderbos.com" target="_blank">developer</a></li>
  <li><a href="#" target="_blank">about</a></li>
  <li class="shareIcon"><a title="tweet about this app" href="http://twitter.com/home?status=<?php echo $appUrl; ?>" target="_blank"><img src="i/twitter-icon.png"></a></li>
  <li class="shareIcon"><a title="share on facebook" href="http://facebook.com/sharer.php?u=<?php echo $appUrl; ?>" target="_blank"><img src="i/facebook-icon.png"></a></li>
  <li class="shareIcon"><a title="share on google+" href="#" onclick="return googleplusbtn('<?php echo $appUrl; ?>')"><img src="i/plus-icon.png" alt="Share on Google+" /></a></li>
</ul>
<div class='fb-like' data-href='<?php echo $appUrl; ?>' data-send='true' data-width='350' data-show-faces='true' data-action='like' data-font='lucida grande'></div> 
<?php include 'js.php'; ?>
</body>
</html>
