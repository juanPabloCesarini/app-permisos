<?php require RUTA_APP .'/views/inc/header_inside.php';?>

<div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="bg-tit p-3 my-1">
          <h3 class="p-3">Ingreso de publicidad restaurantes</h3>
        </div>
        <div class="col-sm-12">
            <?php
                require_once('../../restoMOD/modelos/restaurantes_CRUD.php');
                $id_resto = $_GET['id'];
                $crud = new CrudResto();
                $resto = $crud->buscar_rest_id($id_resto);
                foreach ($resto as $r){
            ?>
          <form action="../controladores/editResto.php" method="post" enctype="multipart/form-data" class="formulario">
            <input type="hidden" name="id" value="<?php echo $r->getIDrestaurantes();?>">
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="nombre" class="text-white">Nombre:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="nombre" value="<?php echo $r->getNombre();?>">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="dir" class="text-white">Dirección:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="dire" value="<?php echo $r->getDireccion();?>">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="dir" class="text-white">Teléfono:</label>
              </div>
                <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="tel" value="<?php echo $r->getTelefono();?>">
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                <label for="web" class="text-white">Web:</label>
              </div>  
              <div class="form-control-lg col-sm-4">
                <input class="form-control-lg" type="text" name="web" value="<?php echo $r->getWeb();?>">
              </div>
              <div class="form-control-lg col-sm-2">
                <label for="exampleFormControlSelect1" class="text-white">Delivery:</label>
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
                <textarea class="form-control-lg" id="exampleFormControlTextarea1" rows="10" cols="80" name="descripcion" value=""><?php echo $r->getDescripcion();?></textarea>
              </div>
            </div>
            <div class="form-row my-2">
              <div class="form-control-lg col-sm-2">
                  <label for="exampleFormControlFile1"class="text-white">Logo:</label>
              </div>
              <div class="form-control-lg col-sm-4">
                  <input type="file" class="form-control-lg form-control-file text-white" name="logo" required id="exampleFormControlFile1">
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
            <div class="form-row justify-content-center">
              <div class="col-sm-6">
                <input type="submit" class="btn btn-lg btn-block btn-newResto text-uppercase font-weight-bold my-2" value="Guardar cambios" name="boton"></input>
              </div>
            </div>
          </form>
        <?php }?>
        </div>
        <a href="home-admin.php" class="btn btn-lg btn-block btn-newResto text-uppercase font-weight-bold my-2">Home</a>
      </div>
    </div>         

<?php require RUTA_APP .'/views/inc/footer.php';?>