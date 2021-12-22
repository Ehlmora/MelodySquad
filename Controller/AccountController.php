<?php

class AccountController extends Controller
{

    public static function index()
    {
        // TODO: Implement index() method.
    }

    public static function create()
    {
        // TODO: Implement create() method.
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

    public static function disconnect()
    {
        session_destroy();
        header('Location: /');
    }

    public static function connect()
    {
        $_SESSION['user'] = 'Me';
        header('Location: /');
    }
}