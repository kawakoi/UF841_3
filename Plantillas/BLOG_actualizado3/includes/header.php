<?php
require_once('includes/conexion.php');//incluimos el archivo que contiene la conexion a la BD
require_once('helpers.php');//incluimos el archivo helpers para tener disponibles todas vuestras funciones
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <title>Blog Time</title>
    <link rel='stylesheet' type='text/css' href='assets/css/style.css'>
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <div id="logo">
            <a href="index.php">
                Blog de videojuegos
            </a>
        </div>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
               <?php
               $categorias = getCategorias($conn);
               //var_dump($categorias);
                if($categorias):
                   while($categoria = mysqli_fetch_assoc($categorias)):
                  // var_dump($categoria);?>
                        <li>
                            <a href="categoria.php?id=<?=$categoria['id'] ?>">
                                <?= $categoria['nombre'];?>
                            </a>
                        </li>
                <?php endwhile;
                      endif;
                ?>
                <li>
                    <a href="sobre_mi.php">Sobre Mi</a>
                </li>
                <li>
                    <a href="contacto.php">Contacto</a>
                </li>
            </ul>
            <!--End MENU -->
    </header><!-- End HEADER-->
    <!-- CONTAINER -->
<main id="container">

   