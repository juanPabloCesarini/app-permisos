<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container px-1 py-1 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <div class="card form-nuevoempleado">
                 <div class="card-header">
                    <h2 class="subtitulo">Corrección de datos de usuario</h2>
                 </div>
                 <div class="card-body">
                  <form action="<?php echo RUTA_URL;?>/FSF/actualizar_empleado/" method="POST">
                            <input type="hidden" name="idEmpl" value="<?php echo $datos['id_empleado'];?>"> 
                             <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $datos['nombre_empleado'];?>" name="nombre">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $datos['apellido_empleado'];?>" name="apellido" >
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $datos['nick_empleado'];?>" name="nick" >
                            </div>
                            
                      
                      <div>
                          <div class="align-self-end ml-auto"> <button type="submit" class="btn-guardar">Guardar Cambios</button> </div>
                      </div>
                  </form>
                 </div>
              </div>
          </div>
      </div>
  </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>