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
<script type="text/javascript" src="jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="js/spectrum.js"></script>
<script type="text/javascript" src="js/script.js"></script>
