<?php

    class VencidasModel extends Query{
        public function __construct()
        {
            parent::__construct();
        }

        public function getTareas($id)
        {
            $fecha_actual = date('Y-m-d');
            $sql = "SELECT * FROM tareas WHERE id_usuario = $id and fecha_entrega < $fecha_actual";
            $data = $this->selectAll($sql);
            return $data;
        }

    }

?>