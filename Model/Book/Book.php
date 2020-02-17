<?php
namespace Model;

class Book
{
    public $id;
    public $name;
    public $description;
    public $category_id;

    /**
     * Book constructor.
     * @param $name
     * @param $description
     * @param $categori_id
     */
    public function __construct($name, $description, $category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category_id = $category_id;
    }


}