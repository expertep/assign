<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '738167039691026',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  </head>
  <body>

    <?php
    $app_id = '738167039691026';
    $app_secret = 'e10b165ae55182ef3ae65d1c68ab06be';
    $required_scope = 'public_profile,publish_actions,email';
    $redirect_url = 'member/..';






     ?>


  </body>
</html>
