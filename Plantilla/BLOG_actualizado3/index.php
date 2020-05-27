<!-- incluimos la CABECERA -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/sidebar.php'); ?>

    <!-- Principal-->
    <section id="principal">
        <h1>Últimas entradas</h1>
        <?php 
        //recogemos las entradas de la BD con la funcion getEntradas
        //que tenemos definida en helper y las guardamos en $entradas
        $entradas = getEntradas($conn, true);
        //recorremos todos los registros guardados en $entradas y
        //Guardamos cada registro en $entrada como un array associativo
        //Si entradas no es false recorremos el array
        if($entradas):
            while($entrada = mysqli_fetch_assoc($entradas)):
            //insertamos losdatos que queremos en el html
           
        ?>
        <article class="entrada">
            <a href="entrada.php?id=<?=$entrada['id_entrada']?>">
                <h2><?= $entrada['titulo'] ?></h2>
                <?php //var_dump($entrada);
                $fechaConFormato = date("d/M/Y ", strtotime($entrada['fecha']));
                ?>
                    
                <span><?=$entrada['nombre'].' | '.$fechaConFormato ?></p></span>
 
            </a>
            <p>
               <?= $entrada['descripcion'];?>
            </p>
        </article>
      
        <?php
        //cerramos el bucle while
        endwhile;
        //si entradas es false significa que no hay registros
        //o que tenemos un error en la consulta.
        //En ese caso mostramos que no hay entradas
        else:
        ?>
            <article class="entrada">
                <h2>No hay entradas</h2>
            </article>
        <?php endif; ?>

        <!-- TODO 
            Boton ver todas las categorias
            -->
            <div id="ver-todas">
                <a href="entradas.php">Ver todas las entradas</a>
            </div>

    </section> <!-- End principal-->
  

<?php require_once('includes/footer.php'); ?>