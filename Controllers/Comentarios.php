<?php 

    class Comentarios extends Controller{
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
            $data = ($this->model->getComentarios());
            for ($i=0; $i < count($data); $i++){
                $dat = $this->model->getDatos($data[$i]['usuario_comentario']);
                $data[$i]['datos'] = '
                <div class="card" id="comen">
                    <div class="card-body">
                        <div class="row">
                        
                        <img class="ml-auto mr-auto rounded-circle img-cover3" src="'.base_url."Assets/img/".$data[$i]['foto'].'"/>
                        <div class="col-md-10">
                            <span class="h4">'.$data[$i]['nombre'].'</span><br>
                            <span class="h6" >'."Título: ".$data[$i]['titulo'].'</span>
                        </div>
                        <div class="col-md-1">
                            <span class="h6" >'.$data[$i]['likes'].'<i class="fas fa-star"></i> </span>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <div class="card-body">
                            <div class="row">
                            <img class="ml-auto mr-auto rounded-circle img-cover4" src="'.base_url."Assets/img/".$dat['foto'].'"/>

                            <div class="col-md-10">
                                <span class="h6" >'.$dat['nombre'].": ".$data[$i]['comentario'].'</span>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function agregarC()
        {
            $id_tarea = $_POST['id_t'];
            $id_usuario = $_SESSION['id_usuario'];
            $comentario = $_POST['comentario'];
            $data = $this->model->agregarComentario($id_usuario, $id_tarea, $comentario);

            if ($data == "ok") {
                $msg = "si";
            }else{
                $msg = "Error al agregar el comentarios";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    
    }

?>
