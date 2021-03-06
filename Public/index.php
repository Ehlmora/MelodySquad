<?php

session_start();

// Configuration files
require_once '../Config/config.php';
require_once '../Config/database.php';

// Load toolbox classes
require_once '../Toolbox/Manipulator/StringManipulator.php';
require_once '../Toolbox/Validator/PermissionValidator.php';
require_once '../Toolbox/Validator/FormValidator.php';
require_once '../Toolbox/Response.php';

// Get route
$route = explode("/", $_GET['route']);
if(end($route) != '') $route[] = '';
define("ROUTE", $route);

// Header
include '../View/Template/header.php';

// Router
include '../Controller/router.php';

// Footer
include '../View/Template/footer.php';