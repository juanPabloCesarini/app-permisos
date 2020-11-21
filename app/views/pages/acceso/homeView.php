<?php require RUTA_APP .'/views/inc/header_inside.php';?>

<?php if ($_SESSION['rol'] =="1") : ?>
   <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/nuevo_empleado/"><span class="icon-user-plus parrafo text-white ml-3"> Nuevo Usuario</span></a>
<p class="parrafo text-white text-center">Nómina usuarios</p>
<div class="container">
<table class="table bg-light">
   <thead>
      <tr>
         <th class="subtitulo">Nickname</th>
         <th class="subtitulo">Nombre</th>
         <th class="subtitulo">Apellido</th>
         <th class="text-center"><span class=" subtitulo icon-unlocked text-primary"></span> </th>
         <th class="text-center"><span class=" subtitulo icon-pencil text-success"></span> </th>
         <th class="text-center"><span class=" subtitulo icon-bin2 text-danger"></span> </th>

      </tr>
   </thead>
   <tbody>
   <?php foreach ($datos['empleados'] as $empleado) : ?>
      <?php if ($empleado->IDempleado != $_SESSION['idEmpl']) : ?>
         <tr>
            <th><?php echo $empleado->usuario;?></th>
            <td><?php echo $empleado->nombre;?></td>
            <td><?php echo $empleado->apellido;?></td>
            
            <?php if ($empleado->rol == "2") : ?>
                   <td><a href="<?php echo RUTA_URL;?>/FSF/reasignar_permisos/<?php echo $empleado->IDempleado;?>" class="btn btn-outline-primary">Reasignar permisos</a></td>
            <?php endif;?>
            <td><a href="<?php echo RUTA_URL;?>/FSF/editar_empleado/<?php echo $empleado->IDempleado;?>"class="btn btn-outline-success ">Editar</a></td>
            
            <td><a href="#" onclick=confirmar(<?php echo $empleado->IDempleado;?>,'<?php echo $empleado->nombre;?>','<?php echo $empleado->apellido;?>') class="btn btn-outline-danger">Borrar</a></td>
            
         </tr>
      <?php endif;?>
   <?php endforeach; ?>
   </tbody>
</table>
</div>
   <?php else:?>
   <div class="container m-5">
      <p class="subtitulo text-light text-center">
         Friends Software Factory<br>te desea una jornada colmada de éxito
      </p>
   </div>
   <?php endif;?>
<?php require RUTA_APP .'/views/inc/footer.php';?>