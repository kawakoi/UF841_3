<?php
/*
1) mostrar información del login:
    -ha fallado :1-usuario no existe
                 2-la contrasseña es incorrecta
    (lo mostramos debajo de login)              

    - ha ido bién. Creamos un bloque en sidebar
    con alun mensaje sobre el usuario y ocultar
    el login y el register_shutdown_function
    
1.1) crear un boton(enlace) que permita cerrar session: 
Tenemos que crear cerrar_session.php

2) Encriptar el password en el registro 
antes de insertarlo en la BD.

3)Llenar la BD desde phpmyadmin
 con alunas entradas, categorias y
usuarios para hacer pruebas.

4) Crear la funcion getCategorias() en helpers
y usarla para mostrar de forma dinamica las getCategorias

5)Lo mismo con las entradas