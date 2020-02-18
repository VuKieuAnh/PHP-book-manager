<?php
namespace Model;

class BookDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($book){
        $sql = "INSERT INTO books(name, description, category_id) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->description);
        $statement->bindParam(3, $book->category_id);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT books.id, books.name, books.description, books.category_id, categories.name as category_name  FROM books
                INNER JOIN categories 
                ON books.category_id = categories.id ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $books = [];
        foreach ($result as $row) {
            $book = new Book($row['name'], $row['description'], $row['category_id']);
            $book->id = $row['id'];
            $book->category_name = $row['category_name'];
            $books[] = $book;
        }
        return $books;

    }
    public function get($id){
        $sql = "SELECT * FROM books WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $book = new Book($row['name'], $row['description'], $row['category_id']);
        $book->id = $row['id'];
        return $book;
    }
//
    public function delete($id){
        $sql = "DELETE FROM books WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
    public function update($id, $book){
        $sql = "UPDATE books SET name = ?, description = ?, category_id = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->description);
        $statement->bindParam(3, $book->category_id);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }

    public function searchByName($name){
        $sql = "select books.id, books.name, books.description, books.category_id, categories.name as category_name from books INNER JOIN categories
ON books.category_id = categories.id where instr(books.name, ?)> 0";
        $stm = $this->connection->prepare($sql);
        $stm->bindParam(1, $name);
        $stm->execute();
        $result = $stm->fetchAll();
        $books = [];
        foreach ($result as $row) {
            $book = new Book($row['name'], $row['description'], $row['category_id']);
            $book->id = $row['id'];
            $book->category_name = $row['category_name'];
            $books[] = $book;
        }
        return $books;

    }
}