<?php

require_once '../Controller/FormationController.php';
require_once '../Controller/CourseController.php';
require_once '../Controller/AccountController.php';

// Explode route to get an array of arguments
// This allow use to use multiple arguments URL like /dashboard/courses/{title}

// Read first argument and redirect to the right controller
if(ROUTE[0] != "api") {

    switch(ROUTE[0]) {

        case ''             :   include_once '../View/Home/index.php'; break;
        case 'formations'   :
            switch(ROUTE[1]) {
                case '': FormationController::index(); break;
            } break;
        case 'courses'      :
            switch (ROUTE[1]) {
                case '' : CourseController::index(); break;
                default : CourseController::show(ROUTE[1]); break;
            } break;
        case 'login'        :   AccountController::login(); break;
        case 'disconnect'   :   AccountController::disconnect(); break;
        case 'signin'       :   AccountController::create(); break;
        case 'profile'      :
            switch (ROUTE[1]) {
                case ''     :   AccountController::profile(); break;
                case 'edit' :   AccountController::edit(); break;
            } break;
        case 'dashboard'    :
            switch (ROUTE[1]) {
                case 'courses-taken'    :
                case 'courses'          :
                case 'formations'       :
                case 'accounts'         :
                default                 :   AccountController::dashboard(); break;
            } break;
        default             : include_once '../View/Error/404.php'; break;
    }
} else {

    // API Permission check
    PermissionValidator::onlyAPI();

    switch(ROUTE[1]) {
        case 'profile':
            switch (ROUTE[2]) {
                case 'store' : AccountController::store(); break;
                case 'delete': AccountController::delete(); break;
            }
        case 'filteredCourses':
            CourseController::filteredCourses(
                $_POST['category'] ?? '%',
                $_POST['difficulty'] ?? '%'
            ); break;
        case 'signin' :
            AccountController::signin(
                $_POST['username'] ?? "",
                $_POST['mail'] ?? "",
                $_POST['password'] ?? "",
                $_POST['passwordConfirmation'] ?? ""
            ); break;
        case 'connect'      :
            AccountController::connect(
                $_POST['login_mail'] ?? "",
                $_POST['login_password'] ?? ""
            ); break;
        default             : include_once '../View/Error/404.php'; break;
    }
}