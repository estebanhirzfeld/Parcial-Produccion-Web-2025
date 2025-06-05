<?php
    require_once("credentials.php");

    try {
        // ADICIONAL: Mejor usar el dsn completo con las variables cargadas de credentials.php
        $dsn = "$motor:host=$host;dbname=$dbname;charset=$charset;port=$port";

        $options = [
            // Lanza excepciones en caso de error
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       
            // Devuelve los resultados como array asociativo
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  
            // Desactiva la emulación de prepares (usa prepares reales)
            PDO::ATTR_EMULATE_PREPARES => false,               
        ];

        $pdo = new PDO($dsn, $username, $password, $options);

        echo "¡Success connection!";

    } catch (PDOException $e) {
        //Catchear una excepcion para lanzarla no tiene sentido
        // (int) castea el codigo de String a Int
        //Deseablemente quisieramos no imprimir o lanzar la excepcion que catcheamos
        //si no, por ej, registrar este error con un log para identificar un caso de 
        //fuerza bruta.

        // ADICIONAL: Se podría usar error_log() para registrar el error en un archivo
        // error_log($e->getMessage());

        // ADICIONAL: También se puede mostrar un mensaje genérico para producción
        // die("No se pudo conectar a la base de datos. Contacte al administrador.");
        
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>
