<?php// session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/estilos.css">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/bootstrap.css">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/iconmoon/iconos.css">
   <link rel="shortcut icon" href="<?php echo RUTA_URL?>/img/logofsf.ico" type="image/x-icon">
   <title><?php echo NOMBRESITIO;?> </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-3">
  <span class="navbar-brand mb-0 h1"><img src="<?php echo RUTA_URL;?>/img/logo-FSF.png" id="logo" />
   <?php echo "<p class='parrafo text-white'>Hola " .$_SESSION['nick']."</p>";?>
  </span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/home/"><span class="icon-home3 parrafo text-white "> Home</spam></a>
      </li>
      <li class="nav-item">
        
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="icon-spoon-knife parrafo text-white"> Administrar Restaurantes</span>      
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_resto/">Dar de Alta</a>
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/buscarRestaurantes/SI">Listar Activos</a>
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/buscarRestaurantes/NO">Listar Inactivos</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="icon-newspaper parrafo text-white"> Administrar Blog</span>      
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_blog/">Dar de Alta</a>
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/listar_blog/">Listar</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/logout/"><span class="icon-exit parrafo text-white"> Salir</spam></a>
      </li>
    </ul>
  </div>
</nav>
   
   
      
    