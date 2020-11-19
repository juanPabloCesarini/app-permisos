<?php require RUTA_APP .'/views/inc/header_login.php';?>
<div class="container-fluid px-1 py-1 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <h1 class="titulo">Recuperar clave</h1>
              <div class="card form-permisos">
                  <form action="<?php echo RUTA_URL;?>/FSF/solicitud_clave/" method="POST">
                     <input type="hidden" name="idEmpl" value="<?php echo $datos['id_Empleado'];?>">
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user-tie"> Nombre</span>
                            </label>
                            <input type="text" id="nom" name="nombre" readonly placeholder="ingrese su nombre"></div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user-tie"> Apellido</span>
                            </label> 
                            <input type="text" id="ape" name="apellido" readonly placeholder="ingrese su apellido"></div>
                          </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-user"> Nickname</span>
                            </label>
                            <input type="text" id="nick" name="nick" readonly placeholder="ingrese su nickname"></div>
                          <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">
                              <span class="icon-mail"> Email</span>
                            </label> 
                            <input type="email" id="mail" name="email" readonly placeholder="ingrese su email"></div>
                          </div>
                          <div>
                          <button type="submit" class="btn-guardar">solicitar</button>
                          </div> 
                        </div>
                        

                   
                  </form>
              </div>
          </div>
      </div>
  </div>


<?php require RUTA_APP .'/views/inc/footer.php';?>