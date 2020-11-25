<?php
    class FSF extends Controller{
         
        public function __construct(){
            $this->empleadoModelo =$this->modelo('Empleado');
            $this->permisoModelo =$this->modelo('Permiso');
            $this->permiso_asignadoModelo = $this->modelo('Permiso_asignado');
            $this->restauranteModelo = $this->modelo('Restaurante');
            $this->autorModelo = $this->modelo('Autor');
            $this->postModelo = $this->modelo('Post');
            $this->categoriaModelo = $this->modelo('Categoria');
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
                        $permisos = $this->permiso_asignadoModelo->buscar_permisosAsignados_idEmpl($consulta->IDempleado);
                        
                        $_SESSION['idEmpl']=$datosEnBase['idEmpleado'];
                        $_SESSION['nick']=$datosEnBase['usuario'];
                        $_SESSION['rol']=$datosEnBase['rol'];
                        $_SESSION['permisos']=$permisos;
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
            
            $this->vista('pages/acceso/solicitud_claveView');
        }
        public function solicitar_clave(){

            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos = [
                    'nick' => trim($_POST['nick']),
    
                ];
            }
            
            $empleado = $this->empleadoModelo->buscarEmpleadosNick($datos);

            if($empleado==false){
                
                $datos = [ 'msj'=>"Usuario no existe"];
                $this->vista('pages/acceso/solicitud_claveView',$datos);
            }else{
                $mail = new phpmailer();
                $nueva_pass = claveAleatoria(8);
                $datos = [
                    'nick' => trim($_POST['nick']),
                    'pass' => $nueva_pass,
                ];
                if($this->empleadoModelo->editClave($datos)){
                    $mail->PluginDir = RUTA_APP."/includesMails/";
                    $mail->isSMTP();     
                    $mail->SMTPAuth   = true;                          // Enable SMTP authentication
                    $mail->Host       = 'mail.p4000324.ferozo.com';    // Set the SMTP server to send through
                    $mail->Username   = 'info@artigaspublicidad.com.ar'; // SMTP username
                    $mail->Password   = 'esPanTa58paJaros';              // SMTP password
                    $mail->Port       = 587;
                    $mail->SetFrom('info@artigaspublicidad.com.ar','FSF');
                    $mail->AddAddress(trim($_POST['mail'])); 
        // Content
                    $mail->IsHTML(true);                                  // Set email format to HTML
                    $mail->Subject     = "Info importante de FSF";
                    $mail->Body        =  "Tu nueva clave para operar con FSF es: " . $nueva_pass;
                    $mail->send();
                    $datosMens= [ 'msj'=>"Tu solicitud ha sido enviada con éxito, te llegará un mail con tu nueva contraseña"];
                    $this->vista('pages/acceso/solicitud_claveView',$datosMens);
                }else{
                    $datos = [ 'msj'=>"Ocurrió un error!! Intentalo más tarde.",];
                    $this->vista('pages/acceso/solicitud_claveView',$datos);

                }
            }

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
                if ($logoResto == NULL){
                    $logoOK="default.png";
                }
                if ($tam_logoResto <=1000000){
                    if ($tipo_logoResto == 'image/jpg' || $tipo_logoResto == 'image/jpeg' || $tipo_logoResto == 'image/png'){
                        $logoOK =$logoResto;        
                    }else{
                        $logoOK="default.png";
                    }
                }else{
                    $logoOK="default.png";
                }
                if ($_POST['radio']==""){
                    $error ="Se debe elegir un radio de delivery";
                }else{
                    $error="";
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
                            "msj"         => $error,
                        ];
            } 
            if ($datos['msj']==""){          
                if ($this->restauranteModelo->create_resto($datos)){
                    move_uploaded_file($_FILES['img']['tmp_name'],$ubi.$logoResto);
                    if ($_POST['boton']=="Guardar y Salir"){
                        $this->home();
                    }else{
                        $this->vista('pages/restaurantes/alta_restoView');
                    }
                }else{
                    die('Algo salió mal');
                }
            }else{
                $this->vista('pages/restaurantes/alta_restoView',$datos);
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
                if ($logoResto == NULL){
                    $logoOK="default.png";
                }
                if ($tam_logoResto <=1000000){
                    if ($tipo_logoResto == 'image/jpg' || $tipo_logoResto == 'image/jpeg' || $tipo_logoResto == 'image/png'){
                        $logoOK =$logoResto;        
                    }else{
                        $logoOK="default.png";
                    }
                }else{
                    $logoOK="default.png";
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
              
               $this->lista_restaurantes();

            }else{
                die('Algo salió mal');
            }
        }
       
        /*********************************** BLOG *********************************************/
        public function alta_blog(){
            $categorias = $this->categoriaModelo->read_categoria();
            $autores = $this->autorModelo->read_autor();
            $datos = [
                'categorias' => $categorias,
                'autores'    => $autores,
            ];
            $this->vista('pages/blog/alta_blogView',$datos);
        }

        public function alta_categ(){
            $colorNuevo=buscarColor();
            $colorExistente=$this->categoriaModelo->read_color_categoria($colorNuevo);
            $cantColores = $this->categoriaModelo->contar_categoria();
            while (($colorExistente == TRUE) && ($cantColores <=10)) {
                $colorNuevo = buscarColor();
                $colorExistente = $this->categoriaModelo->read_color_categoria($colorNuevo);
                $cantColores=$cantColores+1;
            }
            if ($cantColores <11){
                $mje ="";
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    $categorias = $this->categoriaModelo->read_categoria();
                    $autores = $this->autorModelo->read_autor();
                    $datos=[
                       'categorias' => $categorias,
                       'autores'    => $autores,
                       'nombreCat' => trim($_POST['nombreCateg']),
                       'colorCat'  => $colorNuevo,
                       'errorCat'  => $mje,
                    ];
                    $this->categoriaModelo->create_categoria($datos);
                    $datos = [
                        'categorias' => $categorias,
                        'autores'    => $autores,
                    ];
                    $this->vista('pages/blog/alta_blogView',$datos);
                }else{
                    die('Algo salió mal');
                }
                
                
            }else{
                $mje ="No se puede ingresar otra categoría";
                $categorias = $this->categoriaModelo->read_categoria();
                $autores = $this->autorModelo->read_autor();
                $datos =[
                    'errorCat' => $mje,
                    'categorias' => $categorias,
                    'autores'    => $autores,
                ];
                $this->vista('pages/blog/alta_blogView',$datos);
            }  
        }
        public function edit_categ(){
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos =[
                    'id_cat' => trim($_POST['id_cat']),
                    'nombreCat' => trim($_POST['nombreCateg']),
                ];
                $this->categoriaModelo->update_categoria($datos);
                $this->listar_blog();
            }
        }
        public function alta_autor(){
                $fotoAutor = $_FILES['foto']['name'];
                $tipo_fotoAutor = $_FILES['foto']['type'];
                $tam_fotoAutor = $_FILES['foto']['size'];
                $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/fotoAutor/';
                if ($fotoAutor == NULL){
                    $fotoOK="avatar.png";
                }
                if ($tam_fotoAutor <=1000000){
                    if ($tipo_fotoAutor == 'image/jpg' || $tipo_fotoAutor == 'image/jpeg' || $tipo_fotoAutor == 'image/png'){
                        $fotoOK =$fotoAutor;        
                    }else{
                        $fotoOK="avatar.png";
                    }
                }else{
                    $fotoOK="avatar.png";
                }
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    $datos =[
                        'nombreAutor' => trim($_POST['nombreAutor']),
                        'apellidoAutor' => trim($_POST['apeAutor']),
                        'fotoAutor'   => $fotoOK,
                        
                    ];
                    $this->autorModelo->create_autor($datos);
                    $categorias = $this->categoriaModelo->read_categoria();
                    $autores = $this->autorModelo->read_autor();
                    $datos = [
                        'categorias' => $categorias,
                        'autores'    => $autores,
                    ];
                    $this->vista('pages/blog/alta_blogView',$datos);
                }else{
                    die('Algo salió mal');
                }
        }
        public function edit_autor(){
                $fotoAutor = $_FILES['foto']['name'];
                $tipo_fotoAutor = $_FILES['foto']['type'];
                $tam_fotoAutor = $_FILES['foto']['size'];
                $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/fotoAutor/';
                if ($fotoAutor == NULL){
                    $fotoOK="avatar.png";
                }
                if ($tam_fotoAutor <=1000000){
                    if ($tipo_fotoAutor == 'image/jpg' || $tipo_fotoAutor == 'image/jpeg' || $tipo_fotoAutor == 'image/png'){
                        $fotoOK =$fotoAutor;        
                    }else{
                        $fotoOK="avatar.png";
                    }
                }else{
                    $fotoOK="avatar.png";
                }
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos =[
                    'id_autor' => trim($_POST['id_autor']),
                    'nombreAutor' => trim($_POST['nombreAutor']),
                    'apeAutor' => trim($_POST['apeAutor']),
                    'foto' =>$fotoOK,
                ];
                $this->autorModelo->update_autor($datos);
                $this->listar_blog();
            }
        }
        public function alta_post(){
            $fotoPost = $_FILES['imagen']['name'];
            $tipo_fotoPost = $_FILES['imagen']['type'];
            $tam_fotoPost = $_FILES['imagen']['size'];
            $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/fotoPost/';
            if ($fotoPost == NULL){
                $fotoOK="default.png";
            }
            if ($tam_fotoPost <=1000000){
                if ($tipo_fotoPost == 'image/jpg' || $tipo_fotoPost == 'image/jpeg' || $tipo_fotoPost == 'image/png'){
                    $fotoOK =$fotoPost;        
                }else{
                    $fotoOK="default.png";
                }
            }else{
                $fotoOK="default.png";
            }
            if ($_SERVER['REQUEST_METHOD']=='POST'){
                $datos =[
                    'titulo' => trim($_POST['titulo']),
                    'primer_parrafo' => trim($_POST['primerParrafo']),
                    'contenido'   => trim($_POST['contenido']),
                    'fe' => trim($_POST['correccion']),
                    'cat' => $_POST['categoria'],
                    'aut' => $_POST['autor'],
                    'foto' => $fotoOK,   
                ];
                $this->postModelo->create_post($datos);
                $this->listar_blog();
            }else{
                die('Algo salió mal');
            }
        }
        public function editar_blog($id){
            $categorias=$this->categoriaModelo->read_categoria();
            $autores= $this->autorModelo->read_autor();
            $blogs=$this->postModelo->read_post_id($id);
            $datos=[
                'categorias' => $categorias,
                'autores' => $autores,
                'blogs' => $blogs,
            ];
         
            $this->vista('pages/blog/edit_blogView',$datos);
        }
        public function cambio_post_base(){
            $fotoPost = $_FILES['imagen']['name'];
            $tipo_fotoPost = $_FILES['imagen']['type'];
            $tam_fotoPost = $_FILES['imagen']['size'];
            $ubi=$_SERVER['DOCUMENT_ROOT'].'/app-permisos/public/img/fotoPost/';
            if ($fotoPost == NULL){
                $fotoOK="default.png";
            }
            if ($tam_fotoPost <=1000000){
                if ($tipo_fotoPost == 'image/jpg' || $tipo_fotoPost == 'image/jpeg' || $tipo_fotoPost == 'image/png'){
                    $fotoOK =$fotoPost;        
                }else{
                    $fotoOK="default.png";
                }
            }else{
                $fotoOK="default.png";
            }
            if ($_POST['categoria']=='0' || $_POST['autor']=='0'){
                $categorias=$this->categoriaModelo->read_categoria();
                $autores= $this->autorModelo->read_autor();
                $blogs=$this->postModelo->read_post_id($_POST['id_post']);
                $msj='Los campos CATEGORIA Y AUTOR son obligatorios';
            $datos=[
                'categorias' => $categorias,
                'autores' => $autores,
                'blogs' => $blogs,
                'error' => $msj,
            ];
                
              
                $this->vista('pages/blog/edit_blogView',$datos);
            }else{
           
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    $datos =[
                        'id' => trim($_POST['id_post']),
                        'titulo' => trim($_POST['titulo']),
                        'primer_parrafo' => trim($_POST['primerParrafo']),
                        'contenido'   => trim($_POST['contenido']),
                        'fe' => trim($_POST['correccion']),
                        'cat' => $_POST['categoria'],
                        'aut' => $_POST['autor'],
                        'foto' => $fotoOK, 
                    ];
                    $this->postModelo->update_post($datos);
                    $this->listar_blog();
                }else{
                    die('Algo salió mal');
                }
            }
        }

        public function listar_blog(){
            $posteos = $this->postModelo->read_post();
            $datos = [
                'posteos' => $posteos,
            ];
            $this->vista('pages/blog/list_blogView',$datos);
        }
        public function eliminar_post($id){
            if ($this->postModelo->delete_post($id)){
              
                $this->listar_blog();
 
             }else{
                 die('Algo salió mal');
             }
        }
        public function eliminar_categoria($id){
            if ($this->categoriaModelo->delete_categoria($id)){
      
                $this->listar_blog();
            }else{
                die('Algo salió mal');
            }
        }
        public function eliminar_autor($id){
            if ($this->autorModelo->delete_autor($id)){
      
                $this->listar_blog();
            }else{
            die('Algo salió mal');
            }


        }

    }
   
   
?>
