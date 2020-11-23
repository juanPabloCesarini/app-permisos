<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container px-1 py-1 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <div class="card form-nuevoempleado">
                 <div class="card-header">
                    <h2 class="subtitulo">Alta de Empleados</h2>
                 </div>
                 <div class="card-body">
                  <form action="<?php echo RUTA_URL;?>/FSF/guardar_empleado/" method="POST">
                      <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" >
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nickname" name="nick" >
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-key parrafo"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contraseña" name="pass" >
                            </div>

                      <div class="container">
                        <p class="parrafo">Asignación de permisos</p>
                        <?php foreach ($datos['lst_permisos'] as $p) : ?>
                        <div class="row form-check-inline">
                            <div class="custom-control custom-control-inline">
                              <label>
                                <input name="permisos[]" id="permisos" type="checkbox" value="<?php echo $p->IDpermisos;?>">
                                <?php echo $p->descripcionPermiso;?>
                              </label>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                      <div>
                          <div class="align-self-end ml-auto"> <button type="submit" class="btn-guardar">Guardar</button> </div>
                      </div>
                  </form>
                 </div>
              </div>
          </div>
      </div>
  </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>