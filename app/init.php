<?php
  session_start();
  // se cargan las librerías
  require_once 'config/configurar.php';
  require_once 'helpers/url_helper.php';
  require_once 'helpers/generador_colores.php';
  require_once 'helpers/generador_clave_helper.php';
  require_once 'includesMails/class.phpmailer.php.';
  require_once 'includesMails/class.pop3.php';
  require_once 'includesMails/class.smtp.php';

  

  //require_once "lib/Base.php";
  //require_once "lib/Controller.php";
  //require_once "lib/Core.php";

  // autoload php

  spl_autoload_register(function($nombreClase){
    require_once 'lib/'.$nombreClase.'.php';
  });
  
?>