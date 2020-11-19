<?php
   class Restaurante{
      public function __construct(){
	   $this->db = new Base;
      }

      public function guardar_resto($datos){

         
         
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

      public function buscar_resto($vigencia){
	      $this->db->query("SELECT * FROM restaurantes WHERE estaActivo=:vigente");
         $this->db->bind('vigente',$vigencia);
	      $resultado = $this->db->registros();
	      return $resultado;
      }	

   }
?>