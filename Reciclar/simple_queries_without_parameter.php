<?php
    // Cargo el contenido de este módulo al actual
    require_once("connection_with_function.php");
    
    // Llamo a la función que encapsula la conexión y la retorna. La guardo en la variable $pdo
    // Que las variables en ambos módulos se llamen igual es anecdótico: no es necesario que coincidan los nombres
    // Son variables que solo tienen alcance local
    $pdo = getPDO(); // <- Asegúrate de que esta función existe y se llama así, o usa getPDO()

    // Una string que representa, con la sintaxis correcta
    // La tabla debe estar elegida anteriormente
    $sql0 = "SELECT id, name FROM users";
    try {
        // Ejecutar una query sin parámetros
        $result0 = $pdo->query($sql0);
        foreach ($result0 as $row) {
            // Corrijo clave del array asociativo: debe coincidir con el nombre de columna real (name, no nombre)
            echo "ID: " . $row['id'] . ", Nombre: " . $row['name'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en query SELECT users: " . $e->getMessage();
    }

    $sql1 = "SELECT id, email FROM clients";
    try {
        $result1 = $pdo->query($sql1);
        $clients = $result1->fetchAll(PDO::FETCH_ASSOC); // <- Corregí variable a $clients
        foreach ($clients as $client) { // <- Cambié $cliente a $client
            echo "Client: " . $client['email'] . "<br>"; // <- Cambié $cliente['email'] a $client['email']
        }
    } catch (PDOException $e) {
        echo "Error en query SELECT clients: " . $e->getMessage();
    }

    $sql2 = "SELECT product, price FROM products";
    try {
        $result2 = $pdo->query($sql2);
        while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
            echo "Product: " . $row['product'] . " - Price: $" . $row['price'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en query SELECT products: " . $e->getMessage();
    }

    // Solo hacer esto cuando estás segurx de los argumentos. No recomendado con datos de usuarios
    $sql3 = "INSERT INTO categories (name) VALUES ('Electronic')";
    try {
        $pdo->query($sql3);
    } catch (PDOException $e) {
        echo "Error en INSERT categories: " . $e->getMessage();
    }

    $sql4 = "SELECT * FROM products ORDER BY price DESC LIMIT 5"; // <- Corregí precio a price
    try {
        $stmt = $pdo->query($sql4);
        foreach ($stmt as $product) {
            echo $product['name'] . " - $" . $product['price'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en query SELECT products (top 5): " . $e->getMessage();
    }

    $sql5 = "UPDATE users SET active = 0 WHERE down_date IS NOT NULL";
    try {
        $affected_rows = $pdo->query($sql5)->rowCount();
        echo "$affected_rows offline users.<br>";
    } catch (PDOException $e) {
        echo "Error en UPDATE users: " . $e->getMessage();
    }

    $sql6 = "DELETE FROM sessions WHERE expira < NOW()";
    try {
        $deleted_count = $pdo->query($sql6)->rowCount();
        echo "$deleted_count sessions deleted.<br>";
    } catch (PDOException $e) {
        echo "Error en DELETE sessions: " . $e->getMessage();
    }

    // También podemos hacer consultas directamente sin guardar resultados parciales
    try {
        $users = $pdo->query("SELECT name, email FROM users")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            echo $user['name'] . " - " . $user['email'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en SELECT users directo: " . $e->getMessage();
    }

    // La conexión puede fallar o la query puede estar mal escrita; se debe ejecutar en try/catch
    try {
        $stmt = $pdo->query("SELECT * FROM orders"); // <- Corregí order a orders
        while ($row = $stmt->fetch()) {
            echo "Order ID: " . $row['id'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en SELECT orders: " . $e->getMessage();
    }

    // SELECT con bucle foreach
    $sql7 = "SELECT id, name FROM users";
    try {
        foreach ($pdo->query($sql7) as $row) {
            echo $row['id'] . " - " . $row['name'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en SELECT users (foreach): " . $e->getMessage();
    }

    $sql8 = "SELECT * FROM products";
    try {
        $result8 = $pdo->query($sql8);
        while ($row = $result8->fetch(PDO::FETCH_ASSOC)) { // <- Corregí $result a $result8
            echo "Product: " . $row['name'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error en SELECT products: " . $e->getMessage();
    }

    // NOTA: Siempre usa prepare() y execute() cuando hay datos dinámicos de usuario.
?>
