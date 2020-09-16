<?php
if (isset($_SESSION['usuario']) == true) {
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?modulo=inicio&accion=ver">Inicio</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contenido 1
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link" href="?modulo=persona&accion=ver">Personas</a>
                    <a class="nav-link" href="?modulo=producto&accion=ver">Producto</a>
                    <a class="nav-link" href="?modulo=proveedores&accion=ver">Proveedores</a>
                    <a class="nav-link" href="?modulo=contenido&accion=ver">Editor de contenido</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contenido 2
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link" href="?modulo=ingreso&accion=ver">Ingreso</a>
                    <a class="nav-link" href="?modulo=entrega&accion=ver">Entrega</a>
                    <a class="nav-link" href="?modulo=cargo&accion=ver">Cargo</a>
                    <a class="nav-link" href="?modulo=permiso&accion=ver">Permiso</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contenido 3
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link" href="?modulo=sexo&accion=ver">Sexo</a>
                    <a class="nav-link" href="?modulo=estado_civil&accion=ver">Estado civil</a>
                    <a class="nav-link" href="?modulo=tipo_producto&accion=ver">Tipo producto</a>
                    <a class="nav-link" href="?modulo=tipo_identidad&accion=ver">Tipo identidad</a>
                    <a class="nav-link" href="?modulo=zona_de_residencia&accion=ver">Zona de residencia</a>
                    <a class="nav-link" href="?modulo=departamento&accion=ver">Departamento</a>
                    <a class="nav-link" href="?modulo=municipio&accion=ver">Municipio</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Permisos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="nav-link" href="?modulo=rol&accion=ver">Rol</a>
                    <a class="nav-link" href="?modulo=permiso_rol&accion=ver">Permiso Rol</a>
                    <a class="nav-link" href="?modulo=persona_rol&accion=ver">Persona Rol</a>
                    <a class="nav-link" href="?modulo=modulo_accion&accion=ver">Modulo Accion</a>


                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quiénes Somos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                    <a class="nav-link" href="?modulo=vision&accion=ver">Visión</a>
                    <a class="nav-link" href="?modulo=mision&accion=ver"> Misión</a>
                    <a class="nav-link" href="?modulo=objetivos&accion=ver">Objetivos</a>
                    <a class="nav-link" href="?modulo=resena&accion=ver">Reseña Histórica</a>



                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?modulo=cerrar-sesion&accion=cerrar">Cerrar sesión</a>
            </li>


        <?php } ?>
        <?php
        if (isset($_SESSION['usuario']) == false) {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="?modulo=iniciar-sesion&accion=ver">Iniciar sesión</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="?modulo=datos_personales&accion=ver">
                <?php
                if (isset($_SESSION['nombre_usuario'])) {
                    echo $_SESSION['nombre_usuario'];
                }
                ?>
            </a>
        </li>
        </ul>
    </nav>