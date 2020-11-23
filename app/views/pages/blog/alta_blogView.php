<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
      <div class="row justify-content-center vh-100">
          <div class="row">
            <div class="lila p-3 my-1 text-center">
                <h3 class="p-3">Panel redacción de noticias</h3>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-12 col-md-4 justify-content-center">
                <div class="row mt-5 text-center justify-content-center">
                    <h3 class="lila p-3">
                        Paso 1: Ingresar Categoría
                    </h3>
                    <form action="../controladores/alta_blogView.php" method="post" class="formulario">
                        <input type="hidden" name="form" value="categoria">
                        <div class="form-row my-2">
                            <div class="form-group col-sm-6">
                                <label for="nombre" class="text-white">Nombre de la categoría:</label>
                            </div>
                            <div class="form-group col-sm-6">
                                <input class="form-control" type="text" name="nombreCateg">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-lg btn-block text-white lila my-2" value="Guardar"></input>
                        </div>
                        <?php
                        $err =$_GET['error'];
                        if (isset($err)!= NULL){
                            echo "<div class='text-white'>{$_GET['error']}</div>";
                        }
                        ?>
                    </form>
                </div>
                <div class="row mt-5 text-center justify-content-center">
                    <h3 class="lila p-3">
                        Paso 2: Ingresar Autores
                    </h3>
                     <form action="../controladores/control_news.php" method="post" enctype="multipart/form-data" class="formulario">
                        <input type="hidden" name="form" value="autor">
                        <div class="form-row my-2">
                            <div class="form-group col-sm-4">
                                <label for="nombre" class="text-white">Nombre:</label>
                            </div>
                            <div class="form-group col-sm-8">
                                <input class="form-control" type="text" name="nombreAutor">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-4">
                                <label for="dir" class="text-white">Apellido:</label>
                            </div>
                            <div class="form-group col-sm-8">
                                <input class="form-control" type="text" name="apeAutor">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-4">
                                <label for="exampleFormControlFile1"class="text-white">Foto:</label>
                            </div>
                            <div class="form-group col-sm-8">
                                <input type="file" class=" form-control-file text-white" name="foto" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-lg btn-block text-white lila my-2" value="Guardar" name="botonAutor"></input>
                        </div>
                    </form>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 justify-content-center">
                  <div class="text-center mt-5 justify-content-center">
                    <h3 class="lila p-3">
                        Paso 3: Ingresar Noticias
                    </h3>
                    <form action="../controladores/control_news.php" method="post"enctype="multipart/form-data" class="formulario">
                        <input type="hidden" name="form" value="news">
                        <div class="form-row my-2">
                            <div class="form-group col-sm-3">
                                <label for="titulo" class="text-white">Título:</label>
                            </div>
                            <div class="form-group col-sm-9">
                                <input class="form-control" type="text" name="titulo">
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-3">
                                <label for="primerParrafo" class="text-white">Primer Párrafo:</label>
                            </div>
                            <div class="form-group col-sm-9">
                                <textarea name="primerParrafo" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-3">
                                <label for="contenido" class="text-white">Contenido:</label>
                            </div>
                            <div class="form-group col-sm-9">
                                <textarea name="contenido" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-3">
                                <label for="correccion" class="text-white">Fe de erratas:</label>
                            </div>
                            <div class="form-group col-sm-9">
                                <textarea name="correccion" class="form-control" id="" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-6">
                               <label for="categoria" class="text-white">Categoría:</label>           
                               <select name="categoria" class="form-control text-center" >
                                    <option value='0'>--Elegir Categoría--</option>';
                                    <?php
                                        require_once('../../newsMOD/modelos/news_CRUD.php');
                                        $crud= new CrudNews();
                                        $categorias = $crud->buscar_categorias();
                                        foreach($categorias as $cat){
                                            echo "<option  value='{$cat->getIDcategoria()}'>
                                                    <p>{$cat->getNombre()}</p>
                                                  </option>";
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                               <label for="autor" class="text-white">Autores:</label>           
                               <select name="autor" class="form-control" >
                                    <option value='0'>--Elegir Autor--</option>';
                                    <?php
                                        require_once('../../newsMOD/modelos/news_CRUD.php');
                                        $crud= new CrudNews();
                                        $autores = $crud->buscar_autores();
                                        foreach($autores as $aut){
                                            echo "<option  value='{$aut->getIDautor()}'>
                                                    <p>{$aut->getApellido()}, {$aut->getNombre()}</p>
                                                  </option>";
                                            }
                                        ?>
                                        
                                </select>
                            </div>
                        </div>
                        <div class="form-row my-2">
                            <div class="form-group col-sm-4">
                                <label for="exampleFormControlFile1"class="text-white">Imagen:</label>
                            </div>
                            <div class="form-group col-sm-8">
                                <input type="file" class=" form-control-file text-white" name="imagen" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-lg btn-block text-white lila my-2" value="Guardar"></input>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
        <a href="sugar-admin.php" class="btn btn-lg text-white btn-block lila text-uppercase font-weight-bold my-2">Home</a>
      </div>
    </div>

<?php require RUTA_APP .'/views/inc/footer.php';?>