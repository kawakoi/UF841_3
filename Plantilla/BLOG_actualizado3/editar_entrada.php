<!-- incluimos la CABECERA -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

<?php if (isset($_GET['id'])) {
    $entrada_sel = getEntrada($conn, $_GET['id']);

    if (!isset($entrada_sel['id'])) {
        header('location:index.php');
    }
} ?>
<!-- Principal-->
<section id="principal">

    <h1>Modifica la entrada <?= $entrada_sel['titulo']?></h1>
   <?= isset($_SESSION['error_consulta']) ? $_SESSION['error_consulta'] : ''; ?>

    <form action="save_entrada.php?editar=<?= $entrada_sel['id']?>" method="POST">
        <label for="entrada-titulo">Título:</label>
        <input type="text" id="entrada-titulo" name="titulo" value= "<?=$entrada_sel['titulo']?>">
        <?= isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>
        
        <label for="entrada-descripcion">Descripción:</label>
        <textarea name="descripcion" id="entrada-descripcion"><?=$entrada_sel['descripcion']?></textarea>
        <?= isset($_SESSION['errores_entrada']) ? mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        
        <label for="entrada-categoria"> Categoria </label>
        <select id="entrada-categoria" name="categoria">
            <?php $categorias = getCategorias($conn);
            while ($categoria = mysqli_fetch_assoc($categorias)) :    ?>

                <option value=<?= $categoria['id']?>
                    <?= ($categoria['id']==$entrada_sel['categoria_id']) ? 'selected': ''?> >
                    <?= $categoria['nombre']?>
                </option>

            <?php
            endwhile;
            ?>
        </select>
        <input type="submit" value="Guardar">
    </form> 
            <?php borrarErroresEntradas() ?>
</section> <!-- End principal-->


<?php require_once('includes/footer.php'); ?>