<?php
    // Asegúrate que el archivo requerido tenga el nombre correcto
    require_once("connection_with_function.php"); // Corregí "connetion" a "connection"    
    // Obtener la conexión PDO usando la función definida en connection_with_function.php
    $pdo = getPDO(); // Verifica que la función se llame exactamente así
    //Tanto la conexion como las consultas deberias o contar con manejo de errores globales de forma productiva
    //o bien en el concepto de un try catch
    // Insert con placeholders posicionales (?), los valores se pasan en orden
    $sql0 = "INSERT INTO users (name, email) VALUES (?, ?)";
    // Corregí $sql a $sql0, ya que estabas usando $sql que no estaba definido
    $stmt0 = $pdo->prepare($sql0);
    // Ejecutamos pasando los valores en el orden que corresponden a los ?
    $stmt0->execute(['Juan', 'juan@mail.com']);


    // Update con placeholders nombrados (symbols), pasamos un array asociativo
    $sql1 = "UPDATE users SET email = :email WHERE id = :id";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute(['email' => 'nuevo@mail.com', 'id' => 1]);


    // Uso de bindParam() para pasar variables por referencia (útil si la variable cambia antes del execute)
    $sql2 = "SELECT * FROM products WHERE price < :max_price";
    // Corregí $sql a $sql2
    $stmt2 = $pdo->prepare($sql2);
    $max = 100;
    // bindParam requiere que se pase una variable (por referencia)
    $stmt2->bindParam(':max_price', $max, PDO::PARAM_INT);
    // Podemos cambiar el valor antes de ejecutar y se usará el último valor
    $max = 80;
    $stmt2->execute();

    // Uso de bindValue() para pasar un valor fijo, no por referencia
    $stmt3 = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    // bindValue acepta valor directamente (no variable)
    $stmt3->bindValue(':id', 3, PDO::PARAM_INT);
    $stmt3->execute();
?>
