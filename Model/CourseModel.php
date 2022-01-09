<?php

class CourseModel {

	private int $id;
	private string $title;
	private string $description;
	private string $createdAt;
	private string $updatedAt;
	private bool $isPublished;
    private DifficultyModel $difficulty;
    private CategoryModel $category;
    private array $parts;
    private string $pictureURL;
    private string $slug;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $createdAt
     * @param string $updatedAt
     * @param bool $isPublished
     * @param DifficultyModel $difficulty
     * @param CategoryModel $category
     * @param array $parts
     * @param string $pictureURL
     * @param string $slug
     */
    public function __construct(int $id = 0, string $title = "", string $description = "", string $createdAt = "", string $updatedAt = "", bool $isPublished = false, DifficultyModel $difficulty = null, CategoryModel $category = null, array $parts = [], string $pictureURL = "", string $slug = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = empty($createdAt) ? date("Y-m-d H:i:s") : $createdAt;
        $this->updatedAt = empty($updatedAt) ? date("Y-m-d H:i:s") : $updatedAt;
        $this->isPublished = $isPublished;
        $this->difficulty = $difficulty ?? new DifficultyModel();
        $this->category = $category ?? new CategoryModel();
        $this->parts = $parts;
        $this->pictureURL = $pictureURL;
        $this->slug = $slug;
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
     * @return CourseModel
     */
    public function setId(int $id): CourseModel
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
     * @return CourseModel
     */
    public function setTitle(string $title): CourseModel
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
     * @return CourseModel
     */
    public function setDescription(string $description): CourseModel
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return CourseModel
     */
    public function setCreatedAt(string $createdAt): CourseModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     * @return CourseModel
     */
    public function setUpdatedAt(string $updatedAt): CourseModel
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $isPublished
     * @return CourseModel
     */
    public function setIsPublished(bool $isPublished): CourseModel
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    /**
     * @return DifficultyModel
     */
    public function getDifficulty(): DifficultyModel
    {
        return $this->difficulty;
    }

    /**
     * @param DifficultyModel $difficulty
     * @return CourseModel
     */
    public function setDifficulty(DifficultyModel $difficulty): CourseModel
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * @return CategoryModel
     */
    public function getCategory(): CategoryModel
    {
        return $this->category;
    }

    /**
     * @param CategoryModel $category
     * @return CourseModel
     */
    public function setCategory(CategoryModel $category): CourseModel
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @param array $parts
     * @return CourseModel
     */
    public function setParts(array $parts): CourseModel
    {
        $this->parts = $parts;
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
     * @return CourseModel
     */
    public function setPictureURL(string $pictureURL): CourseModel
    {
        $this->pictureURL = $pictureURL;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return CourseModel
     */
    public function setSlug(string $slug): CourseModel
    {
        $this->slug = $slug;
        return $this;
    }


}
?>