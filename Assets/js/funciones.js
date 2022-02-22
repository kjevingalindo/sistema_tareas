let tblUsuarios, tblTodas, tblMisTareas,tblTodasPendientes, tblTodasVencidas, tblTodasArchivadas, tblForo, tblComentarios;


//Usuarios
document.addEventListener('DOMContentLoaded',function() {
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + 'Usuarios/listar',
            dataSrc: ''
        },
        columns: [
            {
            'data': 'id_usuario'
            },
            {
                'data': 'usuario'
            },
            {
                'data': 'nombre'
            },
            {
                'data': 'correo'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'acciones'
            }
        ]
    } );
})

//Todas
document.addEventListener('DOMContentLoaded',function() {
    tblTodas = $('#tblTodas').DataTable({
        ajax: {
            url: base_url + 'Todas/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id_tarea'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'fecha'
            },
            {
                'data': 'fecha_entrega'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'prioridad'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'acciones'
            }
        ]
    } );
})

//Mis Tareas
document.addEventListener('DOMContentLoaded',function() {
    tblMisTareas = $('#tblMisTareas').DataTable({
        ajax: {
            url: base_url + 'MisTareas/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id_tarea'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'fecha'
            },
            {
                'data': 'fecha_entrega'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'prioridad'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'acciones'
            }
        ]
    } );
})

//Pendientes
document.addEventListener('DOMContentLoaded',function() {
    tblTodasPendientes = $('#tblTodasPendientes').DataTable({
        ajax: {
            url: base_url + 'Pendientes/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id_tarea'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'fecha'
            },
            {
                'data': 'fecha_entrega'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'prioridad'
            }
        ]
    } );
})

//Vencidas
document.addEventListener('DOMContentLoaded',function() {
    tblTodasVencidas = $('#tblTodasVencidas').DataTable({
        ajax: {
            url: base_url + 'Vencidas/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id_tarea'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'fecha'
            },
            {
                'data': 'fecha_entrega'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'prioridad'
            }
        ]
    } );
})

//Archivadas
document.addEventListener('DOMContentLoaded',function() {
    tblTodasArchivadas = $('#tblTodasArchivadas').DataTable({
        ajax: {
            url: base_url + 'Archivadas/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'id_tarea'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'fecha'
            },
            {
                'data': 'fecha_entrega'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'prioridad'
            }
        ]
    } );
})

//FORO
document.addEventListener('DOMContentLoaded',function() {
    tblForo = $('#tblForo').DataTable({
        ajax: {
            url: base_url + 'Foro/listar',
            dataSrc: ''
        },
        
        columns: [
            {
                'data': 'foto'
            },
            {
                'data': 'nombre'
            },
            {
                'data': 'titulo'
            },
            {
                'data': 'contenido'
            },
            {
                'data': 'likes'
            },
            {
                'data': 'acciones'
            }
        ]
    } );
})

//COMENTARIOS--------------

document.addEventListener('DOMContentLoaded',function() {
    tblComentarios = $('#tblComentarios').DataTable({
        ajax: {
            url: base_url + 'Comentarios/listar',
            dataSrc: ''
        },
        
        columns: [
            {
                'data': 'datos'
            }
        ]
    } );
})

//COMENTARIOS--------------



//PERFIL --------

function frmPerfil(id) {
    document.getElementById("imagenes").classList.remove("d-none");
    const url = base_url + "Usuarios/editar/" +id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);

            document.getElementById("id").value = res.id_usuario;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("fecha_nac").value = res.fecha_nacimiento;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("correo").value = res.correo;
            document.getElementById("img-preview").src = base_url + 'Assets/img/' +res.foto;

            document.getElementById("icon-imagen").classList.add("d-none");
            document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImage();"><i class="fas fa-times"></i></button>`;

            document.getElementById("foto_actual").value = res.foto;


            document.getElementById("insertar_usuario").innerHTML = res.usuario;
            document.getElementById("insertar_nombre").innerHTML = res.nombre;
            document.getElementById("insertar_nacimiento").innerHTML = res.fecha_nacimiento;
            document.getElementById("insertar_telefono").innerHTML = res.telefono;
            document.getElementById("insertar_direccion").innerHTML = res.direccion;
            document.getElementById("insertar_correo").innerHTML = res.correo;
            document.getElementById("foto_perfil").src = base_url + 'Assets/img/' +res.foto;
            


            document.getElementById("claves").classList.add("d-none");

            $("#perfil_edit").modal("show");
        }
    }
}

function preview(e) {
    const url = e.target.files[0];
    const urltmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urltmp;
    document.getElementById("icon-imagen").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImage();"><i class="fas fa-times"></i></button> ${url['name']}`
}

function deleteImage() {
    document.getElementById("img-preview").src = "";
    document.getElementById("icon-cerrar").innerHTML = "";
    document.getElementById("icon-imagen").classList.remove("d-none");
    document.getElementById("imagen").value = "";
    document.getElementById("foto_actual").value = "";

}

//PERFIL --------


//MIS TAREAS--------------

function btnHacerPrivada(id) {
    Swal.fire({
        title: "Esta seguro de esto?",
        text: "La tarea no se mostrara a los demas usuarios!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) =>{
        if (result.isConfirmed) {
            const url = base_url + "MisTareas/privada/" +id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "privada"){
                        Swal.fire(
                            'Mensaje!',
                            'La tarea se hizo privada con éxito!',
                            'success'
                        )
                        tblMisTareas.ajax.reload();
                        locations.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })
}

function btnHacerPublica(id) {
    Swal.fire({
        title: "Esta seguro de esto?",
        text: "La tarea ahora se mostrara a los demas usuarios!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) =>{
        if (result.isConfirmed) {
            const url = base_url + "MisTareas/publica/" +id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "publica"){
                        Swal.fire(
                            'Mensaje!',
                            'La tarea se hizo publica con éxito!',
                            'success'
                        )
                        tblMisTareas.ajax.reload();
                        // locations.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })
}
//MIS TAREAS-------------


// USUARIOS -----------

function frmLogin(e){

    e.preventDefault();
    const usuario = document.getElementById('usuario_l');
    const clave = document.getElementById('clave_l');


    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
        
    }else if (clave.value == "") {
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin")
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            }
        }

    }
}

function frmUsuario() {
    
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("imagenes").classList.add("d-none");
    document.getElementById("frmUsuario").reset();

    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

function frmRecuperar() {
    document.getElementById("frmRecuperar").reset();
    $("#recuperar").modal("show");
}

function registrarUser(e){

    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const correo = document.getElementById("correo");


    if (usuario.value == "" || nombre.value == "" || correo.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          })
          
        
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario registrado con exito',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    frm.reset();
                    $("#nuevo_usuario").modal('hide');
                    tblUsuarios.ajax.reload();

                }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    $("#perfil_edit").modal('hide');
                    tblUsuarios.ajax.reload();
                    tblForo.ajax.reload();

                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }

    }
}

function btnEliminarUser(id) {
    Swal.fire({
        title: "Esta seguro de eliminar?",
        text: "El usuario se eliminara!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) =>{
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/" +id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "eliminado"){
                        Swal.fire(
                            'Eliminado!',
                            'Usuario eliminado con éxito!',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Eliminado!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })
}

function recuperarContraseña(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario_recuperar");
    const respuesta_r = document.getElementById("respuesta_r");
    if (usuario.value == "" || respuesta_r.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 1500
          })
    }else{
        const url = base_url + "Usuarios/recuperar";
        const frm = document.getElementById("frmRecuperar");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "ok"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos correctos',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#recuperar").modal('hide');
                    $("#actualizar_clave").modal("show");

                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();

                }
            }
        }
                
    }

}

function actualizarClave(e) {
    e.preventDefault();
    const clave_n = document.getElementById("clave_n");
    const clave_c = document.getElementById("clave_c");

    if (clave_n.value == "" || clave_c.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 1500
          })
    }else if (clave_n.value != clave_c.value) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            showConfirmButton: false,
            timer: 1500
          })
    }else{
        const url = base_url + "Usuarios/actualizarClave";
        const frm = document.getElementById("frmActualizarClave");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Contraseña actualizada',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#actualizar_clave").modal("hide");

                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();

                }
            }
        }
    }
    
}


// USUARIOS -----------


// TAREAS --------------

function frmTarea() {
    document.getElementById("title").innerHTML = "Agregar Tarea";
    document.getElementById("btn-accion").innerHTML = "Agregar";
    document.getElementById("frmTareas").reset();

    $("#nueva_tarea").modal("show");
    document.getElementById("id_de_tarea").value = "";
}

function registrarTarea(e){

    e.preventDefault();
    const titulo = document.getElementById("titulo");
    const fecha_actual = document.getElementById("fecha_actual");
    const fecha_entrega = document.getElementById("fecha_entrega");
    const contenido = document.getElementById("contenido");
    const prioridad = document.getElementById("prioridad");

    if (titulo.value == "" || fecha_actual.value == "" || fecha_entrega.value == "" || contenido.value == "" || prioridad.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          })
          
    }else{
        const url = base_url + "Todas/registrar";
        const frm = document.getElementById("frmTareas");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tarea registrada con exito',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    frm.reset();
                    $("#nueva_tarea").modal('hide');
                    tblTodas.ajax.reload();

                }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tarea modificada con éxito',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    
                    $("#nueva_tarea").modal('hide');
                    tblTodas.ajax.reload();

                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }

    }
}

function btnEditarTarea(id) {    
    document.getElementById("title").innerHTML = "Editar Tarea";
    document.getElementById("btn-accion").innerHTML = "Actualizar";
    const url = base_url + "Todas/editar/" +id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id_tarea;
            document.getElementById("titulo").value = res.titulo;
            document.getElementById("fecha_actual").value = res.fecha;
            document.getElementById("fecha_entrega").value = res.fecha_entrega;
            document.getElementById("contenido").value = res.contenido;
            document.getElementById("prioridad").value = res.prioridad;

            $("#nueva_tarea").modal("show");
        }
    }
   
}

function btnEliminarTarea(id) {
    Swal.fire({
        title: "Esta seguro de eliminar?",
        text: "La tarea se eliminara!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) =>{
        if (result.isConfirmed) {
            const url = base_url + "Todas/eliminar/" +id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "eliminado"){
                        Swal.fire(
                            'Eliminado!',
                            'Tarea eliminada con éxito!',
                            'success'
                        )
                        tblTodas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })
}

function btnArchivarTarea(id) {
    Swal.fire({
        title: "Esta seguro de archivar?",
        text: "La tarea no se eliminara, solo sera archivada!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
    }).then((result) =>{
        if (result.isConfirmed) {
            const url = base_url + "Todas/archivar/" +id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "archivado"){
                        Swal.fire(
                            'Archivado!',
                            'Tarea archivada con éxito!',
                            'success'
                        )
                        tblTodas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })
}
// TAREAS --------------


// FORO ---------------

function btnDarLike(id) {
    const url = base_url + "Foro/like/" +id;
        const http = new XMLHttpRequest();
        http.open("GET",url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {

                const res = JSON.parse(this.responseText);
                if (res == "ok"){
                    tblForo.ajax.reload();
                }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                    )
                }
            }
        }
}

function btnComentar(id) {
    $("#nuevo_comentario").modal("show");
    document.getElementById("id_t").value = id;
}

// FORO ---------------



// COMENTARIOS ---------------

function agregarComentario(e){
    e.preventDefault();
    const comentario = document.getElementById("comentario");
    if (comentario.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          })
          
    }else{
        const url = base_url + "Comentarios/agregarC";
        const frm = document.getElementById("frmComentario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'comentario enviado con exito',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    frm.reset();
                    $("#nuevo_comentario").modal("hide");

                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }

    }
}

// COMENTARIOS ---------------

