<?php
require_once("DAOInterface.php");

// Clase abstracta que implementa la interfaz DAOInterface
// Sirve para definir métodos comunes que todas las DAOs deben tener
// Si no necesitás comportamiento común, podés implementar directamente la interfaz en cada DAO
abstract class DAO implements DAOInterface {
    
    //Mensaje para guardar una entidad (create o update)
    public abstract function create($entity);
    
    //Mensaje para traer todas las entidades
    public abstract function findAll();
    
    //Mensaje para buscar una entidad por su ID
    public abstract function findById($id);
    
    //Mensaje para actualizar una entidad identificada por $id con datos en $options
    public abstract function update($id, $options);
    
    //Mensaje para eliminar una entidad por su ID
    public abstract function delete($id);
}
?>
