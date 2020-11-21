<?php require RUTA_APP .'/views/inc/header_login.php';?>

<div class="container">
      <div class="d-flex justify-content-center h-100">
        <div class="card form-login">
          <div class="card-header">
              <h2 class="subtitulo">Iniciar Sesión</h2>
          </div>
          <div class="card-body">
            <form action="<?php echo RUTA_URL;?>/FSF/permitir_entrar/" method="POST">
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
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" >
              </div>
            
              <?php if (!empty($datos['msj'])==1):?>
              <div class="d-flex justify-content-center">
                  <p class="text-danger text-center"><b><?php echo $datos['msj'];?></b></p>
              </div>
            <?php endif;?>
        
              <div class="d-flex justify-content-center">
                <a href="<?php echo RUTA_URL;?>/FSF/modificar_clave/" class="ml-2 mr-2 mt-1" style="text-decoration:none">Antes de loguearte por primera vez debes cambiar tu contraseña</a>
              </div>  
              <div class="d-flex justify-content-center">  
                <a href="<?php echo RUTA_URL;?>/FSF/pedir_clave_nueva/" class="ml-2 mr-2 mt-1" style="text-decoration:none">Te olvidaste la contraseña?</a>
              </div>
              <div class="form-group justify-content-center d-flex">
                  <input type="submit" value="Entrar" class="btn-guardar">
              </div>
            </form>
          </div>
        </div>
      </div>
</div>

<?php require RUTA_APP .'/views/inc/footer.php';?>
