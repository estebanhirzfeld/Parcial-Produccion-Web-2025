<?php
    class Author extends User {
        private $biography;
        private $birthDate;

        // Constructor que recibe id, name, email, biography y birthDate
        public function __construct($id = null, $name = null, $email = null, $biography = null, $birthDate = null) {
            parent::__construct($id, $name, $email);
            $this->biography = $biography;
            $this->birthDate = $birthDate;
        }

        // Getters
        public function getBiography() {
            return $this->biography;
        }

        public function getBirthDate() {
            return $this->birthDate;
        }

        // Setters
        public function setBiography($biography) {
            $this->biography = $biography;
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }

        public function setBirthDate($birthDate) {
            $this->birthDate = $birthDate;
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }

        // Ejemplo de un método con comportamiento de Author
        public function displayAuthorInfo() {
            return "Author: {$this->getName()}, Email: {$this->getEmail()}, Biography: {$this->biography}, Birth Date: {$this->birthDate}";
        }
    }