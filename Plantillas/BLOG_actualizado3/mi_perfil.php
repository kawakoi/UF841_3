<?php
require_once("redirect.php");
?>

<!-- incluimos la CABECERA -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<!-- Principal-->
<section id="principal">
<h1>Mis datos</h1>
<!--Enseñar si ha ido bien la actualizazxion o no -->

        <!-- Mostrar alerta registro usuario -->
        <?php
        //si existe la variable de session completado mostramos 
        //un div con la classe alerta-exito y el contenido de $_SESSION['completado]
        if (isset($_SESSION['completado'])) : ?>
        
          <div class='alerta alerta-exito'><?=$_SESSION['completado']?></div>
        <?php
        //Si existe la variable de session errror general mostramos
        //un div con la classe alerta-error y el contenido de $_SESSION['error']['general']
        elseif(isset($_SESSION['errores']['general'])): ?>

            <div class='alerta alerta-error'><?=$_SESSION['errores']['general']?></div>

        <?php endif; ?>



<form action="update_usuario.php" method="POST">
            <label for="update-nombre">Nombre</label>
            <input type="text" name="nombre" id="update-nombre" value="<?=$_SESSION['usuario']['nombre']?>">
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="update-apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="update-apellidos" value="<?=$_SESSION['usuario']['apellidos']?>">
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="update-email">Email</label>
            <input type="email" name="email" id="update-email" value="<?=$_SESSION['usuario']['email']?>">
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'email') : ''; ?>

            <input type="submit" value="Actualizar">
</form>
<?php borrarErrores();
borrarCompletado()?>
</section> <!-- End principal-->
<?php require_once('includes/footer.php'); ?>