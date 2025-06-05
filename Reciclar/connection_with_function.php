<?php
    //Uso el requiere_once para que se cargue solo una vez, sin sobrecarga.
    require_once("credentials.php");

    //Defino una funcion para que la conexion quede encapsulada.
    // ADICIONAL: Es preferible definir la función sin visibilidad (public) si no está en una clase
    // En PHP fuera de una clase, no se usa public/private/protected
    function getPOD() {
        try {
            // ADICIONAL: Incluir $port en el DSN si es distinto al default
            $dsn = "$motor:host=$host;dbname=$dbname;charset=$charset;port=$port";

            //Como las opciones son opcionales, se pueden settear luego.
            $pdo = new PDO($dsn, $username, $password);

            // Configurar los atributos después de inicializar:
            //Configura el modo en que PDO maneja los errores.
            //Cada vez que hay un error, se envia una PDOException
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Configura cómo PDO devuelve los resultados de las consultas.
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //Configura si PDO debe emular sentencias preparadas o usar las preparadas nativas del motor de base de datos.
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //Configura si PDO debe emular sentencias preparadas o usar las preparadas nativas del motor de base de datos.
            
            echo "¡Success connection!"; //Si fallo al instanciar a PDO, lanza una excepcion que se catchea
            // si no imprimo
            
            //Opcionalmente puedo hacer 
            return $pdo;
        } catch (PDOException $e) {
            //Catchear una excepcion para lanzarla no tiene sentido
            // (int) castea el codigo de String a Int

            // ADICIONAL: Se podría loguear el error con error_log()
            // error_log($e->getMessage());

            // ADICIONAL: Mostrar un mensaje genérico para producción
            // die("No se pudo conectar a la base de datos. Contacte al administrador.");

            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
?>
