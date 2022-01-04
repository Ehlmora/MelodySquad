<?php

require_once '../Controller/FormationController.php';
require_once '../Controller/CourseController.php';
require_once '../Controller/AccountController.php';

define("ROUTE", explode("/", $_GET['route']));

switch(ROUTE[0]) {

    case ''             : include_once '../View/Home/index.php'; break;
    case 'formations'   : FormationController::index(); break;
    case 'courses'      : CourseController::index(); break;
    case 'login'        : include_once '../View/Account/login.php'; break;
    case 'connect'      : AccountController::connect(); break;
    case 'disconnect'   : AccountController::disconnect(); break;
    //case 'signin'       :
    case 'dashboard'    :

        switch(ROUTE[1]) {

            case 'courses-taken'    :
            case 'courses'          :
            case 'formations'       :
            case 'accounts'         : AccountController::dashboard(); break;
            default                 : include_once '../View/Error/404.php'; break;
        } break;
    default             : include_once '../View/Error/404.php'; break;

}