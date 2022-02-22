<?php 

    class Todas extends Controller{
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
            $id = $_SESSION['id_usuario'];
            $data = ($this->model->getTareas($id));
            for ($i=0; $i < count($data); $i++){
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] ='<span class="badge badge-success">Pública</span>';
                }else{
                    $data[$i]['estado'] ='<span class="badge badge-danger">Privada</span>';
                }
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarTarea('.$data[$i]['id_tarea'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarTarea('.$data[$i]['id_tarea'].');"><i class="fas fa-trash"></i></button>
                <button class="btn btn-dark" type="button" onclick="btnArchivarTarea('.$data[$i]['id_tarea'].');"><i class="fas fa-file-archive"></i></button>
                </div>';
            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar()
        {
            $id_usuario = $_SESSION['id_usuario'];
            $titulo = $_POST['titulo'];
            $fecha_actual = $_POST['fecha_actual'];
            $fecha_entrega = $_POST['fecha_entrega'];
            $contenido = $_POST['contenido'];
            $prioridad = $_POST['prioridad'];
            $id = $_POST['id_de_tarea'];

            if (empty($titulo) || empty($fecha_actual) || empty($fecha_entrega) || empty($contenido) || empty($prioridad)) {
                $msg = "Todos los campos son obligatorios";
            }else{
                if($id == ""){
                    $data = $this->model->registrarTarea($id_usuario, $titulo, $fecha_actual, $fecha_entrega, $contenido, $prioridad);
                    if ($data == "ok") {
                        $msg = "si";
                    }else{
                        $msg = "Error al registrar tarea";
                    } 
    
                }else{
                    $data = $this->model->modificarTarea($titulo, $fecha_actual, $fecha_entrega, $contenido, $prioridad, $id);
                    if ($data == "modificado") {
                        $msg = "modificado";
                    }else{
                        $msg = "Errror al modificar el usuario";
                    }
                }
                
            }
            
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();

        }

        public function editar(int $id)
        {
            $data = $this->model->editarTarea($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        
        public function eliminar(int $id)
        {   
            $data = $this->model->eliminarTarea($id);
            if ($data == 1) {
                $msg = "eliminado";
            }else{
                $msg = "Error al eliminar la tarea";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function archivar(int $id)
        {
            $data = $this->model->archivarTarea($id);
            if ($data == 1) {
                $msg = "archivado";
            }else{
                $msg = "Error al archivar la tarea";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

?>
