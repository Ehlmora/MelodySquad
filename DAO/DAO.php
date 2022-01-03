<?php

class DAO
{
    protected $connection;

    public function __construct() {
        $this->connection = null;
    }

    public function connect() {

        try {

            $this->connection = new PDO("mysql:host=" . DB_HOST . ";"."dbname=" . DB_NAME, DB_USER, DB_PASS);

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();
        }

    }

}