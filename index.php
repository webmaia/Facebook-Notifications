<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
  <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel-noscript.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-desktop.css" />
      <link rel="stylesheet" href="css/style-noscript.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
</head>
<body class="homepage">
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

      $facebook->setAccessToken($config['appId'].'|'.$config['secret']);

      $userID = $user['id'];
      $message = 'Prueba aplicacion para enviar notificaciones';
      $href = '?live=yes';

      $params = array(
              'href' => $href,
              'template' => $message,
          );

      //$facebook->api('/' . $userID . '/notifications/', 'post', $params);
    ?>
    <div id="header">
      <div class="inner">
        <header>
          <h1><a href="#" id="logo">Fundacion Girucode</a></h1>
          <hr />
          <span class="byline">Enterate de todas las notificias de la fundacion Girucode</span>
          <img src="https://graph.facebook.com/<?php echo $user['username']; ?>/picture">
        </header>
        <footer>
          <a href="#banner" class="button circled scrolly">Inicio</a>
        </footer>
      </div>   
    </div>
    <nav id="nav">
        <ul>
          <li>
            <span>Mas de Girucode</span>
            <ul>
              <li><a href="http://girucode.me" target="_BLANK">Web Oficial</a></li>
              <li><a href="#">Magna phasellus</a></li>
              <li><a href="#">Etiam dolore nisl</a></li>
              <li>
                <span>And a submenu &hellip;</span>
                <ul>
                  <li><a href="#">Lorem ipsum dolor</a></li>
                  <li><a href="#">Phasellus consequat</a></li>
                  <li><a href="#">Magna phasellus</a></li>
                  <li><a href="#">Etiam dolore nisl</a></li>
                </ul>
              </li>
              <li><a href="#">Veroeros feugiat</a></li>
            </ul>
          </li>
          <li><a href="administrar.html">Administrar</a></li>
        </ul>
      </nav>   
</body>
</html>
