<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container-fluid px-1 py-1 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <h1 class="titulo"> Usuario</h1>
              <div class="card form-nuevoempleado">
                  <form action="<?php echo RUTA_URL;?>/FSF/guardar_empleado/" method="POST">
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3"><span class="icon-user-tie"> Nombre</span></label> <input type="text" id="nom" name="nombre" placeholder="Nombre del empleado"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3"><span class="icon-user-tie"> Apellido</span></label> <input type="text" id="ape" name="apellido" placeholder="Apellido del empleado"> </div>
                          </div>
                      <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3"><span class="icon-user"> Nickname</span></label> <input type="text" id="nick" name="nick" placeholder="Ingrese un nickname para su empleado"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3"><span class="icon-key"> Contraseña</span></label> <input type="password" id="contr" name="pass" placeholder="Ingrese una contraseña para su empleado" > </div>
                      </div>
                      <div >
                        <h3 class="subtitulo">Asignación de permisos</h3>
                        <?php foreach ($datos['lst_permisos'] as $p) : ?>
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
                      <div>
                          <div class="align-self-end ml-auto"> <button type="submit" class="btn-guardar">Guardar</button> </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>