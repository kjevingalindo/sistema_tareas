<?php 

    class Usuarios extends Controller{
        public function __construct() {
            session_start();
            parent::__construct();
        }
        public function index()
        {
            
            $this->views->getView($this, 'index');
        }

        public function listar()
        {
            $data = ($this->model->getUsuarios());
            for ($i=0; $i < count($data); $i++){
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                }
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id_usuario'].');"><i class="fas fa-trash"></i></button>
                </div>';
            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function validar()
        {
            if (empty($_POST['usuario_l']) || empty($_POST['clave_l'])) {
                $msg = "Los campos estan vacios";
            }else{
                $usuario  = $_POST['usuario_l'];
                $clave = $_POST['clave_l'];

                $data = $this->model->getUsuario($usuario, $clave);
                if ($data) {
                    $_SESSION['id_usuario'] = $data['id_usuario'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['fotos'] = $data['foto'];

                    $msg = "ok";
                }else{
                    $msg = "Usuario o contraseña incorrecta";
                }
            }
            echo json_encode($msg,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar()
        {
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $confirmar = $_POST['confirmar'];
            $id = $_POST['id'];

            $img = $_FILES['imagen'];
            $name = $img['name'];
            $tmpName = $img['tmp_name'];
            $imgName = "undraw_profile.svg";
            $fecha = date("YmdHis");

            
            

            if (empty($usuario) || empty($nombre) || empty($correo)) {
                $msg = "Todos los campos son obligatorios";
            }else{
                if (!empty($name)) {
                    $imgName = $fecha . ".jpg";
                    $destino = "Assets/img/".$imgName;
                }else if (!empty($_POST['foto_actual']) && empty($name)) {
                    $imgName = $_POST['foto_actual'];
                }else{
                    $imgName = "undraw_profile.svg";
                }
                if($id == ""){
                    $pregunta = $_POST['pregunta_secreta'];
                    $respuesta = $_POST['respuesta'];
                    if($clave != $confirmar || empty($clave)){
                        $msg = "Las contraseñas no coinciden";
                    }else{
                        $data = $this->model->registrarUsuario($usuario, $nombre, $correo, $clave, $imgName, $pregunta, $respuesta);
                        if ($data == "ok") {
                            if (!empty($name)) {
                                move_uploaded_file($tmpName, $destino);
                            }
                            $msg = "si";
                        }else if($data == "existe"){
                            $msg = "El usuario ya existe";
                        }else{
                            $msg = "Error al registrar usuario";
                        }
                    }
    
                }else{
                    $fecha_nac = $_POST['fecha_nac'];
                    if (empty($telefono) || empty($direccion) || empty($fecha_nac)) {
                        $msg = "Todos los campos son obligatorios";
                    }else{

                        $data = $this->model->modificarUsuario($usuario, $nombre, $correo, $telefono, $direccion, $imgName, $fecha_nac, $id);
                        if ($data == "modificado") {
                            if (!empty($name)) {
                                move_uploaded_file($tmpName, $destino);     
                            }
                            $msg = "modificado";
                        }else{
                            $msg = "Errror al modificar el usuario";
                        }
                    }
                    
                    
                }
                
            }
            
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();

        }

        public function editar(int $id)
        {
            $data = $this->model->editarUser($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        
        public function eliminar(int $id)
        {   
            $data = $this->model->eliminarUser($id);
            if ($data == 1) {
                $msg = "eliminado";
            }else{
                $msg = "Error al eliminar el usuario";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function recuperar()
        {
            $usuario = $_POST['usuario_recuperar'];
            $pregunta = $_POST['pregunta_secreta_r'];
            $respuesta = $_POST['respuesta_r'];

            $data = $this->model->recuperarUsuario($usuario, $pregunta,$respuesta);
            if ($data) {
                $_SESSION['usuarioR'] = $usuario;
                $msg = "ok";
            }else{
                $msg = "Respuesta o usuario incorrecto";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function actualizarClave()
        {
            $usuario = $_SESSION['usuarioR'];
            $clave = $_POST['clave_n'];

            $hash = hash("SHA256", $clave);

            $msg = $usuario;
            $data = $this->model->actualizarClaveUser($usuario, $clave);

            if ($data == "modificado") {
                $msg = "modificado";
            }else{
                $msg = "Error al modificar contraseña";
            }
            
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

?>
