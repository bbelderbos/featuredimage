<div id="fb-root"></div>                                                   
<script>
// facebook api 
window.fbAsyncInit = function() {                                          
  FB.init({
    appId: '<?php echo $facebook->getAppID() ?>',                          
    cookie: true,                                                          
    xfbml: true,                                                           
    oauth: true                                                            
  });
  FB.Event.subscribe('auth.login', function(response) {                    
    window.location.reload();                                              
  });
  FB.Event.subscribe('auth.logout', function(response) {                   
    window.location.reload();                                              
  });                                                                      
};
(function() {
  var e = document.createElement('script'); e.async = true;                
  e.src = document.location.protocol +
    '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);                       
}());
</script> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript" src="js/colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" src="js/script.js"></script>
