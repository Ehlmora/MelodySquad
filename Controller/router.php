<?php

require_once '../Controller/FormationController.php';
require_once '../Controller/CourseController.php';
require_once '../Controller/AccountController.php';

// Explode route to get an array of arguments
// This allow use to use multiple arguments URL like /dashboard/courses/{title}
define("ROUTE", explode("/", $_GET['route']));

// Read first argument and redirect to the right controller
switch(ROUTE[0]) {

    case ''             : include_once '../View/Home/index.php'; break;
    case 'formations'   : FormationController::index(); break;
    case 'courses'      : CourseController::index(); break;
    case 'login'        : AccountController::login(); break;
    case 'disconnect'   : AccountController::disconnect(); break;
    case 'signin'       : AccountController::create(); break;
    case 'dashboard'    :

        switch(ROUTE[1]) {

            case 'courses-taken'    :
            case 'courses'          :
            case 'formations'       :
            case 'accounts'         :
            default                 : AccountController::dashboard(); break;

        } break;

    case 'api'          :

        switch(ROUTE[1]) {

            case 'filteredCourses':

                CourseController::filteredCourses(
                    $_POST['category'] ?? '%',
                    $_POST['difficulty'] ?? '%'
                );
                break;

            case 'signin_store' :

                AccountController::signin(
                    $_POST['signin_username'] ?? "",
                    $_POST['signin_mail'] ?? "",
                    $_POST['signin_password'] ?? "",
                    $_POST['signin_password_confirmation'] ?? ""
                );
                break;

            case 'connect'      :
                AccountController::connect(
                    $_POST['login_mail'] ?? "",
                    $_POST['login_password'] ?? ""
                );
                break;

            default: echo "nop"; break;

        } break;

    default             : include_once '../View/Error/404.php'; break;

}