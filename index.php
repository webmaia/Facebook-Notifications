<html>
<head>
  <meta charset="UTF-8" />
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
            } else {
                connect();
            }
        });

        function connect() {
            top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=514448035289505&redirect_uri=http://apps.facebook.com/girucode/&scope=publish_stream'
        }
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
</head>
<body>
    <div id="fb-root"></div>
    <?php
      include('src/facebook.php');
     

      $config = array();
      $config['appId'] = '514448035289505';
      $config['secret'] = '0077cc0f2364adea04a39e5d9dbd4337';
      $config['grant_type']='client_credentials';

      $facebook = new Facebook($config);  

      $user = $facebook->getUser();
      echo $user;
      if ($user) {
        try {
          // Proceed knowing you have a logged in user who's authenticated.
          $user = $facebook->api($user);
        } catch (FacebookApiException $e) {
          error_log($e);
          $user = null;
        }
      }

      $facebook->setAccessToken($config['appId'].'|'.$config['secret']);

      $userID = $user['id'];
      $message = 'Prueba aplicacion para enviar notificaciones';
      $href = '?live=yes';

      $params = array(
              'href' => $href,
              'template' => $message,
          );

      $facebook->api('/' . $userID . '/notifications/', 'post', $params);
    ?>
    <div>
        <h1>Girucode app</h1>
        <?php
          echo 'Bienvenid@ '. $user['name'];
        ?>
        <img src="https://graph.facebook.com/<?php echo $user['username']; ?>/picture">
    </div>
</body>
</html>
