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
<div class="text-right texto-nick">
  <span><i class="icon-user"></i><?php echo ' ' .$_SESSION['nick'];?></span>
</div>


<nav class="navbar navbar-expand-md navbar-dark bg-dark textonav" >
  <span class="navbar-brand mb-0 h1"><img src="<?php echo RUTA_URL;?>/img/logo-FSF.png" id="logo" />
   
  </span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center mb-4" id="navbarNav">
   
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/home/">
         <span><i class="icon-home3 text-white"></i></spam> Home
        </a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="icon-user text-white"></span> Mi Perfil     
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/editar_empleado/<?php echo $_SESSION['idEmpl'];?>">Actualizar Perfil</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="icon-spoon-knife text-white"></span> Administrar Restaurantes      
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php if($_SESSION['rol']=="2"):?> 
        <?php foreach ($_SESSION['permisos'] as $p):?>
          
          <?php if($p->descripcionPermiso == "CREATE"):?>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_resto/" >Dar de Alta</a>
          <?php endif;?>

        <?php endforeach;?>
        <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/lista_restaurantes/">Listar</a>
          <?php else:?>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_resto/" >Dar de Alta</a>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/lista_restaurantes/">Listar</a>
          <?php endif;?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <span class="icon-newspaper  text-white"></span> Administrar Blog      
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php if($_SESSION['rol']=="2"):?>
        <?php foreach ($_SESSION['permisos'] as $p):?>

          <?php if($p->descripcionPermiso == "CREATE"):?>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_blog/" >Dar de Alta</a>
          <?php endif;?>
          <?php endforeach;?>
          
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/listar_blog/">Listar</a>
  
          
          <?php else:?>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/alta_blog/" >Dar de Alta</a>
            <a class="dropdown-item" href="<?php echo RUTA_URL;?>/FSF/listar_blog/">Listar</a>
          <?php endif;?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/logout/"><span><i class="icon-exit text-white"></i></spam> Salir</a>
      </li>
    </ul>
    
  </div>
  
  </nav>
        

   
   
      
    