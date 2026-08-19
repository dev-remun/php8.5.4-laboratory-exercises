<?php

    class Book {
        private $book_title;
        private $book_author;
        private $book_abstract;
        private $book_published_date;

        public function __construct($book_title, $book_author, $book_abstract, $book_published_date) {
            $this->book_title = $book_title;
            $this->book_author = $book_author;
            $this->book_abstract = $book_abstract;
            $this->book_published_date = $book_published_date;
        }

    }

?>