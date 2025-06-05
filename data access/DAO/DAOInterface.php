<?php
    // Interfaz genérica para un DAO (Data Access Object)
    // Define los métodos básicos para CRUD (Create, Read, Update, Delete)
    interface DAOInterface {
        //Crea una nueva entidad en la base de datos.
        public function create($entity);
        //Devuelve un array con todas las entidades almacenadas.
        public function findAll();
        //Busca una entidad por su ID.
        public function findById($id);
        //Actualiza una entidad según su ID, $options podria ser un objeto o bien un array asociativo
        public function update($id, $options);
        //Elimina una entidad según su ID.
        public function delete($id);
    }
?>
