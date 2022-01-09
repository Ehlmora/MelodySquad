<?php

require_once '../Controller/Controller.php';

require_once '../DAO/CourseDAO.php';
require_once '../DAO/CategoryDAO.php';
require_once '../DAO/DifficultyDAO.php';

class CourseController extends Controller
{

    public static function index()
    {
        // Model
        $category = new CategoryModel(0,"");
        $difficulty = new DifficultyModel(0, "");

        // DAO Processing
        $categoryDAO = new CategoryDAO($category);
        $categories = $categoryDAO->getAll();

        $difficultyDAO = new DifficultyDAO($difficulty);
        $difficulties = $difficultyDAO->getAll();

        include_once '../View/Course/index.php';
    }

    public static function show($slug) {

        $course = new CourseModel();
        $course->setSlug($slug);

        $dao = new CourseDAO($course);
        $dao->getBySlug();

        $dao->getDifficulty();
        $dao->getCategory();
        $dao->getParts();

        include_once "../View/Course/show.php";

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

        $success = !empty($courses);
        Response::send($success, $courses);
    }
}