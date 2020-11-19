<?php
	class Permiso_asignado{
		private $db;
		
		public function __construct(){
			$this->db = new Base;
		}	
		
		public function guardar_permisos($datos){
			
			$this->db->query("INSERT INTO permisos_asignados (empleadosID, permisosID) 
				              VALUES (:idE, :idP)");
			$this->db->bind('idE',$datos['id_Empleado']);
			$this->db->bind('idP',(int)$datos['id_Permiso']);
			
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}
				
         
		

		public function buscar_permisosAsignados($id){
			$this->db->query("SELECT IDpermisosAsignados, 
									 empleados.IDempleado,
									 empleados.nombre,
									 empleados.apellido,
									 permisosID,
									 permisos.descripcionPermiso
								FROM permisos_asignados 
								INNER JOIN empleados on permisos_asignados.empleadosID = empleados.IDempleado
								INNER JOIN 	permisos on permisos_asignados.permisosID = permisos.IDpermisos
								WHERE permisos_asignados.empleadosID = :id
								ORDER BY permisos.IDpermisos");
			$this->db->bind('id',$id);
			$resultado = $this->db->registros();
			return $resultado;

		}

		public function borrar_permisoAsignado($id){
			$this->db->query("DELETE FROM permisos_asignados WHERE IDpermisosAsignados =:id");
			$this->db->bind('id',$id);
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}	
		
	}
?>	