<?php
   class Restaurante{
      public function __construct(){
	   $this->db = new Base;
      }

      public function create_resto($datos){
    
         $this->db->query("INSERT INTO restaurantes (nombre,descripcion,direccion,telefono,web,logo,estaActivo,radioDelivery)
                           VALUES (:nombre,:descripcion,:direccion,:telefono,:web,:logo,:vigente,:radio)");
         $this->db->bind('nombre',$datos['nombre']);
         $this->db->bind('descripcion',$datos['descripcion']);
         $this->db->bind('direccion',$datos['direccion']);
         $this->db->bind('telefono',$datos['telefono']);
         $this->db->bind('web',$datos['web']);
         $this->db->bind('logo',$datos['logo_name']);
         $this->db->bind('vigente',$datos['vigente']);
         $this->db->bind('radio',$datos['radio']);

         if($this->db->execute()){
               return true;
            }else{
               return false;
            }
      }

      public function read_resto(){
	      $this->db->query("SELECT * FROM restaurantes ORDER BY estaActivo");
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

      public function read_resto_vigencia($vigencia){
	      $this->db->query("SELECT * FROM restaurantes WHERE estaActivo =:vigente");
         $this->db->bind('vigente',$vigencia);
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

      public function read_resto_id($id){
	      $this->db->query("SELECT * FROM restaurantes WHERE IDrestaurantes=:id");
         $this->db->bind('id',$id);
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

        public function read_resto_id_vig($id){
         $this->db->query("SELECT * FROM restaurantes WHERE IDrestaurantes=:id");
         $this->db->bind('id',$id);
         $resultado = $this->db->registros();
         return $resultado;
      }  

      public function update_resto($datos){
         $this->db->query("UPDATE restaurantes SET
                           IDrestaurantes = :id,
                           nombre =:nombre,
                           descripcion =:descripcion,
                           direccion =:direccion,
                           telefono =:telefono,
                           web =:web,
                           logo =:logo,
                           estaActivo =:estaActivo,
                           radioDelivery =:radioDelivery
                           WHERE IDrestaurantes = :id");
         $this->db->bind('id',$datos['id']);
         $this->db->bind('nombre',$datos['nombre']);
         $this->db->bind('descripcion',$datos['descripcion']);
         $this->db->bind('direccion',$datos['direccion']);
         $this->db->bind('telefono',$datos['telefono']);
         $this->db->bind('web',$datos['web']);
         $this->db->bind('logo',$datos['logo_name']);
         $this->db->bind('estaActivo',$datos['vigente']);
         $this->db->bind('radioDelivery',$datos['radio']);

         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }
      public function delete_resto($id){
         $this->db->query("DELETE FROM restaurantes WHERE IDrestaurantes=:id");
         $this->db->bind('id',$id);
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }

   }
?>