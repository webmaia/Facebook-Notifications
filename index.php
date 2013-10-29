<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
  <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>

      <link rel="stylesheet" href="css/style.css" />
      <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
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
                top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=514448035289505&redirect_uri=http://apps.facebook.com/girucode/&scope=publish_stream'
            }
            else
            {
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

      if ($user!=0) {
        require_once('src/cone.php');
        $sql = "INSERT INTO usuarios (id, username) VALUES (?, ?)";
        $params = array($user['id'], $user['name'] );
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if ($stmt==TRUE) {
            $facebook->setAccessToken($config['appId'].'|'.$config['secret']);
            $message = 'Felicitaciones '.$user['first_name'].' acabas de configurar las notificaciones de la Fundación Girucode';
            $href = '?live=yes';
            $params = array(
                    'href' => $href,
                    'template' => $message,
                );
            $facebook->api('/' . $user['id'] . '/notifications/', 'post', $params);
        }
    ?>
    <div id="salida">
      <div id="header">
      <div class="inner">
        <header>
          <h1><a href="#" id="logo">Fundación Girucode</a></h1>
          <h5>v1.0 Developed by <a href="https://www.facebook.com/angel.kurten?ref=tn_tnmn">Angel Kurten</a></h5>
          <hr />
          <span class="byline">
            Bienvenid@ <?php echo $user['name'] ?>, esta aplicacion te permite mantenerte en contacto con nosotros, 
            permitiendonos informarte de cualquier evento realizado por Girucode.
          </span>
          <img src="https://graph.facebook.com/<?php echo $user['username']; ?>/picture">
        </header>
        <footer>
          <?php
            if(@$_GET['live']=='yes') {
          ?>
            Ir al grupo y feliciar a Girucode: <br>
            <a href="https://www.facebook.com/groups/GiruCode/" class="button" target="_BLANK">Ir</a>
          <?php
            }
          ?>
        </footer>
      </div>
      <nav id="nav">
      <ul>
        <li>
          <span>Mas de Girucode</span>
          <ul>
            <li><a href="http://girucode.me" target="_BLANK">Web Oficial</a></li>
            <li><a href="http://girucode.tv" target="_BLANK">GiruTV</a></li>
            <li>
              <span>Redes Sociales -></span>
              <ul>
                <li><a href="https://www.facebook.com/groups/GiruCode/" target="_BLANK">Grupo Facebook</a></li>
                <li><a href="https://www.facebook.com/Girucode?ref=hl" target="_BLANK">Pagina Facebook</a></li>
                <li><a href="http://twitter.com/Girucode" target="_BLANK">Twitter</a></li>
                <li><a href="http://www.youtube.com/channel/UCx6FnLyN5lk4DaHMNQKZZWQ?feature=watch" target="_BLANK">Youtube</a></li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </nav>    
    </div>
    </div>
    <?php 
      }
      else
      {
      ?>
        <script>top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=514448035289505&redirect_uri=http://apps.facebook.com/girucode/&scope=publish_stream'</script>
      <?php
      }
    ?>
</body>
</html>
