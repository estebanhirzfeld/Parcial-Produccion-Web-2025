<?php
    class Book extends BaseModel {
        private $title;
        private $isbn;
        private $year;
    // Constructor que recibe id, title, isbn y year
    public function __construct($id = null, $title = null, $isbn = null, $year = null) {
        parent::__construct($id);
        $this->title = $title;
        $this->isbn = $isbn;
        $this->year = $year;
    }
    // Getters
    public function getTitle() {
        return $this->title;
    }
    public function getIsbn() {
        return $this->isbn;
    }
    public function getYear() {
        return $this->year;
    }
    // Setters
    public function setTitle($title) {
        $this->title = $title;
        $this->setUpdateAt(date("Y-m-d H:i:s"));
    }
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        $this->setUpdateAt(date("Y-m-d H:i:s"));
    }
    public function setYear($year) {
        $this->year = $year;
        $this->setUpdateAt(date("Y-m-d H:i:s"));
    }
    // Ejemplo de un método con comportamiento de Book
    public function displayBookInfo() {
        return "Book: {$this->title}, ISBN: {$this->isbn}, Year: {$this->year}";
    }
}
?>