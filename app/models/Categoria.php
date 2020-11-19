<?php
   class Categoria{
      public function __construct(){
	   $this->db = new Base;
      }
      public function buscarCategoria(){
	      $this->db->query("SELECT * FROM novedad_categoria");
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

   }
?>