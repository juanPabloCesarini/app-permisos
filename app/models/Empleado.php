<?php
	/**
	 * 
	 */
	class Empleado{
		private $db;
		
		public function __construct(){
			$this->db = new Base;
		}

		public function agregarEmpleado($datos){
			$keyw ="keyword";
			$this->db->query("INSERT INTO empleados (rol, nombre, apellido, usuario,pass) VALUES (:rol, :nombre, :apellido, :usuario, aes_encrypt(:pass,:keyword))");
			$this->db->bind('rol',$datos['rol']);
			$this->db->bind('nombre',$datos['nombre']);
			$this->db->bind('apellido',$datos['apellido']);
			$this->db->bind('usuario',$datos['nick']);
			$this->db->bind('pass',$datos['pass']);
			$this->db->bind('keyword',$keyw);
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}

		public function buscarEmpleados(){
			$this->db->query("SELECT IDempleado, rol, nombre, apellido, usuario, aes_decrypt(pass,'keyword') as clave,permisos FROM empleados");
			$resultado = $this->db->registros();
			return $resultado;
		}

		public function buscarEmpleadosNick($datos){
			$this->db->query("SELECT IDempleado, rol, nombre, apellido, usuario,aes_decrypt(pass,'keyword') as clave,permisos FROM empleados WHERE usuario = :nick");
			$this->db->bind('nick',$datos['nick']);
			$fila = $this->db->registro();
			return $fila;
		}

		public function buscarEmpleadoId($id){
			$this->db->query("SELECT IDempleado, nombre, apellido, usuario,permisos FROM empleados WHERE IDempleado = :id");
			$this->db->bind('id',$id);
			$fila = $this->db->registro();
			return $fila;
		}
		
		public function editEmpleado($datos){
			$this->db->query("UPDATE empleados			
							  SET nombre = :nombre,
							  	  apellido = :apellido,
							      usuario = :nick
							  WHERE IDempleado = :id");
			$this->db->bind('nombre',$datos['nombre_empleado']);
			$this->db->bind('apellido',$datos['apellido_empleado']);
			$this->db->bind('nick',$datos['nick_empleado']);
			$this->db->bind('id',$datos['id_empleado']);
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}
		
		public function editClave($datosUsuario){
			$keyw ="keyword";
			$this->db->query("UPDATE empleados 
							  SET usuario = :nick,
								  pass = aes_encrypt(:pass,:keyword)
							  WHERE usuario =:nick");
			
			$this->db->bind('nick',$datosUsuario['nick']);
			$this->db->bind('pass',$datosUsuario['pass']);
			$this->db->bind('keyword',$keyw);
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}
		public function borrarEmpleado($datos){
			$this->db->query("DELETE FROM empleados WHERE IDempleado =:id");
			$this->db->bind('id',$datos['idUs']);
			if($this->db->execute()){
            	return true;
         	}else{
            	return false;
         	}
		}

		public function uid(){
			$this->db->query("SELECT MAX(IDempleado) AS id FROM empleados");
			$fila = $this->db->registro();
			return $fila;
		}

	}
?>