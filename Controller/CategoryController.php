<?php
namespace Controller;


use Model\Category;
use Model\CategoryDB;
use Model\DBConnection;

class CategoryController
{

    public $categoryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost:3308;dbname=book-manager", "root", "123456");
        $this->categoryDB = new CategoryDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/category/add.php';
        } else {
            $name = $_POST['name'];
            $category = new Category($name);
            $this->categoryDB->create($category);
            $message = 'Category created';
            include 'view/category/add.php';
        }
    }

    public function index(){
        $categories = $this->categoryDB->getAll();
        include 'view/category/list.php';
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'view/category/delete.php';
        } else {
            $id = $_POST['id'];
            $this->categoryDB->delete($id);
            header('Location: index.php');
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'view/category/edit.php';
        } else {
            $id = $_POST['id'];
            $category = new Category($_POST['name']);
            $this->categoryDB->update($id, $category);
            header('Location: index.php');
        }
    }

}