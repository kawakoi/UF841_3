<?php
//Aqui declararemos algunas funciones que nos van a ayudar a mantener
//organizado nuestro codigo, intentando separar la logica de la aplicación
//de las vistas (los archivos donde enseñamos el contenido al usuario)


//Muestra un div con el mensaje de error que hayamos guardado
//en la variable de session errores
function mostrarErrores($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
         $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}


//funcion que encarga de eliminar 
//las variables de session cuando ya no las necesitemos
function borrarErrores(){

    if(isset($_SESSION['errores'])){
        unset($_SESSION['errores']);
       return true;
    }else{
        return false;
    }

}

function borrarCompletado(){
    if(isset($_SESSION['completado'])){
        unset($_SESSION['completado']);
       return true;
    } else{
        return false;
    }
}

function borrarErrorLogin(){
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
       return true;
    } else{
        return false;
    }
}

function borrarErroresCategorias(){
    $borrado = false;
    if(isset($_SESSION['errores_categoria'])){
        unset($_SESSION['errores_categoria']);
        $borrado=true;
    }
    if(isset($_SESSION['error_consulta'])){
        unset($_SESSION['error_consulta']);
        $borrado =true;
    }
    
    return $borrado;
}

function borrarErroresEntradas(){
    $borrado = false;
    if(isset($_SESSION['errores_entrada'])){
        unset($_SESSION['errores_entrada']);
        $borrado=true;
    }
    if(isset($_SESSION['error_consulta'])){
        unset($_SESSION['error_consulta']);
        $borrado =true;
    }
    
    return $borrado;
}

function getCategorias($conexion){
    $sql = "SELECT * FROM categorias";
    
    $categorias = mysqli_query($conexion, $sql);

    return $categorias;
}

function getCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id=$id";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = false;
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = mysqli_fetch_assoc($categorias);
        
    }

    return $resultado;
}


function getEntradas($conexion, $limit = false, $categoria = null){
    $sql = "SELECT *,entradas.id AS id_entrada FROM entradas INNER JOIN categorias ".
            "ON entradas.categoria_id = categorias.id ";
    
    if(isset($categoria)){
        $sql .= "WHERE entradas.categoria_id  = $categoria ";
    }

    $sql .= "ORDER BY entradas.id DESC ";

    if($limit){
        $sql .= "LIMIT 4";
    }
    //echo $sql;
    //die();
    $entradas = mysqli_query($conexion, $sql);
    //si se produce un error en la consulta
    //$result es false, si no hay registros
    //forzamos que la función también devuelva false
    $result = false;

    if($entradas && mysqli_num_rows($entradas) >= 1){
        //si la consulta se ha realizado con éxito
        //y hay almenos un registro assignamos el valor de $entradas
        //a $result
        $result = $entradas; 
    }
    
    return $result;
    
}

function getEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', ".
            "CONCAT(u.nombre, ' ',u.apellidos) AS 'usuario' ".
             "FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
             "INNER JOIN usuarios u ON e.usuario_id = u.id ".
             "WHERE e.id = $id";
   // echo $sql;
    //die();
    $entrada = mysqli_query($conexion, $sql);

    $resultado = false;
    if($entrada && mysqli_num_rows($entrada) >=1 ){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;

}
