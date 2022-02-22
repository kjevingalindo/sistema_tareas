<?php include "Views/Templates/header.php"?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Todas</li>
</ol>

<button class="btn btn-primary" type="button" onclick="frmTarea();">Nuevo</button>

<table class="table table-light w-100" id="tblTodas" >
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Entrega</th>
            <th>Contenido</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nueva_tarea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Agregar tarea</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmTareas">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="hidden" id="id_de_tarea" name="id_de_tarea">
                        <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Ingrese el título">
                    </div>
                    <div class="row" id="fechas">
                        <?php 
                            setlocale(LC_ALL,"es_ES");
                            $fecha = date('Y-m-d');
                        ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_actual" class="text-gray-900" >Fecha de trabajo</label>
                                <input id="fecha_actual" class="form-control form-control-user" type="date" name="fecha_actual" value="<?php echo $fecha; ?>" min="<?php echo $fecha; ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_entrega "class="text-gray-900" >Fecha entrega</label>
                                <input id="fecha_entrega" class="form-control form-control-user" type="date" name="fecha_entrega" min="<?php echo $fecha; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea id="contenido" class="form-control" name="contenido" rows="3" placeholder="Contenido..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prioridad">Prioridad</label>
                        <select id="prioridad" class="form-control" name="prioridad">
                            <option>Importante</option>
                            <option>Regular</option>
                            <option>Irrelevante</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" id="btn-accion" type="button" onclick="registrarTarea(event);">Agregar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php"?>