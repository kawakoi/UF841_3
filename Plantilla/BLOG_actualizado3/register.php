<?php

//comprobar si nos llegan bien los datos por POST
if (isset($_POST)) {
    //conectar a la BD
    require_once('includes/conexion.php');

    //var_dump($_POST);
    $nombre = isset($_POST['nombre']) ? mysqli_escape_string($conn,$_POST['nombre']): false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_escape_string($conn, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_escape_string($conn, $_POST['password']) : false;
  
    //Creamos un array vacio para ir guardando los errores
    $errores = array();

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
    //VALIDAR PASSWORD
    if (empty($password) || (strlen($password) < 4)) {
        $errores['password'] = "La contrassenya es demasiado corta";
    }

    //var_dump($errores);
    //tratar los posibles errores
    if(count($errores) == 0){
        
        
        $password_seguro = password_hash($password, PASSWORD_BCRYPT);
        //var_dump($password);
        //echo "<br>";
        //var_dump($password_seguro);
        //die();
        //si $errores no contiene nada insertamos los datos en la BD
        $sql = "INSERT INTO usuarios
                VALUES(null, '$nombre', '$apellidos', '$email', '$password_seguro', CURDATE())";
        $guardar = mysqli_query($conn, $sql); 
      
       
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completato con éxito";
            //echo $_SESSION['completado'];
        }else{
            $errores['general'] = "Fallo al registrar el usuario";
            $_SESSION['errores'] = $errores;
            //echo $_SESSION['errores']['general'];
        }
        header('Location: index.php');
        
    }else{
        $_SESSION['errores'] = $errores;
        header("Location: index.php?nombre=$nombre&apellidos=$apellidos&email=$email");
    }

} else {
    echo "No llega nada por POST";
}



//Si no hay errores insertar el registro en la DB

//redireccionar a index.php
