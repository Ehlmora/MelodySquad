<?php

class FormationModel {

	private int $id;
	private string $title;
	private string $description;
    private array $courses;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param array $courses
     */
    public function __construct(int $id, string $title, string $description, array $courses)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->courses = $courses;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getCourses(): array
    {
        return $this->courses;
    }

    /**
     * @param array $courses
     */
    public function setCourses(array $courses): void
    {
        $this->courses = $courses;
    }

}
?>