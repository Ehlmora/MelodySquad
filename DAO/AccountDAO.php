<?php

require_once "DAO.php";

require_once '../Model/AccountModel.php';

class AccountDAO extends DAO
{
    private AccountModel $account;

    public function __construct($account = null)
    {
        parent::__construct();

        if($account == null) $account = new AccountModel(
            0,
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            new RoleModel(0, "", [])
        );
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

    public function verifyPassword() {

        try {

            $this->connect();

            $query  = "SELECT password FROM account WHERE mail = :mail";
            $stmt    = $this->connection->prepare($query);
            $result = $stmt->execute([
                ":mail" => $this->account->getMail()
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->connection = null;

            if($user === false) return false;

            return password_verify($this->account->getPassword(), $user['password']);


        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }

    public function updateLastConnection() {

        $this->connect();

        $query  = "UPDATE account SET lastConnection = :lastConnection WHERE id = :id";
        $stmt   = $this->connection->prepare($query);
        $stmt->execute([
            ":lastConnection"   => date('Y-m-d H:i:s'),
            ":id"               => $this->account->getId()
        ]);

        $this->connection = null;

    }

    public function getUserByMail() {

        try {

            $this->connect();

            $query  = "SELECT id, password, role_id, pictureURL FROM account WHERE mail = :mail";
            $stmt    = $this->connection->prepare($query);
            $result = $stmt->execute([
                ":mail" => $this->account->getMail()
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->connection = null;

            $this->account->setId($user['id']);
            $this->account->setRole(new RoleModel($user['role_id'], "", []));
            $this->account->setProfilePictureURL($user['pictureURL']);

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }
    }

    public function getAccountById() {

        try {

            $this->connect();

            $query  = "
                SELECT firstname, lastname, username, birthDate, mail, createdAt, lastConnection, pictureURL, role_id, role.name AS role_name
                FROM account 
                INNER JOIN role ON account.role_id = role.id
                WHERE account.id = :id";
            $stmt    = $this->connection->prepare($query);
            $stmt->execute([
                ":id" => $this->account->getId()
            ]);

            $this->connection = null;

            $user = $stmt->fetch();

            $this->account->setFirstname($user['firstname'] ?? "");
            $this->account->setLastname($user['lastname'] ?? "");
            $this->account->setUsername($user['username']);
            $this->account->setBirthDate($user['birthDate'] ?? "");
            $this->account->setMail($user['mail']);
            $this->account->setCreatedAt($user['createdAt']);
            $this->account->setLastConnection($user['lastConnection']);
            $this->account->setProfilePictureURL($user['pictureURL'] ?? "");
            $this->account->setRole(new RoleModel($user['role_id'], $user['role_name'], []));

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }
}