<?php

require_once "DAO.php";

require_once '../Model/CategoryModel.php';

class CategoryDAO extends DAO
{
    private CategoryModel $category;

    public function __construct($category = null)
    {
        parent::__construct();

        if($category == null) $category = new CategoryModel();
        $this->category = $category;
    }

    public function getCategory(): CategoryModel
    {
        return $this->category;
    }

    public function setCategory(CategoryModel $category): CategoryModel
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getAll() : array {

        try {

            $this->connect();

            $query  = "SELECT id, name, color FROM category";
            $sth    = $this->connection->prepare($query);
            $result = $sth->execute([]);

            $this->connection = null;

            return $sth->fetchAll();


        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }
}