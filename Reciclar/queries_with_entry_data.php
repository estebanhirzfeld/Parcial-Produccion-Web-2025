<?php
    // Asegúrate que el archivo requerido tenga el nombre correcto
    require_once("connection_with_function.php"); // Corregí "connetion" a "connection"    
    // Obtener la conexión PDO usando la función definida en connection_with_function.php
    $pdo = getPDO(); // Verifica que la función se llame exactamente así
    //Tanto la conexion como las consultas deberias o contar con manejo de errores globales de forma productiva
    //o bien en el concepto de un try catch
    // Asumiendo que $pdo ya está creado y conectado antes

    // Datos de entrada por método POST
    // algo ?? otra cosa, si algo es distinto de null retorna eso sino otra cosa
    $user = $_POST['user'] ?? '';      // Evitar undefined index con operador null coalescing
    $pass = $_POST['password'] ?? '';

    // Preparar sentencia con placeholders nombrados para evitar inyección SQL
    $sql = "SELECT * FROM users WHERE user = :user AND password = :pass";
    $stmt = $pdo->prepare($sql);

    // NOTA: En execute, las claves del array deben coincidir con los placeholders (:user y :pass)
    // En tu código usaste 'usuario' y 'clave', que no coinciden con los placeholders.
    // Además, la variable $usuario y $clave no están definidas.
    // Por eso las corrijo a $user y $pass y con claves correctas:

    $stmt->execute(['user' => $user, 'pass' => $pass]);

    // Recorrer resultados
    foreach ($stmt as $row) {
        echo "Usuario encontrado: " . htmlspecialchars($row['user']) . "<br>";
    }
?>
