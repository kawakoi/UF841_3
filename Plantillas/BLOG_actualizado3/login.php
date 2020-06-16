<?php
//1-Comprobar que recibimos los datos del formulario
//2-conectar con la base de datos
//3-Validar los campos y manejar errores de validacion(opcional)
//4-Consultar si existe el usuario en la tabla usuarios
//5-Si existe comprobar si el password es coincide
//6-Si todo ok creo una variable session con los datos del usuario
//7-Sino creo una variable de session para guardar los errores
//8-Redireccionamos al Index

//1-Comprobar que recibimos los datos del formulario
if(isset($_POST)){
     //2-conectar con la base de datos
     require_once("includes/conexion.php");

    $email = isset($_POST['email']) ? mysqli_escape_string($conn,trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_escape_string($conn,$_POST['password']) : false;
    
   
    //4-Consultar si existe el usuario en la tabla usuarios
    //consulta para comprobar las credenciales
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($conn, $sql);
    
    //var_dump(mysqli_error($conn));
    //die();
    
    //5-Si existe comprobar si el password es coincide
    //si encruentra una concidencia y devuelve un solo registro, ojo que 
    //el campo email debe ser un UNIQUE ya que no debe existir dos usuarios 
    //con el mismo email
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        //TODO encriptar el password en registro.php
        
        $verificar = password_verify($password,$usuario['pass']);
        
        if($verificar){
            //6-Si todo ok creo una variable session con los datos del usuario
            //si el password coincide guardamos los datos del 
            //usuario en una variable de session
            $_SESSION['usuario'] = $usuario;
        }else{
            //7-Sino creo una variable de session para guardar los errores
            $_SESSION['error_login'] = 'Password es incorrecto';

        }
        
    }else{
        //el usuario no esta registrado
        $_SESSION['error_login'] = 'Ususario incorrecto';
    }
}
//8-Redireccionamos al Index
header("Location: index.php");
