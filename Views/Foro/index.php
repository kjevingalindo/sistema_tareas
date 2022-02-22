<?php include "Views/Templates/header.php"?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Foro</li>
</ol>

<table class="table table-light w-100" id="tblForo" >
    <thead class="thead-dark">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Likes</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nuevo_comentario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Agregar Comentario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmComentario">
                    <div class="form-group">
                        <input type="hidden" id="id_t" name="id_t">
                        <label for="comentario">Comentario</label>
                        <input id="comentario" class="form-control" type="text" name="comentario" placeholder="Escribir su comentario">
                    </div>

                    <button class="btn btn-primary" id="btn-accion" type="button" onclick="agregarComentario(event);">Comentar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php"?>