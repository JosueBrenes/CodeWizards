<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>    
        </a>

        <a href="/admin/proyectos" class="dashboard__enlace <?php echo pagina_actual('/proyectos') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-folder dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Proyectos
            </span>    
        </a>

        <a href="/admin/tareas" class="dashboard__enlace <?php echo pagina_actual('/tareas') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-check dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Tareas
            </span>    
        </a>

        
    </nav>
</aside>