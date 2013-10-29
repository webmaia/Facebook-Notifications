<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
  <!--[if lte IE 8]><script src="<?php echo base_url(); ?>js/index/html5shiv.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>js/index/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/index/jquery.dropotron.js"></script>
    <script src="<?php echo base_url(); ?>js/index/skel.min.js"></script>
    <script src="<?php echo base_url(); ?>js/index/skel-panels.min.js"></script>
    <script src="<?php echo base_url(); ?>js/index/init.js"></script>

      <link rel="stylesheet" href="<?php echo base_url(); ?>css/index/style.css" />
      <noscript>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/index/skel-noscript.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/index/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/index/style-noscript.css" />
      </noscript>

    <!--[if lte IE 8]><link rel="stylesheet" href="<?php //echo base_url(); ?>css/index/css/ie8.css" /><![endif]-->
</head>
<body class="homepage">
  <?php
    //if (@$user){
    ?>
    <div id="salida">
      <div id="header">
      <div class="inner">
        <header>
          <h1 id="logo">Fundación Girucode</h1>
          <h5>v1.0 Developed by<a href="https://www.facebook.com/angel.kurten?ref=tn_tnmn"> Angel Kurten</a></h5>
          <hr />
          <span class="byline">
            Bienvenid@ <?php echo $user['name'] ?>, esta aplicacion te permite mantenerte en contacto con nosotros, 
            permitiendonos informarte de cualquier evento realizado por Girucode.
          </span>
        </header>
        <footer>
          <?php
            //if(@$_GET['live']=='yes') {
          ?>
            Ver la noticia: <br>
            <a href="https://www.facebook.com/notes/fundacion-girucode/actualizacion-girucode-notificaciones/657145040974020" class="button" target="_BLANK">Ir</a>
          <?php
            //}
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
</body>
</html>