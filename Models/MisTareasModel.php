<?php

    class MisTareasModel extends Query{
        private  $id;
        public function __construct()
        {
            parent::__construct();
        }

        public function getTareas($id)
        {
            $sql = "SELECT * FROM tareas WHERE id_usuario = $id";
            $data = $this->selectAll($sql);
            return $data;
        }
 

        public function privadaTarea(int $id)
        {
            $this->id = $id;
            $this->estado = 0;
            $sql = "UPDATE tareas SET estado = ? WHERE id_tarea = ?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);

            return $data;

        }

        public function publicaTarea(int $id)
        {
            $this->id = $id;
            $this->estado = 1;
            $sql = "UPDATE tareas SET estado = ? WHERE id_tarea = ?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);

            return $data;

        }

    }

?>