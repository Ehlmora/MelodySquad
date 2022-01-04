<?php

require_once '../Controller/Controller.php';

require_once '../DAO/CourseDAO.php';
require_once '../DAO/CategoryDAO.php';
require_once '../DAO/DifficultyDAO.php';

class CourseController extends Controller
{

    public static function index()
    {
        $courseDao = new CourseDAO();
        $courses = $courseDao->getAll();

        $categoryDao = new CategoryDAO();
        $categories = $categoryDao->getAll();

        $difficultyDao = new DifficultyDAO();
        $difficulties = $difficultyDao->getAll();

        include_once '../View/Course/index.php';
    }

    public static function show() {



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

    public static function filteredCourses($category, $difficulty) {

        // Validator
        $category = is_numeric($category) ? $category : '%';
        $difficulty = is_numeric($difficulty) ? $difficulty : '%';

        $courseDao = new CourseDAO();
        $courses = $courseDao->getAllByCategoryAndDifficulty($category, $difficulty);

        echo json_encode($courses);
    }
}