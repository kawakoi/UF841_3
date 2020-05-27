<?php
require_once("redirect.php");
?>

<!-- incluimos la CABECERA -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<!-- Principal-->
<section id="principal">

    <h1>Crear una entrada</h1>
   <?= isset($_SESSION['error_consulta']) ? $_SESSION['error_consulta'] : ''; ?>

    <form action="save_entrada.php" method="POST">
        <label for="entrada-titulo">Título:</label>
        <input type="text" id="entrada-titulo" name="titulo">
        <?= isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        
        <label for="entrada-descripcion">Descripción:</label>
        <textarea name="descripcion" id="entrada-descripcion"></textarea>
        <?= isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        
        <label for="entrada-categoria"> Categoria </label>
        <select id="entrada-categoria" name="categoria">
            <?php $categorias = getCategorias($conn);
            while ($categoria = mysqli_fetch_assoc($categorias)) :    ?>

                <option value=<?= $categoria['id']?>><?= $categoria['nombre']?></option>

            <?php
            endwhile;
            ?>
        </select>
        <input type="submit" value="Guardar">
    </form> 
            <?php borrarErroresEntradas() ?>
</section> <!-- End principal-->
<?php require_once('includes/footer.php'); ?>