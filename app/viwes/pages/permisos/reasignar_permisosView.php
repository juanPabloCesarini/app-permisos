<?php require RUTA_APP .'/views/inc/header_inside.php';?>

   
<div class="container-fluid px-1 py-1 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <h1 class="titulo">Reasignacion de permisos</h1>
              <div class="card form-permisos">
                  <form action="<?php echo RUTA_URL;?>/FSF/actualizar_permisos/" method="POST">
                     <input type="hidden" name="idEmpl" value="<?php echo $datos['id_Empleado'];?>">
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user-tie"> Nombre</span>
                            </label>
                            <input type="text" id="nom" name="nombre" readonly placeholder="<?php echo $datos['nombre_Empleado'];?>"></div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user-tie"> Apellido</span>
                            </label> 
                            <input type="text" id="ape" name="apellido" readonly placeholder="<?php echo $datos['apellido_Empleado'];?>"> </div>
                          </div>
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user"> Nickname</span>
                            </label>
                            <input type="text" id="nick" name="nick" readonly placeholder="<?php echo $datos['apodo_Empleado'];?>"> 
                          </div>
                          
                      </div>
                      <div >
                        
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                  <th colspan="2" class="subtitulo">Permisos Otorgados</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php foreach ($datos['lst_permisos'] as $p) : ?>
                       <tr>
                          <td class="parrafo"><?php echo $p->descripcionPermiso;?></td>
                          <td><a href="<?php echo RUTA_URL;?>/FSF/eliminar_permisoAsignado/<?php echo $p->IDpermisosAsignados;?>"><span class="btn icon-bin2 text-danger"> Borrar</span></a></td>
                       </tr>
                       <?php endforeach; ?>
                      </tbody>
                      </table>
                      <?php $cantPermisos = count($datos['lst_permisos']); ?>
                      <?php if ($cantPermisos <4):?>
                        <h4 class="parrafo text-center">Agregas más permisos?</h4>
                        <div class="align-self-end ml-auto">
                         <?php foreach ($datos['permisos_Empleado'] as $p) : ?>
                        <div class="row form-check-inline">
                            <div class="custom-control custom-control-inline">
                              <label for="checkboxes-0">
                                <input name="permisos[]" id="checkboxes-0" type="checkbox" value="<?php echo $p->IDpermisos;?>">
                                <?php echo $p->descripcionPermiso;?>
                              </label>
                            </div>
                        </div>
                        <?php endforeach;?>
                         </div>
                        <button type="submit" class="btn-guardar">Guardar</button> </div>
                      </div>
                      <?php endif;?>

                   
                  </form>
              </div>
          </div>
      </div>
  </div>

<?php require RUTA_APP .'/views/inc/footer.php';?>