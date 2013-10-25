<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
</head>
<body>
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
                console.log('No Conectado');
                top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=514448035289505&redirect_uri=http://apps.facebook.com/girucode/&scope=publish_stream'
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
    <?php
      include('src/facebook.php');
     
      $config = array();
      $config['appId'] = '514448035289505';
      $config['secret'] = '0077cc0f2364adea04a39e5d9dbd4337';
      $config['grant_type']='client_credentials';

      $facebook = new Facebook($config);  

      $user = $facebook->getUser();
      if ($user) {
        try {
          // Proceed knowing you have a logged in user who's authenticated.
          $user = $facebook->api($user);
        } catch (FacebookApiException $e) {
          error_log($e);
          $user = null;
        }
      }
      $userID = $user['id'];
      $facebook->setAccessToken($config['appId'].'|'.$config['secret']);
      if($userID=='100005920087860')
      {
        if($_POST['mensaje'])
        {
          $message = $_POST['mensaje'];
          $href = '?live=yes';

          $params = array(
                  'href' => $href,
                  'template' => $message,
              );

          $facebook->api('/' . $userID . '/notifications/', 'post', $params);

          echo 'Mensaje enviado.. <a href="administar.php">Enviar otro</a>';
        }
        else
        {
      ?>
          <form action="procesar.php" method="POST">
            Mensaje: <textarea type="text" id="mensaje"></textarea>
          </form>
      <?php
        }
      }
      else
      {
        echo 'Estas tratando de ingresar a una zona privada... <a href="index.php">Volver a la aplicacion</a>';
      }
    ?>
</body>
</html>
