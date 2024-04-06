<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información de la Tarea</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre de la Tarea" value="<?php echo htmlspecialchars($tarea->nombre); ?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripción de la Tarea"><?php echo htmlspecialchars($tarea->descripcion); ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="fecha_inicio" class="formulario__label">Fecha de Inicio</label>
        <input type="date" class="formulario__input" id="fecha_inicio" name="fecha_inicio" value="<?php echo htmlspecialchars($tarea->fecha_inicio); ?>">
    </div>

    <div class="formulario__campo">
        <label for="fecha_finalizacion" class="formulario__label">Fecha de Finalización</label>
        <input type="date" class="formulario__input" id="fecha_finalizacion" name="fecha_finalizacion" value="<?php echo htmlspecialchars($tarea->fecha_finalizacion); ?>">
    </div>

    <div class="formulario__campo">
        <label for="estado" class="formulario__label">Estado</label>
        <input type="text" class="formulario__input" id="estado" name="estado" placeholder="Estado de la Tarea" value="<?php echo htmlspecialchars($tarea->estado); ?>">
    </div>

    <div class="formulario__campo">
        <label for="prioridad" class="formulario__label">Prioridad</label>
        <input type="text" class="formulario__input" id="prioridad" name="prioridad" placeholder="Prioridad de la Tarea" value="<?php echo htmlspecialchars($tarea->prioridad); ?>">
    </div>
</fieldset>