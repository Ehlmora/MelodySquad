<?php

require_once '../Controller/Controller.php';
require_once '../Model/CourseModel.php';
require_once '../DAO/CourseDAO.php';

class CourseController extends Controller
{

    public static function index()
    {
        $dao = new CourseDAO();
        $courses = $dao->getAll();
        include_once '../View/Course/index.php';
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
}