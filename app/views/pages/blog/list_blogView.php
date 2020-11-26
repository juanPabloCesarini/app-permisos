<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">

<p class="parrafo text-white text-center">Posteos</p>
<div class="container">
<table class="table bg-light">
   <thead>
      <tr class="bg-dark">
         <th class="parrafo text-white">Categoría </th>
         <th class="parrafo text-white">Autor</th>
         <th class="parrafo text-white">Fecha de Publicación</th>
         <th class="parrafo text-white">Título</th>
         <?php if($_SESSION['rol']=="2"):?>
         <?php foreach ($_SESSION['permisos'] as $p):?>
          
         <?php if($p->descripcionPermiso == "UPDATE"):?>
            <th class="text-center"><span class=" subtitulo icon-pencil text-success"></span> </th>
         <?php endif;?>
         <?php if($p->descripcionPermiso == "DELETE"):?>
            <th class="text-center"><span class=" subtitulo icon-bin2 text-danger"></span> </th>
         <?php endif;?>
         <?php endforeach;?>
         <?php else:?>
            <th class="text-center"><span class=" subtitulo icon-pencil text-success"></span> </th>
            <th class="text-center"><span class=" subtitulo icon-bin2 text-danger"></span> </th>
         <?php endif;?>
      </tr>
   </thead>
   <tbody>
   <?php foreach ($datos['posteos'] as $post) : ?>
        
         <tr style='background:<?php echo $post->color;?>'>
            <th><?php echo $post->nombre;?></th>
            <td><?php echo $post->apellido .','. $post->nombreAutor;?></td>
            <td><?php echo date('d/m/Y', strtotime($post->fechaPublicacion));?></td>
            <td><?php echo $post->titulo;?></td>
            <?php if($_SESSION['rol']=="2"):?>
            <?php foreach ($_SESSION['permisos'] as $p):?>
          
               <?php if($p->descripcionPermiso == "UPDATE"):?>
                  <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/editar_blog/<?php echo $post->IDnovedad;?>"class="btn btn-outline-success ">Editar</a></td>
               <?php endif;?>
               <?php if($p->descripcionPermiso == "DELETE"):?>
                  <td class="text-center"><a href="#" onclick="confirmar(<?php echo $post->IDnovedad;?>,'<?php echo $post->titulo;?>',null,'post')" class="btn btn-outline-danger">Borrar</a></td>
               <?php endif;?>
            <?php endforeach;?>
               <?php else:?>
                  <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/editar_blog/<?php echo $post->IDnovedad;?>"class="btn btn-outline-success ">Editar</a></td>
                  <td class="text-center"><a href="#" onclick="confirmar(<?php echo $post->IDnovedad;?>,'<?php echo $post->titulo;?>',null,'post')" class="btn btn-outline-danger">Borrar</a></td>
               <?php endif;?>
         </tr>
   <?php endforeach; ?>
   </tbody>
</table>
</div>
   
<?php require RUTA_APP .'/views/inc/footer.php';?>