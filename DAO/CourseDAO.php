<?php

require_once "DAO.php";

class CourseDAO extends DAO
{
    private CourseModel $course;

    public function __construct($course = null)
    {
        parent::__construct();

        if($course == null) $course = new CourseModel(0, '', '', date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), false, []);
        $this->course = $course;
    }

    public function getCourse(): CourseModel
    {
        return $this->course;
    }

    public function setCourse(CourseModel $course): CourseModel
    {
        $this->course = $course;
    }

    /**
     * @return array
     */
    public function getAll() : array {

        try {

            $this->connect();

            $query  = "SELECT title, description, pictureURL, category.name AS category, category.color AS color FROM course INNER JOIN category ON course.category_id = category.id";
            $sth    = $this->connection->prepare($query);
            $result = $sth->execute([]);

            $this->connection = null;

            return $sth->fetchAll();


        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }
}