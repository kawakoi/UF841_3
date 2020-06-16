<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_time';

//conexion con la BD
$conn = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno($conn)) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
}else{
    echo "La conexión con la base de datos se ha realizado correctamente.<br>";

}

mysqli_query($conn, "SET NAMES 'utf8'");

//inicio las sessiones
if(!isset($_SESSION)){
    session_start(); 
}

if(isset($_SESSION)){

    var_dump($_SESSION);
} 