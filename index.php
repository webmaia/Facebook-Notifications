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
      $user = $facebook->api('/me');
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

<html>
<head>
<meta charset="UTF-8" />
</head>
<body>
    <div>
        <h1>Girucode app</h1>
        <?php
          echo 'Bienvenid@ '. $user['name'];
        ?>
        <img src="https://graph.facebook.com/<?php echo $user['username']; ?>/picture">
    </div>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '514448035289505',
          status : true, // comprobar estado de login
          cookie : true, // habilitar cookies para permitir al servidor acceder a la sesión
          xfbml  : true, // ejecutar código XFBML
          channelURL : 'https://fbgirucode.ap01.aws.af.cm/channel.html', // fichero channel.html
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
</body>
</html>

<?php
/*$user['uid']='100005920087860';

$post = $facebook->api('/' . $user['uid'] . '/notifications/', 'post',  array(
  'access_token' => '514448035289505|0077cc0f2364adea04a39e5d9dbd4337',
  'href' => 'http://angelkurten.com',  //this does link to the app's root, don't think this actually works, seems to link to the app's canvas page
  'template' => 'Max 180 characters',
  'ref' => 'Notification sent '.$dNow->format("Y-m-d G:i:s") //this is for Facebook's insight
));
echo "aplicacion para enviar notificaciones";*/
?>