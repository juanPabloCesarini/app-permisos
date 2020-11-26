<?php require RUTA_APP .'/views/inc/header_inside.php';?>

<?php if ($_SESSION['rol'] =="1") : ?>
   <a class="nav-link parrafo text-white" href="<?php echo RUTA_URL;?>/FSF/nuevo_empleado/"><span class="icon-user-plus ml-4"></span> Nuevo Empleado</a>
<p class="parrafo text-white text-center">Nómina empleados</p>
<div class="container">
<table class="table bg-light">
   <thead>
      <tr class="bg-dark">
         <th class="parrafo text-white">Nickname</th>
         <th class="parrafo text-white">Nombre</th>
         <th class="parrafo text-white">Apellido</th>
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
                   <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/reasignar_permisos/<?php echo $empleado->IDempleado;?>" class="btn btn-outline-primary">Reasignar permisos</a></td>
            <?php endif;?>
            <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/editar_empleado/<?php echo $empleado->IDempleado;?>"class="btn btn-outline-success ">Editar</a></td>
            
            <td class="text-center"><a href="#" onclick=confirmar(<?php echo $empleado->IDempleado;?>,'<?php echo $empleado->nombre;?>','<?php echo $empleado->apellido;?>','empleado') class="btn btn-outline-danger">Borrar</a></td>
            
         </tr>
      <?php endif;?>
   <?php endforeach; ?>
   </tbody>
</table>
</div>
   <?php else:?>
   <div class="container">
      <h1 class="titulo text-center">Bienvenid@</h1>
      <h4 class="parrafo">Con esta plataforma vas a poder realizar los cambios sin necesidad de contratar servicios de terceros</h4>
   </div>
   <?php endif;?>
<?php require RUTA_APP .'/views/inc/footer.php';?>