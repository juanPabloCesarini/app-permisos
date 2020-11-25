<?php require RUTA_APP .'/views/inc/header_login.php';?>


<div class="container-fluid px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              <div class="card form-email">    
                    <div class="card-header">
                        <h2 class="subtitulo">Recuperar  Contraseña</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL;?>/FSF/solicitar_clave/" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user parrafo"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Usuario" name="nick">
                            </div>
                          
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-mail parrafo"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="mail" >
                            </div>
                            
                        
                                <?php if (!empty($datos['msj'])):?>
                                  <p class="parrafo text-center text-danger"> <?php echo $datos['msj'];?></p>
                                <?php endif;?>
                                <?php if (!empty($datoMens['msj'])):?>
                                  <p class="parrafo text-center text-danger"> <?php echo $datosMens['msj'];?></p>
                                <?php endif;?>
                            

                            <div class="form-group">
                                <input type="submit" class="btn-guardar" Value="Solicitar Contraseña">
                          
                      
                               <a href="<?php echo RUTA_URL.'/FSF/modificar_clave/';?>" class="btn-guardar" >Cambiar Contraseña</a>
                            </div>
                        </form>
                    </div>
              </div>
          </div>
      </div>
 </div>


<?php require RUTA_APP .'/views/inc/footer.php';?>