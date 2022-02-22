<?php

    class UsuariosModel extends Query{
        private $usuario, $nombre, $correo, $clave, $telefono, $direccion, $imgName, $pregunta, $respuesta, $fecha_nac, $id;
        public function __construct()
        {
            parent::__construct();
        }

        public function getUsuario(string $usuario, string $clave)
        {
            $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
            $data = $this->select($sql);
            return $data;
        }

        public function getUsuarios()
        {
            $sql = "SELECT * FROM usuarios";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarUsuario(string $usuario, string $nombre, string $correo, string $clave, string $imgName, string $pregunta, string $respuesta)
        {
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->imgName = $imgName;
            $this->pregunta = $pregunta;
            $this->respuesta = $respuesta;

            $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
            $existe = $this->select($verificar);
            if (empty($existe)) {
                $sql = "INSERT INTO usuarios(usuario,nombre,correo,clave,foto,pregunta,respuesta) VALUES (?,?,?,?,?,?,?)";
                $datos = array($this->usuario, $this->nombre, $this->correo, $this->clave, $this->imgName, $this->pregunta, $this->respuesta);
    
                $data = $this->save($sql, $datos);
                if ($data == 1) {
                    $res = "ok";
                }else{
                    $res = "error";
                }
            }else{
                $res = "existe";
            }


            return $res;
        }

        public function modificarUsuario(string $usuario, string $nombre, string $correo, string $telefono, string $direccion, string $imgName, string $fecha_nac, int $id)
        {
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->imgName = $imgName;
            $this->fecha_nac = $fecha_nac;
            $this->id = $id;

            $sql = "UPDATE  usuarios SET usuario = ?, nombre = ?, correo = ?, telefono = ?, direccion = ?, foto = ?, fecha_nacimiento = ? WHERE id_usuario = ?";
            $datos = array($this->usuario, $this->nombre, $this->correo, $this->telefono, $this->direccion, $this->imgName, $fecha_nac, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            }else{
                $res = "error";
            }

            return $res;
        }

        public function editarUser(int $id) 
        {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $data = $this->select($sql);
            return $data;
        }


        public function editarUsuario(int $id) 
        {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $data = $this->select($sql);
            return $data;
        }

        public function eliminarUser(int $id)
        {
            $this->id = $id;
            $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);

            return $data;
        }

        public function recuperarUsuario(string $usuario, string $pregunta ,string $respuesta)
        {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and respuesta = '$respuesta' and pregunta = '$pregunta'";
            $data = $this->select($sql);
            return $data;
        }

        public function actualizarClaveUser(string $usuario, string $clave) 
        {
            $this->usuario = $usuario;
            $this->clave = $clave;

            $sql = "UPDATE usuarios SET clave=? WHERE usuario = ? ";
            $datos = array($this->clave, $this->usuario);
            $data = $this->save($sql, $datos);

            if ($data == 1) {
                $res = "modificado";
            }else{
                $res = "error";
            }

            return $res;
        }
    }

?>