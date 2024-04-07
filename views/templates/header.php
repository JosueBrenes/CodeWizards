<header class="header">
    <div class="header__contenedor">

        <nav class="header__navegacion">

            <?php if(is_auth()) { ?>
                <a href="<?php echo is_admin() ? '/admin/dashboard' : '/'; ?>" class="header__enlace">Administrar</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php } else { ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesión</a>
            <?php } ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">
                    &#60; Code Wizards />
                </h1>
            </a>

            <p class="header__texto">Hecho por Josué Brenes</p>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">
                &#60;Code Wizards />
            </h2>
        </a>
        <nav class="navegacion">
            <a href="/proyectos" class="navegacion__enlace <?php echo pagina_actual('/proyectos') ? 'navegacion__enlace--actual' : ''; ?>">Proyectos</a>
            <a href="/tareas" class="navegacion__enlace <?php echo pagina_actual('/tareas') ? 'navegacion__enlace--actual' : ''; ?>">Tareas</a>
        </nav>
    </div>
</div>
