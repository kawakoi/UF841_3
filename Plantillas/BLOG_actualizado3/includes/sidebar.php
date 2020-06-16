<!-- SIDE-BAR-->
<aside id="sidebar">
    <!-- Mostramos un div con el usuario logueado -->
    <?php 
    //Si existe $_SESSION['usuario'] ....
    if(isset($_SESSION['usuario'])):?>
    <div id="usuario-logueado" class="side-block">
        <h3>Logueado como <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']?>
        <!-- Enlace a logout.php para eliminar la 
        variable de sesion usuario -->
        <a href="new_categoria.php" class = "boton boton-marron">Crear Categoria</a>
        <a href="new_entrada.php" class = "boton boton-verde">Nueva Entrada</a>
        <a href="mi_perfil.php" class = "boton boton-rojo">Mi perfil</a>
    
        <a href="logout.php" class = "boton boton-rojo">Cerrar sesión</a>
    </div>
<?php else:?>
    
 

    <div id="login" class="side-block">
        <h3>Entrar</h3>
        <?php 
            if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login']?>
            </div>
        <?php
        endif;
        ?>
        <form action="login.php" method="POST">
            <label for="login-email">Email</label>
            <input type="email" name="email" id="login-email">

            <label for="login-password">Contraseña</label>
            <input type="text" name="password" id="login-password">

            <input type="submit" value="Entrar">
        </form>
    </div>

    <div id="register" class="side-block">
        <h3>Registrar</h3>

        <!-- Mostrar alerta registro usuario -->
        <?php
        //si existe la variable de session completado mostramos 
        //un div con la clase alerta-exito y el contenido de $_SESSION['completado]
        if (isset($_SESSION['completado'])) : ?>
        
          <div class='alerta alerta-exito'><?=$_SESSION['completado']?></div>
        <?php
        //Si existe la variable de sesion error general mostramos
        //un div con la classe alerta-error y el contenido de $_SESSION['error']['general']
        elseif(isset($_SESSION['errores']['general'])): ?>

            <div class='alerta alerta-error'><?=$_SESSION['errores']['general']?></div>

        <?php endif; ?>


        <form action="register.php" method="POST">
            <label for="register-nombre">Nombre</label>
            <input type="text" name="nombre" id="register-nombre" value=<?= isset($_GET['nombre'])?$_GET['nombre']:'' ?>>
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="register-apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="register-apellidos" value=<?= isset($_GET['apellidos'])?$_GET['apellidos']:'' ?>>
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="register-email">Email</label>
            <input type="email" name="email" id="register-email" value=<?= isset($_GET['email'])?$_GET['email']:'' ?>>
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'email') : ''; ?>

            <label for="register-password">Contraseña</label>
            <input type="password" name="password" id="register-password">
            <?= isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'password') : ''; ?>


            <input type="submit" value="Registrar">
        </form>
        

    </div>
    <?php
        //una vez mostrados los errores los borramos de la session
        borrarErrores();
        borrarCompletado();
        borrarErrorLogin();
    ?>
    <?php endif;?>
</aside> <!-- End SIDE-BAR-->