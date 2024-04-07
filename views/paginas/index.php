<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <h1 class="resumen__texto2">Bienvendio a la pagina oficial de</h1>
            <h1 class="resumen__texto2">Administración de Code Wizards</h1>
        </div>
    </div>

    <div class="contenedor__botones">
        <button <?php aos_animacion(); ?> class="button__resumen" id="proyectos">
            Proyectos
        </button>

        <button <?php aos_animacion(); ?> class="button__resumen2" id="tareas">
            Tareas
        </button>
    </div>
    
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botonProyectos = document.getElementById('proyectos');
        const botonTareas = document.getElementById('tareas');

        botonProyectos.addEventListener('click', function() {
            window.location.href = <?php echo is_auth() ? "'/proyectos'" : "'/proyectos'"; ?>;
        });

        botonTareas.addEventListener('click', function() {
            window.location.href = <?php echo is_auth() ? "'/tareas'" : "'/tareas'"; ?>;
        });
    });
</script>