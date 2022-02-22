<?php

    class ForoModel extends Query{
        private  $like,$id;
        public function __construct()
        {
            parent::__construct();
        }

        public function getTareas($id)
        {
            $sql = "SELECT u.foto, u.nombre, t.id_tarea ,t.titulo, t.contenido, t.likes FROM usuarios u INNER JOIN tareas t ON u.id_usuario = t.id_usuario AND t.estado = 1";

            $data = $this->selectAll($sql);
            return $data;
        }
        public function aumentarLike($id)
        {
            $this->id = $id;
            $this->like = 1;
            $sql = "UPDATE tareas SET likes = likes + ? WHERE id_tarea = ?";
            $datos = array($this->like, $this->id);
            $data = $this->save($sql, $datos);

            return $data;
        }

 
    }

?>