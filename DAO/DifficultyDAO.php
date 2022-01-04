<?php

require_once 'DAO.php';

require_once '../Model/DifficultyModel.php';

class DifficultyDAO extends DAO
{
    private DifficultyModel $difficulty;

    public function __construct($difficulty = null)
    {
        parent::__construct();

        if($difficulty == null) $difficulty = new DifficultyModel(0, '');
        $this->difficulty = $difficulty;
    }

    public function getDifficulty(): DifficultyModel
    {
        return $this->difficulty;
    }

    public function setDifficulty(DifficultyModel $difficulty): DifficultyModel
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return array
     */
    public function getAll() : array {

        try {

            $this->connect();

            $query  = "SELECT id, name FROM difficulty";
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