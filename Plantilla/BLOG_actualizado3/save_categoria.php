<?php
if(isset($_POST)){
    //conectamos a la base de datos
    require_once("includes/conexion.php");

    $nombre = isset($_POST['nombre']) ? mysqli_escape_string($conn,trim($_POST['nombre'])) : false;
    
    $error = false;

    if(empty($nombre)){
        $error = "El nombre no puede no puede estar en blanco";
    }

    if(!$error){
        //insertamos la nueva categoria y volvemos a index.php
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $guardar = mysqli_query($conn, $sql);
       
        if(!$guardar){
            $_SESSION['error_consulta'] = 'Ha ofcurrido un error en la consulta';
            header("Location:new_categoria.php");
        }else{
            header("Location: index.php");
        }

    }else{
        $_SESSION['errores_categoria'] = $error;
        header("Location:new_categoria.php");
    }
}