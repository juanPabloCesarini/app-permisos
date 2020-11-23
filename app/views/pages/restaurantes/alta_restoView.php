<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class=" p-3 my-1">
          <h3 class="p-3 titulo text-light text-center">Ingreso de publicidad restaurantes</h3>
        </div>
        <div class="col-sm-12">
          <form action="<?php echo RUTA_URL;?>/FSF/resto_a_base/" method="post" enctype="multipart/form-data" >
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="nombre" class="text-white">Nombre:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="nombre">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="dir" class="text-white">Dirección:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="dire">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="dir" class="text-white">Teléfono:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="tel">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="web" class="text-white">Web:</label>
              </div>  
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="web">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="delivery" class="text-white">Delivery:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                <select class="form-control-lg" id="exampleFormControlSelect1" name="radio">
                  <option value="">-- Elegir Opción --</option>
                  <option value="No tiene">No tiene</option>
                  <option value="Hasta 1 km">Hasta 1 km</option>
                  <option value="Hasta 2 kms">Hasta 2 kms</option>
                  <option value="Hasta 3 kms">Hasta 3 kms</option>
                </select>
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="exampleFormControlTextarea1"class="text-white">Descripción:</label>
              </div>
              <div class="form-control-lg col-sm-10">
                <textarea class="form-control-lg" id="exampleFormControlTextarea1" rows="10" cols="80" name="descripcion"></textarea>
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                  <label for="exampleFormControlFile1"class="text-white">Logo:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                  <input type="file" class=" form-control-file text-white" name="img" required id="exampleFormControlFile1">
              </div>
            </div>
              <div class="form-row my-2">
              <div class="form-check form-control-lg col-sm-2">
                <label for="" class="text-white">Esta activo?</label>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <label class="form-check-label text-white" for="exampleRadios1">
                  SI
                </label>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <input class="form-check-input" type="radio" name="vigencia" id="exampleRadios1" value="SI" checked>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <label class="form-check-label text-white" for="exampleRadios1">
                  NO
                </label>
              </div>
                <div class="form-check form-control-lg col-sm-2">
                  <input class="form-check-input" type="radio" name="vigencia" id="exampleRadios1" value="NO">               
                </div>
              </div>
            <div class="form-row">
              <div class="col-sm-6">
                <input type="submit" class="btn btn-lg btn-outline-secondary btn-block text-white text-uppercase font-weight-bold my-2" value="Guardar y Seguir" name="boton"></input>
              </div>
              <div class="col-sm-6">
                <input type="submit" class="btn btn-lg btn-outline-secondary btn-block text-white  text-uppercase font-weight-bold my-2" value="Guardar y Salir"name="boton"></input>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>         
    
<?php require RUTA_APP .'/views/inc/footer.php';?>