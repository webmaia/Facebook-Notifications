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
      'ref' => 'Notification sent '.$dNow->format("Y-m-d G:i:s") //this is for Facebook's insight

      $params = array(
              'href' => $href,
              'template' => $message,
          );

      //$facebook->api('/' . $userID . '/notifications/', 'post', $params);
    ?>