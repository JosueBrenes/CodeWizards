<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <h1 class="resumen__texto2">Bienvendio a la pagina oficial de</h1>
            <h1 class="resumen__texto2">Administración de Code Wizards</h1>
            <h2 class="resumen__texto">En esta página podras administrar los proyectos y tareas de la empresa</h2>
        </div>
    </div>

    <div class="contenedor__botones">
        <button <?php aos_animacion(); ?> class="button__resumen" id="iniciar-sesion">
            Iniciar sesión
        </button>

        <button <?php aos_animacion(); ?> class="button__resumen2" id="registrarse">
            Registrarse
        </button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botonIniciarSesion = document.getElementById('iniciar-sesion');
        const botonRegistrarse = document.getElementById('registrarse');

        botonIniciarSesion.addEventListener('click', function() {
            window.location.href = <?php echo is_auth() ? (is_admin() ? "'/admin/dashboard'" : "'/'") : "'/login'"; ?>;
        });

        botonRegistrarse.addEventListener('click', function() {
            window.location.href = <?php echo is_auth() ? "'/registro'" : "'/registro'"; ?>;
        });
    });
</script>