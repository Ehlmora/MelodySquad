<?php

require_once '../Controller/Controller.php';

require_once '../Model/AccountModel.php';
require_once '../Model/RoleModel.php';

require_once "../DAO/AccountDAO.php";

class AccountController extends Controller
{

    public static function index()
    {
        // TODO: Implement index() method.
    }

    public static function create()
    {
        include_once "../View/Account/signin.php";
    }

    public static function store()
    {
        // TODO: Implement store() method.
    }

    public static function update()
    {
        // TODO: Implement update() method.
    }

    public static function delete()
    {
        // TODO: Implement delete() method.
    }

    public static function login() {

        include_once "../View/Account/login.php";

    }

    public static function signin($username, $mail, $password, $password_confirmation) {

        // Validator
        $user = new AccountModel(
            0,
            "",
            "",
            $username,
            "",
            $mail,
            "",
            "",
            "",
            "",
            new RoleModel(3, "Membre", [])
        );

        // Hash
        $user->setPassword(password_hash($password, PASSWORD_BCRYPT));

        if(!password_verify($password_confirmation, $user->getPassword())) {

            header("Location: /signin");
            die('<div class="alert alert-danger" role="alert">Les mots de passes sont différents<div/>');

        }

        $dao = new AccountDAO($user);
        if($dao->create()) {

            $_SESSION['user_id'] = $user->getId();
            header('Location: /');
            exit();

        }

    }

    public static function disconnect()
    {
        session_destroy();
        header('Location: /');
        exit();
    }

    public static function connect($mail, $password)
    {
        // Validator
        $user = new AccountModel(
            0,
            "",
            "",
            "",
            "",
            $mail,
            $password,
            "",
            "",
            "",
            new RoleModel(3, "Membre", [])
        );

        $dao = new AccountDAO($user);
        $user->setId($dao->userConnection());

        $_SESSION['user_id'] = $user->getId();
        header('Location: /');
        exit();
    }

    public static function dashboard() {

        include_once '../View/Dashboard/courses-taken.php';

    }
}