<?php

require_once "DAO.php";

require_once '../Model/AccountModel.php';

class AccountDAO extends DAO
{
    private AccountModel $account;

    public function __construct($account = null)
    {
        parent::__construct();

        if($account == null) $account = new AccountModel(0, '');
        $this->account = $account;
    }

    public function getAccount(): AccountModel
    {
        return $this->account;
    }

    public function setAccount(AccountModel $account)
    {
        $this->account = $account;
    }

    /**
     * @return array
     */
    public function create() : bool {

        try {

            $this->connect();

            $query  = "INSERT INTO account(username, mail, password) VALUES (:username, :mail, :password)";
            $sth    = $this->connection->prepare($query);
            $result = $sth->execute([
                ":username" => $this->account->getUsername(),
                ":mail"     => $this->account->getMail(),
                ":password" => $this->account->getPassword()
            ]);

            $query  = "SELECT id FROM account WHERE mail = :mail";
            $stmt    = $this->connection->prepare($query);
            $result = $stmt->execute([
                ":mail" => $this->account->getMail()
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->account->setId($user['id']);

            $this->connection = null;

            return $result;

        } catch (PDOException $e) {

            die('<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>');

        }

    }

    /**
     * @return int
     */
    public function userConnection() : int{

        try {

            $this->connect();

            $query  = "SELECT id, password FROM account WHERE mail = :mail";
            $stmt    = $this->connection->prepare($query);
            $result = $stmt->execute([
                ":mail" => $this->account->getMail()
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->connection = null;

            if($user === false) die('Mauvaise combinaison');
            else {

                $isValidPassword = password_verify($this->account->getPassword(), $user['password']);

                if($isValidPassword) return $user['id'];
                else die('Mauvaise combinaison');

            }

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }
}