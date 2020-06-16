<?php
if(isset($_POST)){
    //conectamos a la BD
    require_once("includes/conexion.php");
    $titulo = isset($_POST['titulo']) ? mysqli_escape_string($conn,$_POST['titulo']):false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_escape_string($conn,$_POST['descripcion']):false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria']:false;
    $usuario = (int)$_SESSION['usuario']['id'];
    //Validacion de los datos
    $errores = array();

    if(empty($titulo)){
        $errores['titulo'] = "El titulo està vacio";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "La descripcion no puede estar vacia";
    }

    if(empty($categoria) || !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no és válida";
    }

    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria ".
            "WHERE id=$entrada_id AND usuario_id=$usuario_id";
        }else{
        $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria,'$titulo','$descripcion', CURDATE()) ";
        }

        $guardar = mysqli_query($conn, $sql);
        //echo mysqli_error($conn);
        //die();
        if(!$guardar){
            $_SESSION['error_consulta'] = 'Ha ofcurrido un error en la consulta';
            header("Location:new_entrada.php");
        }else{
            header("Location: index.php");
        }

    }else{
        $_SESSION['errores_entrada'] = $errores;
        header("Location:new_entrada.php");
    }

}
