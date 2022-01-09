<?php

require_once "DAO.php";

require_once '../Model/CourseModel.php';
require_once '../Model/PartModel.php';

class CourseDAO extends DAO
{
    private CourseModel $course;

    public function __construct($course = null)
    {
        parent::__construct();

        if($course == null) $course = new CourseModel();
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

            $query  = "
                SELECT title, description, pictureURL, 
                       category.name AS category, category.color AS color 
                FROM course 
                INNER JOIN category ON course.category_id = category.id";
            $sth    = $this->connection->prepare($query);
            $sth->execute([]);

            $this->connection = null;

            return $sth->fetchAll(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }

    /**
     * @return array
     */
    public function getAllByCategoryAndDifficulty($category, $difficulty) : array {

        try {

            $this->connect();

            $query  = "
                SELECT title, description, pictureURL, slug, 
                       category.name AS category, category.color AS color, 
                       difficulty.name AS difficulty 
                FROM course 
                    INNER JOIN category ON course.category_id = category.id 
                    INNER JOIN difficulty ON course.difficulty_id = difficulty.id 
                WHERE category_id 
                      LIKE :category AND difficulty_id LIKE :difficulty
            ";
            $sth    = $this->connection->prepare($query);
            $result = $sth->execute([
                ":category"     => $category,
                ":difficulty"   => $difficulty
            ]);

            $this->connection = null;

            return $sth->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }

    }

    public function getBySlug() {

        try {

            $this->connect();

            $query  = "
                SELECT course.id, title, description, createdAt, updatedAt, isPublished, pictureURL, slug, 
                       category.id AS category_id, category.name AS category_name, category.color AS category_color, 
                       difficulty.id AS difficulty_id, difficulty.name AS difficulty_name 
                FROM course 
                INNER JOIN category ON course.category_id = category.id 
                INNER JOIN difficulty ON course.difficulty_id = difficulty.id 
                WHERE slug = :slug
            ";
            $sth    = $this->connection->prepare($query);
            $sth->execute([
                ":slug"     => $this->course->getSlug(),
            ]);

            $this->connection = null;

            $course = $sth->fetch();

            $this->course->setId($course['id'] ?? 0);
            $this->course->setTitle($course['title'] ?? "");
            $this->course->setDescription($course['description'] ?? "");
            $this->course->setCreatedAt($course['id'] ?? "");
            $this->course->setUpdatedAt($course['id'] ?? "");
            $this->course->setIsPublished($course['id'] ?? "");
            $this->course->setPictureURL($course['id'] ?? "");
            $this->course->setSlug($course['id'] ?? "");

        } catch (PDOException $e) {

            print '<div class="alert alert-danger" role="alert">[Erreur]: ' . $e->getMessage() . '<div/>';
            die();

        }
    }

    public function getDifficulty() {

        $this->connect();

        $query  = "
                SELECT difficulty.id AS id, name 
                FROM difficulty 
                INNER JOIN course ON difficulty.id = course.difficulty_id 
                WHERE course.id = :id
            ";
        $sth    = $this->connection->prepare($query);
        $sth->execute([
            ":id"     => $this->course->getId(),
        ]);

        $this->connection = null;

        $difficulty = $sth->fetch();

        $this->course->setDifficulty(new DifficultyModel());

        $this->course->getDifficulty()->setId($difficulty['id'] ?? 0);
        $this->course->getDifficulty()->setName($difficulty['name'] ?? "");
    }

    public function getCategory() {

        $this->connect();

        $query  = "
                SELECT category.id AS id, name, color
                FROM category 
                INNER JOIN course ON course.category_id = category.id 
                WHERE course.id = :id
            ";
        $sth    = $this->connection->prepare($query);
        $sth->execute([
            ":id"     => $this->course->getId(),
        ]);

        $this->connection = null;

        $category = $sth->fetch();

        $this->course->setCategory(new CategoryModel());

        $this->course->getDifficulty()->setId($category['id'] ?? 0);
        $this->course->getDifficulty()->setName($category['name'] ?? "");
        $this->course->getCategory()->setColor($category['color'] ?? "");


    }

    public function getParts() {

        $this->connect();

        $query  = "
                SELECT part.id AS id, part.title AS title, part.description AS description
                FROM part 
                INNER JOIN course ON part.course_id = course.id 
                WHERE course.id = :id
            ";
        $sth    = $this->connection->prepare($query);
        $sth->execute([
            ":id"     => $this->course->getId(),
        ]);

        $this->connection = null;

        $result = $sth->fetchAll();
        $parts = [];

        foreach ($result as $res) {
            $part = new PartModel();
            $part->setId($res['id'] ?? 0);
            $part->setTitle($res['title'] ?? "");
            $part->setDescription($res['description'] ?? "");
            $parts[] = $part;
        }

        $this->course->setParts($parts);

    }
}