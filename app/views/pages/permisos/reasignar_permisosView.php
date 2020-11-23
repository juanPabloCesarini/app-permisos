<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
    <h3 class="titulo text-center">Reasignación de Permisos</h3>
    <h5 class="subtitulo text-center">Permisos otorgados a <?php echo $datos['apellido_Empleado'].','.' '.$datos['nombre_Empleado'];?></h5>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-9">"
            <div class="container">
                <div class="row">
                <?php foreach ($datos['lst_permisos'] as $p) : ?>
                    <div class="col-sm-12 col-md-3 text-center">
                        <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $p->descripcionPermiso;?></h5>
                                <a href="<?php echo RUTA_URL;?>/FSF/eliminar_permisoAsignado/<?php echo $p->IDpermisosAsignados;?>" class="card-link">Eliminar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                </div>           
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="container bg-dark">
                <p class="parrafo text-white text-center">Nuevos Permisos</p>
                <form action="<?php echo RUTA_URL;?>/FSF/actualizar_permisos/" method="POST">
                     <input type="hidden" name="idEmpl" value="<?php echo $datos['id_Empleado'];?>">
                     <?php foreach ($datos['permisos_Empleado'] as $p) : ?>
                        <div class="row form-check-inline">
                            <div class="custom-control custom-control-inline ml-4">
                              <label class="text-white">
                                <input  name="permisos[]" id="checkboxes-0" type="checkbox" value="<?php echo $p->IDpermisos;?>">
                                <?php echo $p->descripcionPermiso;?>
                              </label>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php if (!empty($datos['msj'])==1):?>
                                <div class="d-flex justify-content-center">
                                    <div class="alert alert-danger text-center" role="alert">
                                        <?php echo $datos['msj'];?>
                                    </div>
                                </div>
                        <?php endif;?>
                            
                        <div class="text-center pb-2">
                            <button type="submit" class="btn-guardar">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require RUTA_APP .'/views/inc/footer.php';?>