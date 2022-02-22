<?php 

    class MisTareas extends Controller{
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

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-danger" type="button" onclick="btnHacerPrivada('.$data[$i]['id_tarea'].');"><i class="fas fa-lock"></i></button>
                    </div>';
                }else{
                    $data[$i]['estado'] ='<span class="badge badge-danger">Privada</span>';

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnHacerPublica('.$data[$i]['id_tarea'].');"><i class="fas fa-lock-open"></i></button>
    
                    </div>';
                }
                
            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        
        public function privada(int $id)
        {   
            $data = $this->model->privadaTarea($id);
            if ($data == 1) {
                $msg = "privada";
            }else{
                $msg = "Error al hacer privada la tarea";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function publica(int $id)
        {   
            $data = $this->model->publicaTarea($id);
            if ($data == 1) {
                $msg = "publica";
            }else{
                $msg = "Error al hacer publica la tarea";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    
    }

?>
