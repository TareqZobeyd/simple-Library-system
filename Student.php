<?php

class Student {
    private $studentsFile = 'students.json';
    private $booksFile = 'books.json';

    public function requestBook($nationalCode, $title) {
        $students = json_decode(file_get_contents($this->studentsFile), true);
        $books = json_decode(file_get_contents($this->booksFile), true);
//        login

        if (isset($students[$nationalCode])) {
            if (isset($books[$title]) && $books[$title]['availableCopies'] > 0) {
                if (count($students[$nationalCode]['books']) < 2) {
                    $students[$nationalCode]['books'][] = $title;
                    $books[$title]['availableCopies']--;
                    file_put_contents($this->studentsFile, json_encode($students, JSON_PRETTY_PRINT));
                    file_put_contents($this->booksFile, json_encode($books, JSON_PRETTY_PRINT));
                    return "success";
                } else {
                    return "can't borrow more than 2 books at the same time.";
                }
            } else {
                return "book not available.";
            }
        } else {
            return "you didn't registered";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student = new Student();
    $result = $student->requestBook($_POST['studentNationalCode'], $_POST['bookTitle']);
    echo $result;
}