function confirmar (id,nombre,apellido,tabla) {
   switch (tabla){
      case 'post':
         if (confirm('ATENCION!! Estas seguro de eliminar el post con título: ' + nombre)){
            window.location.href = '../eliminar_post/' + id;
         }
         break;
      case 'resto':
         if (confirm('ATENCION!! Estas seguro de eliminar a: ' + nombre)){
            window.location.href = '../eliminar_resto/' + id;
         }
         break;
      case 'empleado':
         if (confirm('ATENCION!! Estás seguro de eliminar a: ' + nombre + ' ' + apellido)){
            window.location.href = '../eliminar_empleado/' + id;
         }
         break;
   
   }
}
