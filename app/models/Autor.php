<?php
   class Autor{
      public function __construct(){
	   $this->db = new Base;
      }
      public function create_autor($datos){
         $this->db->query("INSERT INTO  novedad_autor (nombreAutor, apellido, foto) VALUES (:nombre,:apellido,:foto)");
         $this->db->bind('nombre',$datos['nombreAutor']);
         $this->db->bind('apellido',$datos['apellidoAutor']);
         $this->db->bind('foto',$datos['fotoAutor']);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }
      public function read_autor(){
         $this->db->query("SELECT * FROM novedad_autor");
         $resultado = $this->db->registros();
         return $resultado;
      }
      public function update_autor($datos){
         $this->db->query("UPDATE novedad_autor SET
                           IDautor =:id,
                           nombreAutor =:nombreAutor,
                           apellido=:apeAutor,
                           foto=:foto
                           WHERE IDautor =:id");
         $this->db->bind('id',$datos['id_autor']);
         $this->db->bind('nombreAutor',$datos['nombreAutor']);
         $this->db->bind('apeAutor',$datos['apeAutor']);
         $this->db->bind('foto',$datos['foto']);

          if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }		
      public function delete_autor($id){
         $this->db->query("DELETE  FROM novedad_autor WHERE IDautor = :id");
         $this->db->bind('id',$id);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      
      }				

   }
?>