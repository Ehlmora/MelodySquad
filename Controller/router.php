<?php

require_once '../Controller/FormationController.php';
require_once '../Controller/CourseController.php';
require_once '../Controller/AccountController.php';

switch($_GET['route']) {

    case ''             : include_once '../View/Home/index.php'; break;
    case 'formations'   : FormationController::index(); break;
    case 'courses'      : CourseController::index(); break;
    case 'connect'      : AccountController::connect(); break;
    case 'disconnect'   : AccountController::disconnect(); break;
    case 'signin'       :
    case 'dashboard'    :
    default             : include_once '../View/Error/404.php'; break;

}