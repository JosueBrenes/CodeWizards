<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Proyecto</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del Proyecto</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del Proyecto" value="<?php echo $proyecto->nombre; ?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripción del Proyecto" rows="8"><?php echo $proyecto->descripcion; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="fecha_inicio" class="formulario__label">Fecha de Inicio</label>
        <input type="date" class="formulario__input" id="fecha_inicio" name="fecha_inicio" value="<?php echo $proyecto->fecha_inicio; ?>">
    </div>

    <div class="formulario__campo">
        <label for="fecha_finalizacion" class="formulario__label">Fecha de Finalización</label>
        <input type="date" class="formulario__input" id="fecha_finalizacion" name="fecha_finalizacion" value="<?php echo $proyecto->fecha_finalizacion; ?>">
    </div>

    <div class="formulario__campo">
        <label for="participantes" class="formulario__label">Participantes</label>
        <input type="text" class="formulario__input" id="participantes" name="participantes" placeholder="Participantes del Proyecto" value="<?php echo $proyecto->participantes; ?>">
    </div>

    <div class="formulario__campo">
        <label for="estado" class="formulario__label">Estado</label>
        <input type="text" class="formulario__input" id="estado" name="estado" placeholder="Estado del Proyecto" value="<?php echo $proyecto->estado; ?>">
    </div>

    <div class="formulario__campo">
        <label for="cliente" class="formulario__label">Cliente</label>
        <input type="text" class="formulario__input" id="cliente" name="cliente" placeholder="Cliente del Proyecto" value="<?php echo $proyecto->cliente; ?>">
    </div>

    <div class="formulario__campo">
        <label for="prioridad" class="formulario__label">Prioridad</label>
        <select class="formulario__select" id="prioridad" name="prioridad">
            <option value="alta" <?php echo ($proyecto->prioridad === 'alta') ? 'selected' : ''; ?>>Alta</option>
            <option value="media" <?php echo ($proyecto->prioridad === 'media') ? 'selected' : ''; ?>>Media</option>
            <option value="baja" <?php echo ($proyecto->prioridad === 'baja') ? 'selected' : ''; ?>>Baja</option>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="archivo" class="formulario__label">Archivo Relevante al Proyecto</label>
        <input type="file" id="archivo" name="archivo" accept=".doc,.docx,.pdf">
    </div>
</fieldset>