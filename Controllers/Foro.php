<?php 

    class Foro extends Controller{
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
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-warning" type="button" onclick="btnDarLike('.$data[$i]['id_tarea'].');"><i class="far fa-thumbs-up"></i></button>
                <button class="btn btn-success" type="button" onclick="btnComentar('.$data[$i]['id_tarea'].');"><i class="fas fa-comment"></i></button>
                </div>';
                $data[$i]['foto'] = '<img class="ml-auto mr-auto mt-3 rounded-circle img-cover2" src="Assets/img/'.$data[$i]['foto'].'">';

            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        
        public function like($id)
        {
            $data = $this->model->aumentarLike($id);
            if ($data == 1) {
                $msg = "ok";
            }else{
                $msg = "Error al dar like";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }


    
    }

?>
