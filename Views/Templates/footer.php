<div class="row">
    <div id="perfil_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Editar Perfil</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" id="frmUsuario">
                        <div class="form-group">
                                <label for="usuario">Usuarios</label>
                                <input type="hidden" id="id" name="id">
                                <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ingrese el usuario">
                            </div>
                            <div class="form-group">
                                <label for="fecha_nac">Fecha de nacimiento</label>
                                <input id="fecha_nac" class="form-control" type="date" name="fecha_nac" placeholder="Ingrese su dirección">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese su telefono">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese su dirección">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input id="correo" class="form-control" type="text" name="correo" placeholder="Ingrese su correo">
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
                                                                    
                            <button class="btn btn-primary" id="btn-accion_p" type="button" onclick="registrarUser(event);">Actualizar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            
                            <img class="ml-auto mr-auto mt-3 rounded-circle img-cover" src="" id="foto_perfil">
                            <div class="card-body">
                                <h5 class="card-title text-dark text-center" id="insertar_nombre"></h5>
                                <hr>
                                <p class="card-text text-primary">Usuario: <span class="text-secondary" id="insertar_usuario"></span> </p>
                                <hr>
                                <p class="card-text text-primary">Fecha Nacimiento: <span class="text-secondary" id="insertar_nacimiento"></span> </p>
                                <hr>
                                <p class="card-text text-primary">Telefono: <span class="text-secondary" id="insertar_telefono"></span> </p>
                                <hr>
                                <p class="card-text text-primary">Dirección: <span class="text-secondary" id="insertar_direccion"></span> </p>
                                <hr>
                                <p class="card-text text-primary">Correo: <span class="text-secondary" id="insertar_correo"></span> </p>                                      
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url; ?>Assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url; ?>Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url; ?>Assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url; ?>Assets/vendor/chart.js/Chart.min.js"></script>

    <script src="<?php echo base_url; ?>Assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/dataTables.bootstrap4.min.js"></script>

    
    <script>
        const base_url = '<?php echo base_url;?>'
    </script>
    
    <script src="<?php echo base_url;?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>


</body>

</html>