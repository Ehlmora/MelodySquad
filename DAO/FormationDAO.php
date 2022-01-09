<?php

require_once "DAO.php";

class FormationDAO extends DAO
{
    private FormationModel $formation;

    public function __construct($formation = null)
    {
        parent::__construct();

        if($formation == null) $formation = new FormationModel();
        $this->formation = $formation;
    }

    public function getFormation(): FormationModel
    {
        return $this->formation;
    }

    public function setFormation(FormationModel $formation): FormationDAO
    {
        $this->formation = $formation;
    }

    /**
     * @return array
     */
    public function getAll() : array {

        try {

            $this->connect();

            $query  = "SELECT title, description, content, pictureURL, category.name AS category, category.color AS color FROM formation INNER JOIN category ON category_id = category.id";
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