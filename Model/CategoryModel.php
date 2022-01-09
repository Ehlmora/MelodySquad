<?php

class CategoryModel {

	private int $id;
	private string $title;
    private string $color;

    /**
     * @param int $id
     * @param string $title
     * @param string $color
     */
    public function __construct(int $id = 0, string $title = "", string $color = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->color = $color;
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
     * @return CategoryModel
     */
    public function setId(int $id): CategoryModel
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
     * @return CategoryModel
     */
    public function setTitle(string $title): CategoryModel
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return CategoryModel
     */
    public function setColor(string $color): CategoryModel
    {
        $this->color = $color;
        return $this;
    }

}
?>