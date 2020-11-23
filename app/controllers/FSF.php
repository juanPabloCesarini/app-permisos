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
            $this->vista('pages/acceso/homeView',$datos);
        }

        public function login(){
            $this->vista('pages/acceso/loginView');
        }

        public function permitir_entrar(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos = [
                    
                    'nick' => trim($_POST['nick']),
                    'pass' => trim($_POST['pass']),
                ];
                $consulta = $this->empleadoModelo->buscarEmpleadosNick($datos);
                
            }
            if(!empty($consulta)){
                    $datosEnBase = [
                        'idEmpleado' => $consulta->IDempleado,
                        'usuario' => $consulta->usuario,
                        'pass' => $consulta->clave,
                        'rol'  => $consulta->rol,
                    ];
                    if($datos['pass']==$datosEnBase['pass']){
                        $_SESSION['idEmpl']=$datosEnBase['idEmpleado'];
                        $_SESSION['nick']=$datosEnBase['usuario'];
                        $_SESSION['rol']=$datosEnBase['rol'];
                        $this->home();
                    }else{
                        $datos=["msj"=>'Usuario o clave incorrectos.',];
                        $this->vista('pages/acceso/loginView',$datos);         
                    }
            }else{
                    $datos=["msj"=>'Te olvidaste de registrate.',];
                    $this->vista('pages/acceso/loginView',$datos);
		    }
        } 
        

        public function modificar_clave(){
            
            $this->vista('pages/acceso/actualizar_claveView');
        }

        public function setear_clave_nueva(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos = [
                    'nick' => trim($_POST['nick']),
                ];
                $consulta_usuario = $this->empleadoModelo->buscarEmpleadosNick($datos);
                if ($consulta_usuario==true){
                    if ( trim($_POST['pwd1'])==trim($_POST['pwd2'])){
                        $datosUsuario = [
                            'nick' => trim($_POST['nick']),
                            'pass' => trim($_POST['pwd1']),
                        ];
                        $this->empleadoModelo->editClave($datosUsuario);
                        $this->vista('pages/acceso/loginView');
                    }else{
                            $datos = [
                                'msj' => "Las contraseñas no coinciden",
                            ];
                            $this->vista('pages/acceso/actualizar_claveView',$datos);
                    }
                    
                }else{
                    
                    $datos = [
                        'msj' => "Usuario inexistente",
                    ];
                    $this->vista('pages/acceso/actualizar_claveView',$datos);
                }
            }
        }

        public function pedir_clave_nueva(){
            $mail = new phpmailer();
            $this->vista('pages/acceso/solicitud_claveView');
        }

        public function logout(){
            session_unset();
            session_destroy();
            $this->vista('pages/inicio');
        }

/************************************************ EMPLEADO **************************************/

        public function editar_empleado($id){
            $empleado = $this->empleadoModelo->buscarEmpleadoId($id);
            $datos = [
                'id_empleado' => $empleado->IDempleado,
                'nombre_empleado' => $empleado->nombre,
                'apellido_empleado' => $empleado->apellido,
                'nick_empleado' => $empleado->usuario,
            ];
            $this->vista('pages/empleados/edit_empleadoView',$datos);
        }

        public function actualizar_empleado(){
            if ($_SERVER['REQUEST_METHOD']== 'POST'){
                $datos = [
                    'id_empleado' => trim($_POST['idEmpl']),
                    'nombre_empleado' => trim($_POST['nombre']),
                    'apellido_empleado' => trim($_POST['apellido']),
                    'nick_empleado' => trim($_POST['nick']),
                ];
                if ($this->empleadoModelo->editEmpleado($datos)){
                    $_SESSION['nick']=trim($_POST['nick']);
                    if ($_SESSION['rol']=="1"){
                        $this->home();
                    }else{
                        $this->editar_empleado($_POST['idEmpl']);
                    }
                }
            }
        }

        public function nuevo_empleado(){
            $listado_permisos = $this->permisoModelo->buscar_permisos();
            $datos = [
                'lst_permisos' => $listado_permisos,
            ];
            $this->vista('pages/empleados/alta_empleadoView',$datos);
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
            $listado_permisos_asig = $this->permiso_asignadoModelo->buscar_permisosAsignados_idEmpl($id);
            $datos=[
                "id_Empleado"        => $empleado->IDempleado,
                "nombre_Empleado"    => $empleado->nombre,
                "apellido_Empleado"  => $empleado->apellido,
                "apodo_Empleado"     => $empleado->usuario,
                "permisos_Empleado"  => $permisos,
                "lst_permisos"       => $listado_permisos_asig,
            ];
            
            $this->vista('pages/permisos/reasignar_permisosView',$datos);
            
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
            
            foreach ($_POST['permisos'] as $p) {
                $permiso_guardado = $this->permiso_asignadoModelo->buscar_permisosAsignados_idPerm($_POST['idEmpl'],$p);
                if (empty($permiso_guardado)){
                    $datos = [
                        "id_Empleado"         => $_POST['idEmpl'],
                        "id_Permiso"          => $p,
                    ]; 
                    $this->permiso_asignadoModelo->guardar_permisos($datos);

                }

                if (!empty($permiso_guardado)){
                    $empleado=$this->empleadoModelo->buscarEmpleadoId($_POST['idEmpl']);
                    $listado_permisos_asig = $this->permiso_asignadoModelo->buscar_permisosAsignados_idEmpl($_POST['idEmpl']);
                    $permisos = $this->permisoModelo->buscar_permisos();
                    $datos=[
                        "id_Empleado"        => $empleado->IDempleado,
                        "nombre_Empleado"    => $empleado->nombre,
                        "apellido_Empleado"  => $empleado->apellido,
                        "apodo_Empleado"     => $empleado->usuario,
                        "permisos_Empleado"  => $permisos,
                        "lst_permisos"       => $listado_permisos_asig,
                        "msj"                => 'No se pueden duplicar los permisos',
                    ];
                    $this->vista('pages/permisos/reasignar_permisosView',$datos);
                    
                }
            }

            $this->reasignar_permisos($_POST['idEmpl']);
        }


/********************************************* RESTAURANTE **************************************/        
        public function alta_resto(){
            $this->vista('pages/restaurantes/alta_restoView');
        }

        public function resto_a_base(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){

                $logoResto = $_FILES['img']['name'];
                $tipo_logoResto = $_FILES['img']['type'];
                $tam_logoResto = $_FILES['img']['size'];
                $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/logoResto/';
               
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
            if ($this->restauranteModelo->create_resto($datos)){
                move_uploaded_file($_FILES['img']['tmp_name'],$ubi.$logoResto);
                if ($_POST['boton']=="Guardar y Salir"){
                    $this->home();
                }else{
                    $this->vista('pages/restaurantes/nuevo_resto');
                }
            }else{
                die('Algo salió mal');
            }
        }

        public function lista_restaurantes(){
            $restaurantes=$this->restauranteModelo->read_resto();
            //$restaurantes=$this->restauranteModelo->read_resto_vigencia($vigencia);
            $datos = [
                "resto" => $restaurantes,
            ];
            $this->vista('pages/restaurantes/list_restoView',$datos);
        }

      
        public function edit_resto($id){
            $restaurantes = $this->restauranteModelo->read_resto_id($id);
            $datos = [
                'resto' => $restaurantes,
            ];
            $this->vista('pages/restaurantes/edit_restoView',$datos);
        }

        public function modi_resto(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){

                $logoResto = $_FILES['img']['name'];
                $tipo_logoResto = $_FILES['img']['type'];
                $tam_logoResto = $_FILES['img']['size'];
                $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/logoResto/';
               
                if ($tam_logoResto <=1000000){
                    if ($tipo_logoResto == 'image/jpg' || $tipo_logoResto == 'image/jpeg' || $tipo_logoResto == 'image/png'){
                        $logoOK =$logoResto;        
                    }
                }
                $datos =[
                            "id"          => $_POST['id'],
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
            if ($this->restauranteModelo->update_resto($datos)){
                move_uploaded_file($_FILES['img']['tmp_name'],$ubi.$logoResto);
                $this->lista_restaurantes();
            }
        }

        public function eliminar_resto($id){
            if ($this->restauranteModelo->delete_resto($id)){
                /* $vigencia=$this->restauranteModelo->read_resto_id_vig($id);
                var_dump($vigencia);
                $restaurantes=$this->restauranteModelo->read_resto_vigencia($vigencia); */
               /*  $datos = [
                    "resto" => $restaurantes,
                ]; */
               // var_dump($datos);
               $this->lista_restaurantes();
               //$this->vista('pages/restaurantes/list_restoView',$datos); 
            }else{
                die('Algo salió mal');
            }
        }
       
        ///////////////////////// BLOG ////////////////
        public function alta_blog(){
            $this->vista('pages/blog/alta_blogView');
        }
        public function edit_blog(){
            $this->vista('pages/blog/edit_blogView');
        }

        public function listar_blog(){
            $this->vista('pages/blog/list_blogView');
        }

   }
   
?>
