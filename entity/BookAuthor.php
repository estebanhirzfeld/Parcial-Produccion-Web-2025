<?php
    class BookAuthor extends BaseModel {
        private $bookId;
        private $authorId;

        // Constructor que recibe id, bookId y authorId
        public function __construct($id = null, $bookId = null, $authorId = null) {
            parent::__construct($id);
            $this->bookId = $bookId;
            $this->authorId = $authorId;
        }

        // Getters
        public function getBookId() {
            return $this->bookId;
        }

        public function getAuthorId() {
            return $this->authorId;
        }

        // Setters
        public function setBookId($bookId) {
            $this->bookId = $bookId;
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }

        public function setAuthorId($authorId) {
            $this->authorId = $authorId;
            $this->setUpdateAt(date("Y-m-d H:i:s"));
        }
        // Ejemplo de un método con comportamiento de BookAuthor
        public function displayBookAuthorInfo() {
            return "Book ID: {$this->bookId}, Author ID: {$this->authorId}";
        }
    }
?>