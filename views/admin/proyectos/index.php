<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/proyectos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Proyecto
    </a>
</div>


<div class="dashboard__contenedor">
    <?php if (!empty($proyectos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Proyecto</th>
                    <th scope="col" class="table__th">Cliente</th>
                    <th scope="col" class="table__th">Fecha de Inicio</th>
                    <th scope="col" class="table__th">Prioridad</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach ($proyectos as $proyecto) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $proyecto->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $proyecto->cliente; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $proyecto->fecha_inicio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $proyecto->prioridad; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/proyectos/editar?id=<?php echo $proyecto->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/proyectos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
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
        <p class="text-center">No Hay Proyectos Aún</p>
    <?php } ?>
</div>

<?php
echo $paginacion;
?>