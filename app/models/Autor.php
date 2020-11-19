<?php
   class Autor{
      public function __construct(){
	   $this->db = new Base;
      }
      public function buscarAutor(){
	      $this->db->query("SELECT * FROM novedad_autor");
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

   }
?>