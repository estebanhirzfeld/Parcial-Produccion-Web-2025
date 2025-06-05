<?php
    require_once("connetion_with_function.php");
    $pdo = getPOD(); // Corrección del nombre de la función a getPOD (si esta es la que definiste)

    // Comentarios sobre procedimientos almacenados en MySQL
    // Tarea repetitiva tiende a ser destructiva
    // create procedure nombre() query; (forma general)
    // function -> denotacional :: Retorna un valor
    // create procedure mostrar() select * from personas;
    // call nombre(); (forma general)
    // call mostrar();

    try {
        $proc = $pdo->prepare("CALL mostrar()"); // CALL en mayúsculas por convención (no obligatorio)
        $result = $proc->execute();

        // Opcionalmente podrías recorrer los resultados si el procedimiento retorna un conjunto de datos
        $rows = $proc->fetchAll();
        foreach ($rows as $row) {
            print_r($row); // O procesar cada fila según necesites
        }
    } catch (PDOException $e) {
        echo "Error al ejecutar el procedimiento almacenado: " . $e->getMessage();
    }
?>
