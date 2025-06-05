<?php
    // Asegúrate que el archivo requerido tenga el nombre correcto
    require_once("connection_with_function.php"); // Corregí "connetion" a "connection"
    
    // Obtener la conexión PDO usando la función definida en connection_with_function.php
    $pdo = getPDO(); // Verifica que la función se llame exactamente así

    // Para consultas que no devuelven resultados (INSERT, UPDATE, DELETE)
    // se recomienda usar exec() que retorna el número de filas afectadas.
    // Es más eficiente cuando no necesitas resultados devueltos.

    // Eliminar usuarios inactivos
    $affected_rows = $pdo->exec("DELETE FROM users WHERE active = 0");
    echo "$affected_rows deleted rows.<br>";

    // Insertar un nuevo usuario (nombre y email)
    $sql0 = "INSERT INTO users (name, email) VALUES ('Laura', 'ana@mail.com')";
    $affected_rows = $pdo->exec($sql0);
    echo "Inserted: $affected_rows rows.<br>";

    // Actualizar el campo 'activo' (activo = 1) para el usuario con id = 5
    $sql1 = "UPDATE users SET activo = 1 WHERE id = 5";
    $filaAfectadas = $pdo->exec($sql1);
    echo "Updated: $filaAfectadas filas.<br>";

    // Eliminar usuario con nombre 'Carlos'
    $sql2 = "DELETE FROM users WHERE name = 'Carlos'";
    $affected_rows = $pdo->exec($sql2);
    echo "Deleted: $affected_rows rows.<br>";

    // Nota importante:
    // Nunca uses valores literales directamente en las consultas con datos externos o de usuario,
    // siempre usa consultas preparadas (prepare() + execute()) para evitar inyección SQL.
?>
