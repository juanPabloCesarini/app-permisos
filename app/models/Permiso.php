<?php
	class Permiso{
		private $db;
		
		public function __construct(){
			$this->db = new Base;
        }	

        public function buscar_permisos(){
            $this->db->query("SELECT * FROM permisos " ) ;	
            $resultado = $this->db->registros();
            return $resultado;  
        }

        public function buscar_permisosID($id){
            $this->db->query("SELECT * FROM permisos WHERE  IDpermisos=:id" ) ;  
            $this->db->bind('id',$id);
            $fila = $this->db->registro();
            return $fila;  
        }
    }
?>