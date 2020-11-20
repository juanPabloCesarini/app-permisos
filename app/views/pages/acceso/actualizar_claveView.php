
<?php require RUTA_APP .'/views/inc/header_login.php';?>
<div class="container-fluid px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <div class="card form-contraseña">
                  <form action="<?php echo RUTA_URL;?>/FSF/setear_clave_nueva/" method="POST">
                  <div>
                    <div class="card-header">
                        <h3>Cambie su Contraseña</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <label for="nick">Nickname</label>
                          <input type="text" id="nick" name="nick" placeholder="Ingrese su nickname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Contraseña actual</label>
                            <input type="password" id="pwd" name="pwd_act" placeholder="Ingrese su contraseña actual" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nueva contraseña</label>
                            <input type="password" id="pwd" name="pwd1" placeholder="Ingrese su contraseña nueva" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Valide su nueva contraseña</label>
                            <input type="password" id="pwd" name="pwd2" placeholder="Reescriba su contraseña" class="form-control">
                        </div>
                        <?php if (!empty($datos['msj'])==1):?>
                          <p class="parrafo"><b><?php echo $datos['msj'];?></b></p>
                        <?php endif;?>
                        <div class="form-group">
                            <input type="submit" class="btn-guardar" data-toggle="modal" data-target="#myModal" Value="Guardar Cambios">
                        </div>
                    </div>
                </div>
                </form>
              </div>
          </div>
      </div>
 </div>
    

<?php require RUTA_APP .'/views/inc/footer.php';?>