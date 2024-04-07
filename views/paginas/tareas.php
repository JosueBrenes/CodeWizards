<section>
    <div <?php aos_animacion(); ?> class="resumen__bloque">
        <h1 class="resumen__texto3">Tareas</h1>
    </div>

    <div <?php aos_animacion(); ?> class="dashboard__contenedor">
        <?php if (!empty($tareas)) { ?>
            <div class="card-grid">
                <?php foreach ($tareas as $tarea) { ?>
                    <div class="card">
                        <div class="card__titulo"><?php echo $tarea->nombre; ?></div>
                        <div class="card__contenido">
                            <p><strong>Fecha de Inicio:</strong> <?php echo $tarea->fecha_inicio; ?></p>
                            <p><strong>Estado:</strong> <?php echo $tarea->estado; ?></p>
                            <p><strong>Prioridad:</strong> <?php echo $tarea->prioridad; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-center">No Hay Tareas Aún</p>
        <?php } ?>
    </div>
</section>
