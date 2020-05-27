<?php
require_once("redirect.php");
?>

<!-- incluimos la CABECERA -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<!-- Principal-->
<section id="principal">
<?php if(isset($_SESSION['errores_categoria'])):?>
    <div class='alerta alerta-error'>
        <?=$_SESSION['errores_categoria']
        ?>
    </div>
<?php endif;?>

<?php if(isset($_SESSION['error_consulta'])):?>
    <div class='alerta alerta-error'>
        <?=$_SESSION['error_consulta']?>
    </div>
<?php endif;?>

<form method="POST" action = "save_categoria.php">
<label for = "nombre">Nombre de la categopria: </label>
    <input type="text" name="nombre" id="nombre">
    <input type="submit" value="Guardar">
</form>   
<?php borrarErroresCategorias();?>
</section> <!-- End principal-->
<?php require_once('includes/footer.php'); ?>