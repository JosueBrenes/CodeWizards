<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/tareas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Tarea
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($tareas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Fecha de Inicio</th>
                    <th scope="col" class="table__th">Estado</th>
                    <th scope="col" class="table__th">Prioridad</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($tareas as $tarea) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $tarea->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tarea->fecha_inicio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tarea->estado; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $tarea->prioridad; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/tareas/editar?id=<?php echo $tarea->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/tareas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No Hay Tareas Aún</p>
    <?php } ?>
</div>

<?php
echo $paginacion;
?>