<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 5</title>
</head>
<body>
<h2>Lab Task 5: PHP Classes and Objects</h2>

<?php
class Book {
    private $title;
    private $author;
    private $year;

    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    public function getDetails() {
        return "Title: " . $this->title . ", Author: " . $this->author . ", Year: " . $this->year;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setYear($year) {
        $this->year = $year;
    }
}

$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", 1925);
echo $book1->getDetails() . "<br>";

$book1->setTitle("To Kill a Mockingbird");
$book1->setAuthor("Harper Lee");
$book1->setYear(1960);

echo $book1->getDetails() . "<br>";
?>

</body>
</html>

