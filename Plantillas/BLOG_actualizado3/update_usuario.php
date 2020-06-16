<?php
if (isset($_POST)) {
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    //Recogemos los valores del formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : false;

    //Array errores
    $errores = array();

    //Validar los datos del formulario antes de guardarlos en la BD
    //Validar los datos
    //Validar nombre
    if (empty($nombre) || preg_match("/[0-9]/", $nombre)) {
        $errores['nombre'] = "El nombre no es valido";
    }
    //vALIDAR APELLIDOS
    if (empty($apellidos) || preg_match("/[0-9]/", $apellidos)) {
        $errores['apellidos'] = "los apellidos no són válidos";
    }
    //VALIDAR EMAIL
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El email no es valido";
    }

    if (count($errores) == 0) {
        //EL formulario està validado podemos actualizar los datos del usuario
        $usuario = $_SESSION['usuario'];

        $sql = "UPDATE usuarios SET ".
            "nombre = '$nombre', ".
            "apellidos = '$apellidos', ".
            "email = '$email' ".
            "WHERE id = ".$usuario['id'];
           
        $guardar = mysqli_query($conn,$sql);
        
        if($guardar){
           
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellidos;
            $_SESSION['usuario']['email'] = $email;

            $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
        }
        

    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: mi_perfil.php');
