<?php
    class FSF extends Controller{
         
        public function __construct(){
            $this->empleadoModelo =$this->modelo('Empleado');
            $this->permisoModelo =$this->modelo('Permiso');
            $this->permiso_asignadoModelo = $this->modelo('Permiso_asignado');
            $this->restauranteModelo = $this->modelo('Restaurante');
        }

/************************************************ ACCESO **************************************/

        public function index(){
            
            $this->vista('pages/inicio');
        }

        public function home(){
            $empleados = $this->empleadoModelo->buscarEmpleados();
            $datos = [
                "empleados" => $empleados
            ];
            $this->vista('pages/acceso/home',$datos);
        }

        public function login(){
            $this->vista('pages/acceso/login');
        }

        public function permitir_entrar(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos = [
                    
                    'nick' => trim($_POST['nick']),
                    'pass' => trim($_POST['pass']),
                ];
                $consulta = $this->empleadoModelo->buscarEmpleadosNick($datos);
                $datosEnBase = [
                    'idEmpleado' => $consulta->IDempleado,
                    'usuario' => $consulta->usuario,
                    'pass' => $consulta->clave,
                    'rol'  => $consulta->rol,
                ];
            }
                if(!empty($consulta)){
                    if($datos['pass']==$datosEnBase['pass']){
                       // session_start();
                        $_SESSION['idEmpl']=$datosEnBase['idEmpleado'];
                        $_SESSION['nick']=$datosEnBase['usuario'];
                        $_SESSION['rol']=$datosEnBase['rol'];
                        $this->home();
                    }else{
                        $datos=["msj"=>'Usuario o clave incorrectos.',];
                        
                        $this->vista('pages/acceso/login',$datos);
                        
                        
                    }
                }else{
                    $this->vista('pages/acceso/login');
			        echo "<script type='text/javascript'> alert('Te olvidaste de registrate.'); </script>";
		        }
            } 
        

        public function modificar_clave(){
            $this->vista('pages/acceso/actualizar_clave');
        }

        //public function recuperar_clave(){
        //    if ($_SERVER['REQUEST_METHOD']=='POST'){
        //        if ( trim($_POST['pwd'])==trim($_POST['pwd2'])){
//
        //        }else{
        //            $err = [
        //                'msj' => "Las contraseñas no coinciden",
        //            ];
        //            $this->vista('pages/acceso/actualizar_clave',$err);
        //        }
        //        $datos = [
        //            
        //            'nick' => trim($_POST['nick']),
        //            'pass' => trim($_POST['pass']),
        //        ];
        //}
        public function pedir_clave_nueva(){
            $this->vista('pages/acceso/solicitud_clave');
        }

        public function logout(){
            session_unset();
            session_destroy();
            $this->vista('pages/inicio');
        }

/************************************************ EMPLEADO **************************************/

        public function edicion_datos(){
            $this->vista('pages/edicion_datos_empleados');
        }

        public function nuevo_empleado(){
            $listado_permisos = $this->permisoModelo->buscar_permisos();
            $datos = [
                'lst_permisos' => $listado_permisos,
            ];
            $this->vista('pages/empleados/alta_empleado',$datos);
        }

        public function guardar_empleado(){
            if ($_SESSION['rol']=="1"){
                $rol="2";
            }
            if ($_SERVER['REQUEST_METHOD']== 'POST'){
                                
                $datos = [
                    'rol' => $rol,
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'nick' => trim($_POST['nick']),
                    'pass' => trim($_POST['pass']),
                ];

                if ($this->empleadoModelo->agregarEmpleado($datos)){
                    $empleado =$this->empleadoModelo->uid();

                    foreach ($_POST['permisos'] as $p) {
                        
                        $datos = [
                        "id_Empleado" => $empleado->id,
                        "id_Permiso" => $p,

                    ];
                    $this->permiso_asignadoModelo->guardar_permisos($datos);
                        
                    }
                    
                    $this->home();
                }else{
                    die('Algo salió mal');
                }
            
            }else{
                $datos = [
                    'rol' =>'',
                    'nombre' => '',
                    'apellido' => '',
                    'usuario' => '',
                    'pass' => '',
                ];

                $this->vista('pages/empleados/alta_empleado', $datos);
            }
        }   
    
        public function eliminar_empleado($id){
            //if ($_SERVER['REQUEST_METHOD']== 'POST'){
                    $datos = [
                               'idUs' => $id
                             ];
                if ($this->empleadoModelo->borrarEmpleado($datos)){
                    $this->home();
                }else{
                    die('Algo salió mal');
                }
            //}
            
        }

        

/************************************************ PERMISO **************************************/  

        
        public function reasignar_permisos($id){
            $empleado=$this->empleadoModelo->buscarEmpleadoId($id);
            $permisos = $this->permisoModelo->buscar_permisos();
            $listado_permisos_asig = $this->permiso_asignadoModelo->buscar_permisosAsignados($id);
            $datos=[
                "id_Empleado"        => $empleado->IDempleado,
                "nombre_Empleado"    => $empleado->nombre,
                "apellido_Empleado"  => $empleado->apellido,
                "apodo_Empleado"     => $empleado->usuario,
                "permisos_Empleado"  => $permisos,
                "lst_permisos"       => $listado_permisos_asig,
            ];
            
            $this->vista('pages/permisos/reasignar_permisos',$datos);
            
        }

        

        public function listar_permisosAsignados(){
            $listado_permisosAsignados = $this->permiso_asignadoModelo->buscar_permisosAsignados();
           // var_dump($listado_permisosAsignados);
            $datos=[
                "permisos" => $listado_permisosAsignados,
                  
            ];
            //var_dump($datos);
            $this->vista('pages/permisos/listado_permisos',$datos);
        }

        public function eliminar_permisoAsignado($id){
                            
                if ($this->permiso_asignadoModelo->borrar_permisoAsignado($id)){
                    $this->home();
                }else{
                    die('Algo salió mal');
                }           
        }

        public function actualizar_permisos(){
            $listado_permisosAsignados = $this->permiso_asignadoModelo->buscar_permisosAsignados($_POST['idEmpl']);
            foreach ($listado_permisosAsignados as $pa) {
                if(in_array($pa->permisosID, $_POST['permisos'])){ 
                    die("<script type='text/javascript'> alert('No se puede duplicar el permiso.'); </script>");
                }else{
                    $datos = [
                        "id_Empleado"         => $_POST['idEmpl'],
                        "id_Permiso"          => $pa->permisosID,
                    ];
                    $this->permiso_asignadoModelo->guardar_permisos($datos);

                    
                }           
            }

            
            /*foreach ($_POST['permisos'] as $p) {
                        
               

                             
            }*/
            $this->home();
        }


/********************************************* RESTAURANTE **************************************/        
        public function alta_restaurante(){
            $this->vista('pages/restaurantes/nuevo_resto');
        }

        public function resto_a_base(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){

                $logoResto = $_FILES['img']['name'];
                $tipo_logoResto = $_FILES['img']['type'];
                $tam_logoResto = $_FILES['img']['size'];
                //$servidor=$_SERVER['DOCUMENT_ROOT'].$ubi;
                $ubi =RUTA_URL.'/public/img/';
                echo $ubi;
                if ($tam_logoResto <=1000000){
                    if ($tipo_logoResto == 'image/jpg' || $tipo_logoResto == 'image/jpeg' || $tipo_logoResto == 'image/png'){
                        $logoOK =$logoResto;        
                    }
                }
                $datos =[
                            "nombre"      => $_POST['nombre'],
                            "descripcion" => $_POST['descripcion'],
                            "direccion"   => $_POST['dire'],
                            "telefono"    => $_POST['tel'],
                            "web"         => $_POST['web'],
                            "logo_name"   => $logoOK,
                            "vigente"     => $_POST['vigencia'],
                            "radio"       => $_POST['radio'],
                        ];
            }           
            if ($this->restauranteModelo->guardar_resto($datos)){
                move_uploaded_file($_FILES['img']['tmp_name'],$ubi.$logoResto);
                //move_uploaded_file($_FILES['img']['tmp_name'],RUTA_URL."/public/img/logoResto/");
                if ($_POST['boton']=="Guardar y Salir"){
                    $this->home();
                }else{
                    $this->vista('pages/restaurantes/nuevo_resto');
                }
            }else{
                die('Algo salió mal');
            }
        }

         public function buscarRestaurantes($vigencia){
            $restaurantes=$this->restauranteModelo->buscar_resto($vigencia);
            $datos = [
                "lst_resto" => $restaurantes,
            ];
            $this->vista('pages/restaurantes/lista_resto',$datos);
        }

        public function editar_noticias(){
            $this->vista('pages/editar_news');
        }
        public function editar_restaurantes(){
            $this->vista('pages/editar_resto');
        }
       
        public function listado_restaurantes_inactivos(){
            $this->vista('pages/listar_resto');
        }
        public function obtener_lista_new(){
            $this->vista('pages/listar_news');
        }
        public function obtener_lista_resto(){
            $this->vista('pages/listar_resto');
        }
   }
   
?>
