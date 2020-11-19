<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<?php if ($datos['lst_resto'][0]->estaActivo == "SI"):?>
<h1 class ="text-center text-white">Restaurantes Vigentes</h1>
<?php else:?>
	<?php if (empty($datos['lst_resto'])):?>
		<h4 class ="text-center text-white">No hay restaurantes inactivos por el momento</h4>
	<?php endif;?>		
<h1 class ="text-center text-white">Restaurantes Inactivos</h1>
<?php endif;?>
<table class="table">
   <thead>
      <tr>
      	 <th>Logo</th>
         <th>Nombre</th>
         <th>Direccion</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach ($datos['lst_resto'] as $r) : ?>
         <tr>
            
            <td> <img src="<?php echo RUTA_URL; ?>/img/<?php echo $r->logo;?>"></td>
            <td><?php echo $r->nombre;?></td>
            <td><?php echo $r->direccion;?></td>
            <td><a href="<?php echo RUTA_URL;?>/FSF/editar/<?php echo $r->IDrestaurantes;?>"><span class="btn icon-pencil text-success">Editar</a></td>
            <td><a href="<?php echo RUTA_URL;?>/FSF/eliminar_usuario/<?php echo $r->IDrestaurantes;?>"><span class="btn icon-bin2 text-danger">Borrar</a></td>
         </tr>
   <?php endforeach; ?>
   </tbody>
</table>

<?php require RUTA_APP .'/views/inc/footer.php';?>