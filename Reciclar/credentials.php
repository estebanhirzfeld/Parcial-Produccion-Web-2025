<?php
    //Cambiar el nombre al nombre de usuario que tengan en su motor de base de datos
    $username = 'root';
    //cambiar nombre a la base de datos que utilicen
    $dbname = 'ejemplo';
    //Cambiar password segun su configuracion
    $password = '';
    //Dependiendo el motor que utilicen. 3306 es el puerto x defecto de MySQL
    $port = '3306';
    //Es el conjunto de caracteres 
    // utf: Es el conjunto más común en aplicaciones web, permite representar cualquier 
    //carácter Unicode, como letras, números, símbolos, etc.
    // mb4: Es una extensión de utf8 que permite almacenar caracteres de 4 bytes
    //como x ej. emojis, algunos símbolos especiales y caracteres de otros idiomas
    //Este es el mas general
    $charset = 'utf8mb4';
    //Recuerden que PDO solo funciona con PDO asi que motor solo puede ser MySQL, mariaDB, posgres, etc
    $motor = 'mysql';

    //ADICIONAL: Se podría definir el host del servidor de base de datos
    $host = 'localhost'; // Cambiar si el servidor está en otra máquina o usa un contenedor Docker

    //ADICIONAL: Asegurarse de proteger este archivo, por ejemplo, colocándolo fuera del directorio público
    //o denegando el acceso directo con reglas .htaccess o del servidor web. Pero este no es un problema
    //que debamos considerar ahora sino en ambientes productivos.

    //ADICIONAL: También se podría cargar estas credenciales desde variables de entorno o un archivo .env
    //para mayor seguridad en proyectos más grandes o cuando se use con frameworks como Laravel

    //ADICIONAL: Si se quiere exportar todo en un array o constante, se puede preparar para incluirlo fácilmente
    /*
    return [
        'host' => $host,
        'port' => $port,
        'dbname' => $dbname,
        'username' => $username,
        'password' => $password,
        'charset' => $charset,
        'motor' => $motor,
    ];
    */
?>
