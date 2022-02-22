<?php

    class TodasModel extends Query{
        private $id_usuario ,$titulo, $fecha_actual, $fecha_entrega, $contenido, $prioridad, $id;
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

        public function registrarTarea(int $id_usuario, string $titulo, string $fecha_actual, string $fecha_entrega, string $contenido, string $prioridad)
        {
            $this->id_usuario = $id_usuario;
            $this->titulo = $titulo;
            $this->fecha_actual = $fecha_actual;
            $this->fecha_entrega = $fecha_entrega;
            $this->contenido = $contenido;
            $this->prioridad = $prioridad;

            $sql = "INSERT INTO tareas(id_usuario,titulo,fecha,fecha_entrega,contenido,prioridad) VALUES (?,?,?,?,?,?)";
            $datos = array($this->id_usuario, $this->titulo, $this->fecha_actual, $this->fecha_entrega, $this->contenido, $this->prioridad);

            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
            return $res;
        }

        public function modificarTarea(string $titulo, string $fecha_actual, string $fecha_entrega, string $contenido, string $prioridad, int $id)
        {
            $this->titulo = $titulo;
            $this->fecha_actual = $fecha_actual;
            $this->fecha_entrega = $fecha_entrega;
            $this->contenido = $contenido;
            $this->prioridad = $prioridad;
            $this->id = $id;

            $sql = "UPDATE  tareas SET titulo = ?, fecha = ?, fecha_entrega = ?, contenido = ?, prioridad = ? WHERE id_tarea = ?";
            $datos = array($this->titulo, $this->fecha_actual, $this->fecha_entrega, $this->contenido, $this->prioridad, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            }else{
                $res = "error";
            }

            return $res;
        }

        public function editarTarea(int $id) 
        {
            $sql = "SELECT * FROM tareas WHERE id_tarea = $id";
            $data = $this->select($sql);
            return $data;
        }

        public function eliminarTarea(int $id)
        {
            $this->id = $id;
            $sql = "DELETE FROM tareas WHERE id_tarea = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);

            return $data;

        }

        public function archivarTarea(int $id)
        {
            $sql = "SELECT * FROM tareas WHERE id_tarea = $id";
            $data = $this->selectAll($sql);
            
            $this->id_usuario = $data[0]['id_usuario'];
            $this->id_tarea = $data[0]['id_tarea'];
            $this->titulo = $data[0]['titulo'];
            $this->fecha = $data[0]['fecha'];
            $this->fecha_entrega = $data[0]['fecha_entrega'];
            $this->contenido = $data[0]['contenido'];
            $this->prioridad = $data[0]['prioridad'];

            $sql = "INSERT INTO archivados(id_usuario,id_tarea,titulo,fecha,fecha_entrega,contenido,prioridad) VALUES (?,?,?,?,?,?,?)";

            $datos = array($this->id_usuario, $this->id_tarea,$this->titulo, $this->fecha, $this->fecha_entrega, $this->contenido, $this->prioridad);
            $data = $this->save($sql, $datos);
            

            $this->id = $id;
            $sql = "DELETE FROM tareas WHERE id_tarea = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);

            return $data;
        }
    }

?>