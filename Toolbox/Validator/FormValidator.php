<?php

class FormValidator
{
    public static function passwordConfirmation($password, $passwordConfirmation) : bool {

        return password_verify($passwordConfirmation, $password);

    }

    public static function isEmpty($field) {

        return empty($field);

    }

}