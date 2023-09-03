<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album de Fotos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ruta; ?>css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $ruta; ?>">ALBUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">                
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $ruta; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/photos.php">Fotos</a>
                    </li>
                    <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? '' : 'quitar' ?>">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/add_album.php">Mis Albums</a>
                    </li>
                    <!-- <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? '' : 'quitar' ?>">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/add_photo.php">Mis fotos</a>
                    </li> -->
                </ul>
                <ul class="d-flex navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/registers.php">Visitantes</a>
                    </li>
                    <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? '' : 'quitar' ?>">
                        <span class="nav-link">Hola <?php echo isset($_SESSION['login']['nombre']) ? $_SESSION['login']['nombre'] : ''; ?>!</span>
                    </li>
                    <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? 'quitar' : '' ?>">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? 'quitar' : '' ?>">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/register.php">Registrarse</a>
                    </li>
                    <li class="nav-item <?php echo isset($_SESSION['login']['nombre']) ? '' : 'quitar' ?>">
                        <a class="nav-link" href="<?php echo $ruta; ?>pages/logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    