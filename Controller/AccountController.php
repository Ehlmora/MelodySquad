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

        // Permission check
        PermissionValidator::onlyNotConnected();

        include_once "../View/Account/login.php";

    }

    public static function signin($username, $mail, $password, $password_confirmation) {

        // Permission check
        PermissionValidator::onlyNotConnected();

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
        if(!$dao->verifyPassword()) {
            ob_clean();
            echo false;
            exit();
        }

        $dao->getUserByMail();
        $dao->updateLastConnection();

        // Log the user on his account after signin
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['role_id'] = $user->getRole()->getId();
        $_SESSION['pictureURL'] = $user->getProfilePictureURL();

        ob_clean();
        echo true;
        exit();
    }

    public static function dashboard() {

        // Permission check
        PermissionValidator::onlyConnected();

        include_once '../View/Dashboard/courses-taken.php';

    }

    public static function profile() {

        // Permission check
        PermissionValidator::onlyConnected();

        $user = new AccountModel(
            $_SESSION['user_id'],
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            new RoleModel($_SESSION['role_id'], "", [])
        );

        $dao = new AccountDAO($user);
        $dao->getAccountById();

        include_once '../View/Account/profile.php';

    }
}