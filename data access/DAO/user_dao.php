<?php
require_once("../Reciclar/connection_with_function.php");
require_once("DAO.php"); 
// No es necesario requerir DAOInterface si ya requerís DAO que la implementa
//require_once("DAOInterface.php");
class UserMySQLDAO extends DAO { // Podría ser "implements DAOInterface" si no usás la clase abstracta
    private $pdo;

    public function __construct(){
        $this->pdo = getPDO();
    }

    // Asocia entidad User con tecnología MySQL (PDO)
    public function create($entity){
        try {
            $sql = "INSERT INTO users (id, name, email) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $entity->getId(), 
                $entity->getName(), 
                $entity->getEmail()
            ]);
        } catch(PDOException $ex) {
            // Aquí podés registrar el error en un log o manejar la excepción
            // Por ejemplo: error_log($ex->getMessage());
            // Podrías volver a lanzar la excepción si querés que el llamado la maneje
            // throw $ex;
        }
    }

    public function findAll(){
        // Implementar
    }

    public function findById($id){
        // Implementar
    }

    public function update($id, $options){
        // Implementar
    }

    public function delete($id){
        // Implementar
    }
}

// Ejemplo de uso:
// $dao = new UserMySQLDAO();
// echo $dao->findAll();
?>
