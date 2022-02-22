<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url; ?>Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url; ?>Assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>Assets/js/all.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                    </div>
                                    <hr>
                                    <form class="user" id="frmLogin">
                                        <div class="form-group">
                                            <label for="usuario_l"><i class="fas fa-user"></i> Usuario</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="usuario_l" name="usuario_l" placeholder="Ingrese su usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="clave_l"><i class="fas fa-key"></i> Contraseña</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="clave_l" name="clave_l" placeholder="Ingrese su contraseña">
                                        </div>

                                        <button class="btn text-primary" type="button" onclick="frmRecuperar();"><a>¿Olvidaste tu contraseña?</a></button>

                                        <div class="alert alert-danger text-center d-none " role="alert" id="alerta">
                                        </div>
                                        <hr>

                                        <button class="btn btn-primary btn-user btn-block" type="submit" onclick="frmLogin(event);">Iniciar Sesión</button>

                                        <button class="btn btn-danger btn-user btn-block" type="button" onclick="frmUsuario();">Registrar</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="recuperar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Recuperar Contraseña</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmRecuperar">
                        <div class="form-group">
                            <label for="usuario_recuperar">Usuario</label>
                            <input id="usuario_recuperar" class="form-control" type="text" name="usuario_recuperar" placeholder="Usuario">
                        </div>

                        <div class="form-group">
                            <label for="my-select">Pregunta secreta</label>
                            <select id="pregunta_secreta_r" class="form-control" name="pregunta_secreta_r">
                                <option >¿Cual es tu pelicula favorita?</option>
                                <option >Nombre de tu madre</option>
                                <option >Nombre de tu mascota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="respuesta_r">Respuesta</label>
                            <input id="respuesta_r" class="form-control" type="text" name="respuesta_r" placeholder="Ingrese su respuesta" >
                        </div>
            
                        <button class="btn btn-primary" type="button" onclick="recuperarContraseña(event);" id="btnAccion">Recuperar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="actualizar_clave" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Recuperar Contraseña</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmActualizarClave">
                        <div class="form-group">
                            <label for="clave_n">Contraseña Nueva</label>
                            <input id="clave_n" class="form-control" type="password" name="clave_n" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="clave_c">Confirmar Contraseña</label>
                            <input id="clave_c" class="form-control" type="password" name="clave_c" placeholder="Confirmar Contraseña" >
                        </div>
            
                        <button class="btn btn-primary" type="button" onclick="actualizarClave(event);" id="btnAccion">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="title">Nuevo Usuario</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario" class="user">
                        <div class="form-group">
                            <label for="usuario" class="text-gray-900">Usuario</label>
                            <input type="hidden" id="id" name="id">
                            <input id="usuario" class="form-control form-control-user" type="text" name="usuario" placeholder="Ingrese el usuario">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="text-gray-900">Nombre</label>
                            <input id="nombre" class="form-control form-control-user" type="text" name="nombre" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group">
                            <label for="correo" class="text-gray-900" >Correo</label>
                            <input id="correo" class="form-control form-control-user" type="email" name="correo" placeholder="Ingrese su correo">
                        </div>
                        <div class="form-group">
                            <input id="telefono" class="form-control" type="hidden" name="telefono" placeholder="Ingrese su telefono">
                        </div>
                        <div class="form-group">
                            <input id="direccion" class="form-control" type="hidden" name="direccion" placeholder="Ingrese su dirección">
                        </div>
                        <div class="row" id="claves">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clave" class="text-gray-900" >Contraseña</label>
                                    <input id="clave" class="form-control form-control-user" type="password" name="clave" placeholder="Ingrese su contraseña">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar "class="text-gray-900" >Confirmar contraseña</label>
                                    <input id="confirmar" class="form-control form-control-user" type="password" name="confirmar" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="imagenes">
                            <div class="form-group">
                                <label >Foto</label>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <label for="imagen" id="icon-imagen" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                        <span id="icon-cerrar"></span>
                                        <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event);"><br>
                                        <input type="hidden" id="foto_actual" name="foto_actual">
                                        <img class="img-thumbnail" id="img-preview" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="my-select">Pregunta secreta</label>
                            <select id="pregunta_secreta" class="form-control" name="pregunta_secreta">
                                <option >¿Cual es tu pelicula favorita?</option>
                                <option >Nombre de tu madre</option>
                                <option >Nombre de tu mascota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="respuesta">Respuesta</label>
                            <input id="respuesta" class="form-control form-control-user" type="text" name="respuesta">
                        </div>

                        <button class="btn btn-primary btn-user btn-block" id="btn-accion" type="button" onclick="registrarUser(event);">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url; ?>Assets/js/sb-admin-2.min.js"></script>

    <script src="<?php echo base_url; ?>Assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/dataTables.bootstrap4.min.js"></script>

    <script>
        const base_url = '<?php echo base_url; ?>'
    </script>
    <script src="<?php echo base_url;?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>

</body>

</html>