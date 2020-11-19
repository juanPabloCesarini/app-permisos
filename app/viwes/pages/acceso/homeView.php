<?php require RUTA_APP .'/views/inc/header_inside.php';?>

<?php if ($_SESSION['rol'] =="1") : ?>
   <a class="nav-link" href="<?php echo RUTA_URL;?>/FSF/nuevo_empleado/"><span class="icon-user-plus parrafo text-white ml-3"> Nuevo Usuario</span></a>
<p class="parrafo text-white ml-3">Nómina usuarios</p>
<table class="table bg-light">
   <thead>
      <tr>
         <th class="subtitulo">Nickname</th>
         <th class="subtitulo">Nombre</th>
         <th class="subtitulo">Apellido</th>
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
                   <td><a href="<?php echo RUTA_URL;?>/FSF/reasignar_permisos/<?php echo $empleado->IDempleado;?>"><span class="btn icon-unlocked text-warning"> Reasignar permisos</span></a></td>
            <?php endif;?>
            <td><a href="<?php echo RUTA_URL;?>/FSF/editar/<?php echo $empleado->IDempleado;?>"><span class="btn icon-pencil text-success"> Editar</span></a></td>
            
            <td><a href="<?php echo RUTA_URL;?>/FSF/eliminar_empleado/<?php echo $empleado->IDempleado;?>" onclick=confirmar(<?php echo $empleado->IDempleado .','.$empleado->nombre.','.$empleado->apellido;?>)"><span class="btn icon-bin2 text-danger"> Borrar</span></a></td>
            
         </tr>
      <?php endif;?>
   <?php endforeach; ?>
   </tbody>
</table>
   <?php else:?>
      <h3><div class="row d-flex justify-content-center">Selecciona la opción para comenzar a trabajar</h3>
      <h3><div class="row d-flex justify-content-center">Vista Empleado</h3>
   <?php endif;?>
<?php require RUTA_APP .'/views/inc/footer.php';?>