<style>
    .navbar-light .navbar-toggler {
        color: white;
        border-color: rgba(0, 0, 0, .1);
    }

    .navbar-toggler {
        padding: .25rem .75rem;
        font-size: 0.98rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: box-shadow .15s ease-in-out;
    }
    .btn{
        margin-left: 5px;
    }
</style>

<nav class="navbar navbar-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" style="color:#649FA5" href="/proyecto-perros/php/vistas/page_principal">
            <img src="/proyecto-perros/recursos/logo.png" alt="Logo" width="40" height="40">
            Bromatologia | Municipalidad de Saladillo
        </a>
        <div class="d-flex">
            <?php if ($_SESSION["Rol"] == 1): ?>
                <div class="dropdown me-2">
                    <div class="d-flex">
                    <button class="btn btn-white border me-2" style='color: #649fa5' type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-plus"></i>
                    </button>
                    <?php if ($_SESSION["Rol"] == 1): ?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <?php if ($carpeta_actual === "page_principal"): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPerro">Nuevo perro</button>
                                </li>
                            <?php endif; ?>
                            <?php if (
                                $carpeta_actual === "page_propietarios" or
                                $carpeta_actual === "page_principal"
                            ): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPropietario">Nuevo propietario</button>
                                </li>
                            <?php endif; ?>
                            <?php if ($carpeta_actual === "page_usuarios"): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarUsuario">Nuevo usuario</button>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
                </div>
                        <?php if ($_SESSION["Rol"] == 1): ?>
                                <?php if ($carpeta_actual !== "page_principal"): ?>
                                    <a class='btn btn-white border' title="Usuarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_principal">
                                        <i class="fas fa-home"></i> 
                                    </a>
                                <?php endif; ?>
                                <?php if ($carpeta_actual !== "page_usuarios"): ?>
                                    <a class="btn btn-white border" title="Usuarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_usuarios">
                                        <i class="fas fa-users"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($carpeta_actual !== "page_propietarios"): ?>
                                    <a class='btn btn-white border' title="Propietarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_propietarios">
                                        <i class="fas fa-id-card"></i>
                                    </a>
                                <?php endif; ?>
                        <?php endif; ?>
                            <a class="btn btn-white border" title="Cerrar sesion" style="color: #649fa5" href="/proyecto-perros/php/conexion/page_principal/cerrar_sesion.php">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
        </div>
    </div>
</nav>
