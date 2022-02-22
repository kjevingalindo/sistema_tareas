<?php include "Views/Templates/header.php"?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Comentarios</li>
</ol>


<table class="table table-light w-100" id="tblComentarios" >
    <thead class="thead-dark">
        <tr>
            <th>Comentarios</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div class="card" id="comen">
    <div class="card-body">
        <h5 class="card-title" id="nombre-tarea"></h5>
        <p class="card-text" id="titulo-tarea"></p>
    </div>
    <div class="card-footer">
        <h5 class="card-title" id="nombre-persona"></h5>
        <p class="card-text" id="comentario-persona"></p>
    </div>
</div>
<hr>


<?php include "Views/Templates/footer.php"?>