<?php
    class User extends BaseModel {
        private $name;
        private $email;

        // Constructor que recibe id, name y email
        public function __construct($id = null, $name = null, $email = null) {
            parent::__construct($id);
            $this->name = $name;
            $this->email = $email;
        }

        // Getters
        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        // Setters
        public function setName($name) {
            $this->name = $name;
            // Como el método changeUpdateAt() en BaseModel es private, no podemos llamarlo directamente
            // Podríamos crear un método protected en BaseModel para actualizar updateAt,
            // o actualizarlo manualmente aquí llamando a setUpdateAt()
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }

        public function setEmail($email) {
            $this->email = $email;
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }

        // Ejemplo de un método con comportamiento de User
        public function displayUserInfo() {
            return "User: {$this->name}, Email: {$this->email}";
        }
    }
?>
