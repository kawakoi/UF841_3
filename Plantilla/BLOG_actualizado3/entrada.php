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

    <h1><?= $entrada_sel['titulo'] ?></h1>
    <a href="categoria.php?id=<?= $entrada_sel['categoria_id'] ?>">
        <h2><?= $entrada_sel['categoria'] ?></h2>
    </a>
    <p><?= $entrada_sel['fecha'] ?></p>
    <p>Autor: <?= $entrada_sel['usuario'] ?></p>
        <p>
            <?= $entrada_sel['descripcion'] ?>
        </p>
<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_sel['usuario_id']):?>
        <a href="editar_entrada.php?id=<?=$entrada_sel['id']?>" class="boton">Editar entrada</a>
        <a href="borrar_entrada.php?id=<?=$entrada_sel['id']?>" class="boton">Eliminar entrada</a>
<?php endif;?>

        </section> <!-- End principal-->


<?php require_once('includes/footer.php'); ?>