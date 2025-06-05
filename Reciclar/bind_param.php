<?php
    require_once("connection_with_function_and_log.php");
    // Asumiendo que $pdo ya está instanciado correctamente
    $pdo = getPDO();
    $sql2 = "SELECT * FROM products WHERE price < :max_price";
    $stmt2 = $pdo->prepare($sql2);  // Se usa $sql2, no $sql

    // Variable $max, usando bindParam (se pasa por referencia)
    $max = 33;  // El valor final que se usará al hacer execute
    $stmt2->bindParam(':max_price', $max, PDO::PARAM_INT);

    $stmt2->execute();

    // Cambio posterior a execute() (no afecta esta ejecución, pero afectaría un execute posterior si reuso $stmt2)
    $max = 7;
?>
