<?php require RUTA_APP .'/views/inc/header_inside.php';?>
<div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="lila p-3 my-1 jumbotron">
          <h3 class="p-3">Listado de Noticias</h3>
        </div>
        <div class="col-sm-12 formulario">
          <table class="table table-transparent text-white">
            <thead>
                <tr class="text-center">
                    <th scope="col">Categoría</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha de Publicación</th>
                    <th scope="col">Título</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  require_once('../../newsMOD/modelos/news_CRUD.php');
                  require_once('../../lib/formateador_fecha.php');
                  $crud = new CrudNews();
                  $noticias = $crud->buscar_news();
                    if ($noticias == NULL){
                        echo "<div class='text-center text-white'>NO HAY DATOS!!</div>";
                    }else{
                    foreach ($noticias as $news){
                        echo "<tr class='text-center' style='background:{$news->getCategoria_color()};color:black'>
                                <th scope='row' class='align-middle'>{$news->getCategoria_nombre()}</th>
                                <td class='align-middle'>{$news->getAutor_apellido()}, {$news->getAutor_nombre()}</td>
                                <td class='align-middle'>"; echo date('d/m/Y', strtotime($news->getFechaPublicacion())); echo "</td>
                                <td class='align-middle'>{$news->getTitulo()}</td>
                                <td><a href='../vistas/form-news-edit.php?id={$news->getIDnovedad()}' class='btn verde text-dark'>Editar</a></td>
                                <td><a href='../controladores/eliminar-news.php?id={$news->getIDnovedad()}' class='btn amarillo text-dark'>Eliminar</a></td>
                               </tr>";
                    }
                }
                ?>
            </tbody>
          </table>
        </div>
        <a href="sugar-admin.php" class="btn btn-lg btn-block lila text-white text-uppercase font-weight-bold my-2">Home</a>
      </div>
    </div>

<?php require RUTA_APP .'/views/inc/footer.php';?>