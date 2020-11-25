<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
    <div class=" my-1 text-center">
        <h2 class="subtitulo text-white">Panel edición de noticias</h2>
    </div>
    <?php foreach ($datos['blogs'] as $b):?>
    <div class="row form-altablog">
        <div class="col-sm-12 col-md-6">
            <h4 class="parrafo text-center"> Paso 1: Editar Categoria</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/edit_categ/" method="post">
            <div class="form-row my-2">
                <div class="form-group col-sm-6">
                    <label for="nombre" class="text-dark">Nombre de la categoría:</label>
                </div>
            <div class="form-group col-sm-6">
                <input type="hidden" name = "id_cat" value="<?php echo $b->categoriaID;?>"></input>
                <input class="form-control" type="text" name="nombreCateg" value="<?php echo $b->nombre;?>">
            </div>
            </div>
            <div class="col-sm-12">
                <input type="submit" class="btn-guardar btn-lg btn-block text-white my-2" value="Guardar"></input>
        
                
            </div>
                <?php if (!empty($datos['errorCat'])):?>
                    <p class="parrafo text-center text-danger"><?php echo $datos['errorCat']; ?></p>
                <?php endif;?>
        </form>
            <h4 class="parrafo text-center"> Paso 2: Editar Autor</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/edit_autor/" method="post" enctype="multipart/form-data" >
        <img class="img_logo" src="<?php echo RUTA_URL?>/img/fotoAutor/<?php echo $b->foto;?>">
            <div class="form-row my-2">
            <input type="hidden" name = "id_autor" value="<?php echo $b->IDautor;?>"></input>
                <div class="form-group col-sm-3">
                    <label for="nombre" class="text-dark">Nombre:</label>
                </div>
                <div class="form-group col-sm-9">
                    <input class="form-control" type="text" name="nombreAutor" value="<?php echo $b->nombreAutor;?>">
                </div>
            </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="dir" class="text-dark">Apellido:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <input class="form-control" type="text" name="apeAutor" value="<?php echo $b->apellido;?>">
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
                        <input type="submit" class="btn-guardar btn-lg btn-block text-white  my-2" value="Guardar" ></input>
                        
                    </div>
        </form>
        </div>

        <div class="col-sm-12 col-md-6">
            <h4 class="parrafo text-center"> Paso 3: Editar Post</h4>
        <form action="<?php echo RUTA_URL;?>/FSF/cambio_post_base/" method="post"enctype="multipart/form-data" >
        <img class="img_logo" src="<?php echo RUTA_URL?>/img/fotoPost/<?php echo $b->imagen;?>">
            <input type="hidden" name="id_post" value="<?php echo $b->IDnovedad;?>">
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="titulo" class="text-dark">Título:</label>
                    </div>
                    <div class="form-group col-sm-9">
                        <input class="form-control" type="text" name="titulo" value="<?php echo $b->titulo;?>">
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="primerParrafo" class="text-dark">Primer Párrafo:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="primerParrafo" class="form-control" id="" cols="30" rows="3"><?php echo $b->primerParrafo;?></textarea>
                </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="contenido" class="text-dark">Contenido:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="contenido" class="form-control" id="" cols="30" rows="5"><?php echo $b->contenido;?></textarea>
                </div>
                </div>
                <div class="form-row my-2">
                    <div class="form-group col-sm-3">
                        <label for="correccion" class="text-dark">Fe de erratas:</label>
                    </div>
                <div class="form-group col-sm-9">
                    <textarea name="correccion" class="form-control" id="" cols="30" rows="2"><?php echo $b->correccion;?></textarea>
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
                            <?php if (!empty($datos['error'])):?>
                                <p class="parrafo text-danger text-center"><?php echo $datos['error'] ?></p>
                            <?php endif;?>
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
    <?php endforeach;?>
    </div>
<?php require RUTA_APP .'/views/inc/footer.php';?>