<?php

class CourseModel {

	private int $id;
	private string $title;
	private string $description;
	private string $createdAt;
	private string $updatedAt;
	private bool $isPublished;
    private array $parts;
    private string $slug;

    public function __construct(int $id, string $title, string $description, string $createdAt, string $updatedAt, bool $isPublished, array $parts, string $slug)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->isPublished = $isPublished;
        $this->parts = $parts;
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
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
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
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
     */
    public function setIsPublished(bool $isPublished): void
    {
        $this->isPublished = $isPublished;
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
     */
    public function setParts(array $parts): void
    {
        $this->parts = $parts;
    }
}
?>