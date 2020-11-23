function confirmar (id,nombre,apellido) {
   if (apellido==null){
      if (confirm('ATENCION!! Estas seguro de eliminar a: ' + nombre)){
         window.location.href = '../eliminar_resto/' + id;
      }
   }else{
      if (confirm('ATENCION!! Estás seguro de eliminar a: ' + nombre + ' ' + apellido)) {
         window.location.href = '../eliminar_empleado/' + id;
      }
   }
}
  /*  if (confirm('ATENCION!! Estás seguro de eliminar a: ' + nombre + ' ' + apellido)) {
      window.location.href = '../eliminar_empleado/' + id;
   } */


/*  function confirmar2(idR,nombreR){
   if (confirm('ATENCION!! Estas seguro de eliminar a: ' + nombreR)){
      window.location.href = '../eliminar_resto/' + idR;
   }
}  */