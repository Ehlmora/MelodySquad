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
        // Permission check
        PermissionValidator::onlyNotConnected();

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

    public static function login() {

        // Permission check
        PermissionValidator::onlyNotConnected();

        include_once "../View/Account/login.php";

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

    public static function disconnect()
    {
        // Permission check
        PermissionValidator::onlyConnected();

        session_destroy();
        header('Location: /');
        exit();
    }

    /**
     * API Processing
     */
    public static function signin($username, $mail, $password, $passwordConfirmation) {

        // Hash
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Field validator
        if(!FormValidator::passwordConfirmation($password, $passwordConfirmation))  {
            Response::send(false, "Les mots de passes sont différents.", [
                "failedField" => "password"
            ]);
        }

        // Model
        $user = new AccountModel(
            0,
            "",
            "",
            $username,
            "",
            $mail,
            $password,
            "",
            "",
            "https://cdn-icons-png.flaticon.com/512/4825/4825027.png",
            new RoleModel(3, "Membre", [])
        );

        // DAO Processing
        $dao = new AccountDAO($user);

        // Verification if account not exist
        if($dao->getAccountByUsername()) {
            Response::send(false, "Le nom d'utilisateur est déjà utilisé.", [
                "failedField" => "username"
            ]);
        }
        if($dao->getAccountByMail()) {
            Response::send(false, "L'adresse mail est déjà utilisée.", [
                "failedField" => "mail"
            ]);
        }
        // If not exist : create the acccount and get informations
        $dao->create();
        $dao->getAccountByMail();

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['role_id'] = $user->getRole()->getId();
        $_SESSION['pictureURL'] = $user->getProfilePictureURL();

        Response::send(true, "");
    }

    public static function connect($mail, $password)
    {
        // Validator
        if(FormValidator::isEmpty($mail) || FormValidator::isEmpty($password)) {
            Response::send(false, "Un ou plusieurs champ est vide");
        }

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
            Response::send(false, "Combinaison adresse mail/mot de passe incorrect !");
        }

        $dao->getAccountByMail();
        $dao->updateLastConnection();

        // Log the user on his account after signin
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['role_id'] = $user->getRole()->getId();
        $_SESSION['pictureURL'] = $user->getProfilePictureURL();

        Response::send(true, "La connexion va être établie");
    }

    public static function delete()
    {
        // TODO: Implement delete() method.
    }

}