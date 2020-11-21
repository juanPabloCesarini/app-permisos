
<?php require RUTA_APP .'/views/inc/header_login.php';?>
<div class="container-fluid px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <div class="card form-contraseña">    
                    <div class="card-header">
                        <h2 class="subtitulo">Cambie su Contraseña</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL;?>/FSF/setear_clave_nueva/" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Usuario" name="nick">
                            </div>
                          
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-key parrafo"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contraseña actual" name="pwd_act" >
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-key parrafo"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contraseña nueva" name="pwd1" >
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-key parrafo"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder=" Reingrese contraseña " name="pwd2" >
                            </div>
                            
                  
                            <?php if (!empty($datos['msj'])==1):?>
                                <p class="text-danger text-center"><b><?php echo $datos['msj'];?></b></p>
                            <?php endif;?>
                            <div class="form-group">
                                <input type="submit" class="btn-guardar" Value="Enviar Cambios">
                            </div>
                        </form>
                    </div>
              </div>
          </div>
      </div>
 </div>
    

<?php require RUTA_APP .'/views/inc/footer.php';?>