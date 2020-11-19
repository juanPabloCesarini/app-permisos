<?php 
// para redireccionar la páagina

function redireccionar($pagina){
   header('location: '.RUTA_URL.$pagina );
}

?>