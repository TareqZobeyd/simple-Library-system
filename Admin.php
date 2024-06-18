<?php

class Admin {
    private $studentsFile = 'students.json';
    private $booksFile = 'books.json';

    public function __construct() {
        if (!file_exists($this->studentsFile)) {
            file_put_contents($this->studentsFile, json_encode([], JSON_PRETTY_PRINT));
        }
        if (!file_exists($this->booksFile)) {
            file_put_contents($this->booksFile, json_encode([], JSON_PRETTY_PRINT));
        }
    }

    public function addStudent($firstName, $lastName, $nationalCode) {
        $students = json_decode(file_get_contents($this->studentsFile), true);
        $students[$nationalCode] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'nationalCode' => $nationalCode,
            'books' => []
        ];
        file_put_contents($this->studentsFile, json_encode($students, JSON_PRETTY_PRINT));
        header("Location: index.php");
    }

    public function addBook($title, $author, $publicationYear, $totalCopies) {
        $books = json_decode(file_get_contents($this->booksFile), true);
        $books[$title] = [
            'author' => $author,
            'publicationYear' => $publicationYear,
            'totalCopies' => $totalCopies,
            'availableCopies' => $totalCopies
        ];
        file_put_contents($this->booksFile, json_encode($books, JSON_PRETTY_PRINT));
        header("Location: index.php");
    }
}

$admin = new Admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'addStudent') {
        $admin->addStudent($_POST['firstName'], $_POST['lastName'], $_POST['nationalCode']);
    } elseif ($_POST['action'] === 'addBook') {
        $admin->addBook($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['totalCopies']);
    }
}