<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '514448035289505',
      status : true, // comprobar estado de login
      cookie : true, // habilitar cookies para permitir al servidor acceder a la sesión
      xfbml  : true, // ejecutar código XFBML
      oauth  : true // habilita OAuth 2.0
    });
    
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            console.log('Bienvenido');
        } else if(response.status === 'not_authorized') {
          top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=212654485574232&redirect_uri=http://apps.facebook.com/girucodebeta/&scope=publish_stream'
        }
        else
        {
          top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=212654485574232&redirect_uri=http://apps.facebook.com/girucodebeta/&scope=publish_stream'
        }
    });
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>