<?php
    class BaseModel {
        private $id;
        private $createAt;
        private $updateAt;

        public function __construct($id = null) {
            $this->id = $id;
            $this->createAt = date("Y-m-d H:i:s"); //Formato año mes año hora minutos segundos
            $this->updateAt = $this->createAt;
        }

        public function getId() {
            return $this->id;
        }

        // Método privado para actualizar el campo updateAt automáticamente
        //cada vez que cambia un valor
        private function changeUpdateAt() {
            $now = date("Y-m-d H:i:s");
            $this->setUpdateAt($now);
        }

        public function setId($id) {
            $this->id = $id;
            $this->changeUpdateAt();
        }

        public function getCreateAt() {
            return $this->createAt;
        }

        public function getUpdateAt() {
            return $this->updateAt;
        }

        public function setUpdateAt($updateDate) {
            $this->updateAt = $updateDate;
        }
    }
?>
