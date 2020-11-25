<?php
   class Post{
      public function __construct(){
	   $this->db = new Base;
      }
      public function create_post($datos){
	      $this->db->query("INSERT INTO novedad (titulo,primerParrafo,contenido,correccion,imagen,fechaPublicacion,AutorID,categoriaID)
                           VALUES (:titulo,:primerParrafo,:contenido,:correccion,:imagen, CURRENT_TIMESTAMP,:autorID,:categoriaID)");
         $this->db->bind('titulo',$datos['titulo']);
         $this->db->bind('primerParrafo',$datos['primer_parrafo']);
         $this->db->bind('contenido',$datos['contenido']);
         $this->db->bind('correccion',$datos['fe']);
         $this->db->bind('imagen',$datos['foto']);
         $this->db->bind('autorID',$datos['aut']);
         $this->db->bind('categoriaID',$datos['cat']);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }

      public function read_post(){
         $this->db->query("SELECT * FROM novedad 
                           INNER JOIN novedad_autor
                           ON novedad.autorID = novedad_autor.IDautor
                           INNER JOIN novedad_categoria
                           ON novedad.categoriaID = novedad_categoria.IDcategoria
                           ORDER BY novedad_categoria.nombre,
                           novedad.fechaPublicacion DESC");
         $resultado = $this->db->registros();
         return $resultado;
      }		

      public function read_post_id($id){
         $this->db->query("SELECT * FROM novedad 
                           INNER JOIN novedad_autor
                           ON novedad.autorID = novedad_autor.IDautor
                           INNER JOIN novedad_categoria
                           ON novedad.categoriaID = novedad_categoria.IDcategoria
                           WHERE novedad.IDnovedad = :id");
         $this->db->bind('id',$id);
         $resultado = $this->db->registros();
         return $resultado;
      }		
      public function update_post($datos){
         $this->db->query("UPDATE novedad SET
                           IDnovedad =:id,
                           titulo=:titulo,
                           primerParrafo =:pp,
                           contenido=:contenido,
                           correccion=:fe,
                           imagen=:imagen,
                           autorID=:idA,
                           categoriaID=:idC
                           WHERE IDnovedad =:id");
         $this->db->bind('id',$datos['id']);
         $this->db->bind('titulo',$datos['titulo']);
         $this->db->bind('pp',$datos['primer_parrafo']);
         $this->db->bind('contenido',$datos['contenido']);
         $this->db->bind('fe',$datos['fe']);
         $this->db->bind('idA',$datos['aut']);
         $this->db->bind('idC',$datos['cat']);
         $this->db->bind('imagen',$datos['foto']);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }	
      public function delete_post($id){
         $this->db->query("DELETE FROM novedad WHERE IDnovedad =:id");
         $this->db->bind('id',$id);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }		

   }
?>