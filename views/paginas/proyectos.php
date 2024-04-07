<section>
    <div <?php aos_animacion(); ?> class="resumen__bloque">
        <h1 class="resumen__texto3">Proyectos</h1>
    </div>

    <div <?php aos_animacion(); ?> class="dashboard__contenedor">
        <?php if (!empty($proyectos)) { ?>
            <div class="card-grid">
                <?php foreach ($proyectos as $proyecto) { ?>
                    <div class="card">
                        <div class="card__titulo"><?php echo $proyecto->nombre; ?></div>
                        <div class="card__contenido">
                            <p><?php echo $proyecto->descripcion; ?></p>
                            <p><strong>Cliente:</strong> <?php echo $proyecto->cliente; ?></p>
                            <p><strong>Fecha de Inicio:</strong> <?php echo $proyecto->fecha_inicio; ?></p>
                            <p><strong>Fecha de Finalización:</strong> <?php echo $proyecto->fecha_finalizacion; ?></p>
                            <p><strong>Prioridad:</strong> <?php echo $proyecto->prioridad; ?></p>
                        </div>
                        <div class="card__acciones">
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-center">No Hay Proyectos Aún</p>
        <?php } ?>
    </div>
</section>
