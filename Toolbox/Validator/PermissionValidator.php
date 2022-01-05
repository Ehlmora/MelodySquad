<?php

class PermissionValidator
{
    /**
     * Boolean
     */
    public static function isConnected() {
        return isset($_SESSION['user_id']);
    }

    public static function isAPI() {
        return isset($_POST['permission']) && $_POST['permission'] == "api";
    }

    public static function hasPermission($permission) {
        return true;
    }

    /**
     * Redirection
     */
    public static function onlyConnected() {

        if(!self::isConnected()) {
            header("Location: /");
            exit();
        }

    }

    public static function onlyNotConnected() {

        if(self::isConnected()) {
            header("Location: /");
            exit();
        }

    }

    public static function onlyAPI() {

        if(!self::isAPI()) {
            header("Location: /");
            exit();
        }

    }

}