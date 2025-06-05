<?php
    //Uso el requiere_once para que se cargue solo una vez, sin sobrecarga.
    require_once("credentials.php");

    //Defino una funcion para que la conexion quede encapsulada.
    // ADICIONAL: Quitar "public" ya que no es necesario fuera de una clase
    function getPOD(){
        try{
            // ADICIONAL: Incluir el puerto $port en el DSN para que sea compatible con configuraciones distintas
            $dsn = $motor . ":host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";charset=" . $charset;

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
            //false significa que solo usa sentencias preparadas nativas de SQL
            
            echo "¡Success connection!"; //Si fallo al instanciar a PDO, lanza una excepcion que se catchea
            // si no imprimo
            //Opcionalmente puedo hacer 
            return $pdo;
        } catch (PDOException $e) {
            //La ubicacion del archivo debe estar a la altura de este script o bien poner la ruta absoluta/relativa
            $file_log = "log.txt";
            //date en PHP de la forma Año-mes-dia hora-minutossegundo
            $log_message = "[" . date("Y-m-d H:i:s") . "] Error de conexión PDO: " . $e->getMessage() . " Código: " . $e->getCode() . PHP_EOL;
            //Escribir el log en el archivo log.txt con el mensaje log_message
            //El FILE_APPEND lo agrega al final del archivo log.txt
            file_put_contents($file_log, $log_message, FILE_APPEND);

            //Catchear una excepcion para lanzarla no tiene sentido
            // (int) castea el codigo de String a Int
            
            // ADICIONAL: En producción es preferible no mostrar el error al usuario final.
            // Se puede comentar el throw y usar die() con un mensaje genérico:
            // die("No se pudo conectar a la base de datos. Intente más tarde.");
            
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
?>
