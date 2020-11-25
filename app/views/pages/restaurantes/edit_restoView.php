<?php require RUTA_APP .'/views/inc/header_inside.php';?>

<div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="p-3 my-1">
          <h3 class="p-3 titulo">Actualización de publicidad restaurantes</h3>
        </div>
        <div class="col-sm-12 card form-empleados">
        
        
          <form action="<?php echo RUTA_URL;?>/FSF/modi_resto/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $datos['resto'][0]->IDrestaurantes;?>">
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-6 m-5">
                  <img class="img_logo m-3" src="<?php echo RUTA_URL?>/img/logoResto/<?php echo $datos['resto'][0]->logo;?>">
                  <input type="file" class="form-control-lg form-control-file" name="img" id="exampleFormControlFile1">
              </div>
            </div>
            <div class="form-row my-2 mt-3">
              <div class="form-control-lg col-sm-2">
                <label for="nombre" >Nombre:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="nombre" value="<?php echo $datos['resto'][0]->nombre;?>">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="dir" >Dirección:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="dire" value="<?php echo $datos['resto'][0]->direccion;?>">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="dir" >Teléfono:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="tel" value="<?php echo $datos['resto'][0]->telefono;?>">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="web" >Web:</label>
              </div>  
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="web" value="<?php echo $datos['resto'][0]->web;?>">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="exampleFormControlSelect1">Delivery:</label>
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
                <label for="exampleFormControlTextarea1">Descripción:</label>
              </div>
              <div class="form-control-lg col-sm-10">
                <textarea class="form-control-lg" id="exampleFormControlTextarea1" rows="10" cols="80" name="descripcion" value=""><?php echo $datos['resto'][0]->descripcion;?></textarea>
              </div>
            </div>
        
              <div class="form-row my-2">
              <div class="form-check form-control-lg col-sm-2">
                <label for="">Esta activo?</label>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <label class="form-check-label" for="exampleRadios1">
                  SI
                </label>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <input class="form-check-input" type="radio" name="vigencia" id="exampleRadios1" value="SI" checked>
              </div>
              <div class="form-check form-control-lg col-sm-2">
                <label class="form-check-label" for="exampleRadios1">
                  NO
                </label>
              </div>
                <div class="form-check form-control-lg col-sm-2">
                  <input class="form-check-input" type="radio" name="vigencia" id="exampleRadios1" value="NO">               
                </div>
              </div>
            <div class="form-row justify-content-center">
              <div class="col-sm-6">
                <input type="submit" class="btn btn-lg btn-outline-secondary btn-block text-white  text-uppercase font-weight-bold my-2" value="Guardar cambios" name="boton"></input>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>         

<?php require RUTA_APP .'/views/inc/footer.php';?>