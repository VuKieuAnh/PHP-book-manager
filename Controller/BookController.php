<?php
namespace Controller;

use Model\Book;
use Model\BookDB;
use Model\CategoryDB;
use Model\DBConnection;

class BookController
{

    public $bookDB;
    public $categoryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost:3308;dbname=book-manager", "root", "123456");
        $this->bookDB = new BookDB($connection->connect());
        $this->categoryDB = new CategoryDB($connection->connect());
    }

    public function add()
    {
        $categories = $this->categoryDB->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/book/add.php';
        } else {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category = $_POST['category_id'];
            $book = new Book($name, $description, $category);
            $this->bookDB->create($book);
//            var_dump($book);
            $message = 'Book created';
            include 'view/book/add.php';
        }
    }

    public function index(){
        $books = $this->bookDB->getAll();
        include 'view/book/list.php';
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'view/book/delete.php';
        } else {
            $id = $_POST['id'];
            $this->bookDB->delete($id);

            header('Location: book.php');
        }
    }
    public function edit()
    {
        $categories = $this->categoryDB->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'view/book/edit.php';
        } else {
            $id = $_POST['id'];
            $book = new Book($_POST['name'], $_POST['description'], $_POST['category_id']);
            $this->bookDB->update($id, $book);
            header('Location: book.php');
        }
    }

    public function search(){
        $nameSearch = $_GET['nameSearch'];
        $books = $this->bookDB->searchByName($nameSearch);
        include 'view/book/list.php';
    }

}