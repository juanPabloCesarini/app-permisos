function confirmar(id,nombre,apellido) {
   if (confirm('ATENCION!!! Estas seguro de eliminar a '+ nombre + ' ' + apellido +'?')) {
      window.location.href = '<?php echo RUTA_URL;?>/FSF/eliminar_empleado/' + id;
   }
   console.log(id + '  ' + nombre + ' ' + apellido);
}