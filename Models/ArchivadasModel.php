<?php

    class ArchivadasModel extends Query{
        public function __construct()
        {
            parent::__construct();
        }

        public function getTareasArchivadas($id)
        {
            $sql = "SELECT * FROM archivados WHERE id_usuario = $id";
            $data = $this->selectAll($sql);
            return $data;
        }

    }

?>