<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
    <div class=" my-1 text-center">
        <h2 class="subtitulo text-white">Panel redacción de noticias</h2>
    </div>
    <div class="row form-altablog">
        <div class="col-sm-12 col-md-6">
            <h4 class="parrafo text-center"> Paso 1: Ingresar Categoria</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/alta_categ/" method="post">
            <div class="form-row my-2">
                <div class="form-group col-sm-6">
                    <label for="nombre" class="text-dark">Nombre de la categoría:</label>
                </div>
            <div class="form-group col-sm-6">
                <input class="form-control" type="text" name="nombreCateg">
            </div>
            </div>
            <div class="col-sm-12">
                <input type="submit" class="btn-guardar btn-lg btn-block text-white my-2" value="Guardar"></input>
            </div>
                <?php if (!empty($datos['errorCat'])):?>
                    <p class="parrafo text-center text-danger"><?php echo $datos['errorCat']; ?></p>
                <?php endif;?>
        </form>
            <h4 class="parrafo text-center"> Paso 2: Ingresar Autor</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/alta_autor/" method="post" enctype="multipart/form-data" >
            <div class="form-row my-2">
                <div class="form-group col-sm-3">
                    <label for="nombre" class="text-dark">Nombre:</label>
                </div>
                <div class="form-group col-sm-9">
                    <input class="form-control" type="text" name="nombreAutor">
                </div>
            </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="dir" class="text-dark">Apellido:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <input class="form-control" type="text" name="apeAutor">
                </div>
            </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="exampleFormControlFile1"class="text-dark">Foto:</label>
                    </div>
                    <div class="form-group col-sm-9">
                        <input type="file" class=" form-control-file text-dark" name="foto" id="exampleFormControlFile1">
                    </div>
                </div>
                    <div class="col-sm-12">
                        <input type="submit" class="btn-guardar btn-lg btn-block text-white  my-2" value="Guardar" name="botonAutor"></input>
                    </div>
        </form>
        </div>

        <div class="col-sm-12 col-md-6">
            <h4 class="parrafo text-center"> Paso 3: Ingresar Post</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/alta_post/" method="post"enctype="multipart/form-data" >
            <input type="hidden" name="form" value="news">
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="titulo" class="text-dark">Título:</label>
                    </div>
                    <div class="form-group col-sm-9">
                        <input class="form-control" type="text" name="titulo">
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="primerParrafo" class="text-dark">Primer Párrafo:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="primerParrafo" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="contenido" class="text-dark">Contenido:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="contenido" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="correccion" class="text-dark">Fe de erratas:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="correccion" class="form-control" id="" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-row my-2">
                     <div class="form-group col-sm-6">
                        <label for="categoria" class="text-dark">Categoría:</label>           
                            <select name="categoria" class="form-control text-center" >
                                 <option value='0'>--Elegir Categoría--</option>';
                                    <?php foreach ($datos['categorias'] as $cat):?>

                                        <option  value='<?php echo $cat->IDcategoria;?>'><p><?php echo $cat->nombre;?></p></option>
                                            
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                               <label for="autor" class="text-dark">Autores:</label>           
                               <select name="autor" class="form-control" >
                                    <option value='0'>--Elegir Autor--</option>';
                                    <?php foreach($datos['autores'] as $autor):?>
                                        <option  value='<?php echo $autor->IDautor;?>'><p><?php echo $autor->apellido . ','. $autor->nombreAutor;?></p></option>
                                    
                                    <?php endforeach;?>
                                        
                                </select>
                            </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-4">
                        <label for="exampleFormControlFile1"class="text-dark">Imagen:</label>
                    </div>
                <div class="form-group col-sm-8">
                    <input type="file" class=" form-control-file text-dark" name="imagen" id="exampleFormControlFile1">
                </div>
                </div>
                <div class="col-sm-12">
                    <input type="submit" class="btn-guardar btn-lg btn-block text-white my-2" value="Guardar"></input>
                </div>
        </form>
        </div>
    </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>