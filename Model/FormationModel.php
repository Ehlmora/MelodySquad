<?php

class FormationModel {

	private int $id;
	private string $title;
	private string $description;
    private string $content;
    private string $pictureURL;
    private array $courses;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $content
     * @param string $pictureURL
     * @param array $courses
     */
    public function __construct(int $id = 0, string $title = "", string $description = "", string $content = "", string $pictureURL = "", array $courses = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->pictureURL = $pictureURL;
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
     * @return FormationModel
     */
    public function setId(int $id): FormationModel
    {
        $this->id = $id;
        return $this;
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
     * @return FormationModel
     */
    public function setTitle(string $title): FormationModel
    {
        $this->title = $title;
        return $this;
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
     * @return FormationModel
     */
    public function setDescription(string $description): FormationModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return FormationModel
     */
    public function setContent(string $content): FormationModel
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getPictureURL(): string
    {
        return $this->pictureURL;
    }

    /**
     * @param string $pictureURL
     * @return FormationModel
     */
    public function setPictureURL(string $pictureURL): FormationModel
    {
        $this->pictureURL = $pictureURL;
        return $this;
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
     * @return FormationModel
     */
    public function setCourses(array $courses): FormationModel
    {
        $this->courses = $courses;
        return $this;
    }

}
?>