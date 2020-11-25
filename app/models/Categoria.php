<?php
   class Categoria{
      public function __construct(){
	   $this->db = new Base;
      }
      public function create_categoria($datos){
         $this->db->query("INSERT INTO  novedad_categoria (nombre, color) VALUES ( :nombreCat, :colorCat)");
         $this->db->bind('nombreCat',$datos['nombreCat']);
         $this->db->bind('colorCat',$datos['colorCat']);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }
      public function read_categoria(){
         $this->db->query("SELECT * FROM novedad_categoria");
         $resultado = $this->db->registros();
         return $resultado;
      }
      public function contar_categoria(){
         $this->db->query("SELECT * FROM novedad_categoria");
         $resultado = $this->db->rowCount();
         return $resultado;
      }
      public function read_categoria_id($id){
         $this->db->query("SELECT * FROM novedad_categoria");
         $resultado = $this->db->registros();
         return $resultado;
      }
      public function read_color_categoria($colorNuevo){
         $this->db->query("SELECT color FROM novedad_categoria WHERE color=:color");
         $this->db->bind('color',$colorNuevo);
         $resultado = $this->db->registro();
         return $resultado;
      }		
      public function update_categoria($datos){
         $this->db->query("UPDATE novedad_categoria SET
                           IDcategoria = :id,
                           nombre = :nombre
                           WHERE IDcategoria = :id");
         $this->db->bind('id',$datos['id_cat']);
         $this->db->bind('nombre',$datos['nombreCat']);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }	
      public function delete_categoria($id){ 
         $this->db->query("DELETE  FROM novedad_categoria WHERE IDcategoria = :id");
         $this->db->bind('id',$id);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
         
      }
      				

   }
?>