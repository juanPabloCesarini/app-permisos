<?php
   class Noticia{
      public function __construct(){
	   $this->db = new Base;
      }
      public function buscarNoticias(){
	      $this->db->query("SELECT * FROM novedad");
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

   }
?>