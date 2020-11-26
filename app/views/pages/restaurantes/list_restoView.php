<?php require RUTA_APP .'/views/inc/header_inside.php';?>
   
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 col-md-6">
         <h3 class="subtitulo text-center">Restaurantes activos</h3>
         <table class="table bg-light">
            <thead>
               <tr class="bg-dark">
      	         <th class="subtitulo text-white text-center">Logo</th>
                  <th class="subtitulo text-white text-center">Nombre</th>
                  <th class="subtitulo text-white text-center">Dirección</th>
                  <?php foreach ($_SESSION['permisos'] as $p):?>
          
          <?php if($p->descripcionPermiso == "UPDATE"):?>
             <th class="text-center"><span class=" subtitulo icon-pencil text-success"></span> </th>
          <?php endif;?>
          <?php if($p->descripcionPermiso == "DELETE"):?>
             <th class="text-center"><span class=" subtitulo icon-bin2 text-danger"></span> </th>
          <?php endif;?>
          <?php endforeach;?>
               </tr>
            </thead>
            <tbody>
            <?php foreach ($datos['resto'] as $r) : ?>
               <?php if ($r->estaActivo=='SI'):?>
                  <tr>
                     <td class="text-center"> <img class="img_logo" src="<?php echo RUTA_URL?>/img/logoResto/<?php echo $r->logo;?>"></td>
                     <td><?php echo $r->nombre;?></td>
                     <td><?php echo $r->direccion;?></td>
                     <?php foreach ($_SESSION['permisos'] as $p):?>
          
          <?php if($p->descripcionPermiso == "UPDATE"):?>
             <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/edit_resto/<?php echo $r->IDrestaurantes;?>" class="btn btn-outline-success ">Editar</a></td>
          <?php endif;?>
          <?php if($p->descripcionPermiso == "DELETE"):?>
             <td class="text-center"><a href="#" class="btn btn-outline-danger " onclick="confirmar('<?php echo $r->IDrestaurantes;?>','<?php echo $r->nombre;?>',null,'resto')">Borrar</a></td>
          <?php endif;?>
       <?php endforeach;?>
                  </tr>
               <?php endif;?>
            <?php endforeach; ?>
            </tbody>
         </table>
      </div>
      <div class="col-sm-12 col-md-6">
         <h3 class="subtitulo text-center">Restaurantes Inactivos</h3>
         <table class="table bg-light">
            <thead>
               <tr class="bg-dark">
               	<th class="subtitulo text-white text-center">Logo</th>
                  <th class="subtitulo text-white text-center">Nombre</th>
                  <th class="subtitulo text-white text-center">Dirección</th>
                  <?php foreach ($_SESSION['permisos'] as $p):?>
          
          <?php if($p->descripcionPermiso == "UPDATE"):?>
             <th class="text-center"><span class=" subtitulo icon-pencil text-success"></span> </th>
          <?php endif;?>
          <?php if($p->descripcionPermiso == "DELETE"):?>
             <th class="text-center"><span class=" subtitulo icon-bin2 text-danger"></span> </th>
          <?php endif;?>
          <?php endforeach;?>
               </tr>
            </thead>
            <tbody>
            <?php foreach ($datos['resto'] as $r) : ?>
               <?php if ($r->estaActivo=='NO'):?>
                  <tr>
                     <td class="text-center"> <img class="img_logo" src="<?php echo RUTA_URL?>/img/logoResto/<?php echo $r->logo;?>"></td>
                     <td><?php echo $r->nombre;?></td>
                     <td><?php echo $r->direccion;?></td>
                     <?php foreach ($_SESSION['permisos'] as $p):?>
          
                        <?php if($p->descripcionPermiso == "UPDATE"):?>
                           <td class="text-center"><a href="<?php echo RUTA_URL;?>/FSF/edit_resto/<?php echo $r->IDrestaurantes;?>" class="btn btn-outline-success ">Editar</a></td>
                        <?php endif;?>
                        <?php if($p->descripcionPermiso == "DELETE"):?>
                           <td class="text-center"><a href="#" class="btn btn-outline-danger " onclick="confirmar('<?php echo $r->IDrestaurantes;?>','<?php echo $r->nombre;?>',null,'resto')">Borrar</a></td>
                        <?php endif;?>
                     <?php endforeach;?>
                   </tr>
               <?php endif;?>
            <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
 
</div>
<?php require RUTA_APP .'/views/inc/footer.php';?>