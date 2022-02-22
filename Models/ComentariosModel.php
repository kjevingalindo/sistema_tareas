<?php

    class ComentariosModel extends Query{
        private  $like,$id, $id_usuario, $id_tarea, $comentario;
        public function __construct()
        {
            parent::__construct();
        }

        public function getComentarios()
        {
            $sql = "SELECT u.foto, u.id_usuario, u.nombre, t.id_tarea, t.titulo, t.likes, c.id_usuario as usuario_comentario, c.id_comentario, c.comentario FROM usuarios u INNER JOIN tareas t INNER JOIN comentarios c ON u.id_usuario = t.id_usuario  and t.id_tarea = c.id_tarea ORDER BY c.id_comentario";

            $data = $this->selectAll($sql);
            return $data;
        }
        public function getDatos(int $id)
        {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";

            $data = $this->select($sql);
            return $data;
        }

        public function agregarComentario(int $id_usuario, int $id_tarea, string $comentario)
        {
            $this->id_usuario = $id_usuario;
            $this->id_tarea = $id_tarea;
            $this->comentario = $comentario;

            $sql = "INSERT INTO comentarios (id_usuario,id_tarea,comentario) VALUES (?,?,?)";
            $datos = array($this->id_usuario, $this->id_tarea, $this->comentario);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
            return $res;
        }


 
    }

?>