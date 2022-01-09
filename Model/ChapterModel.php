<?php

class ChapterModel {

    private int $id;
    private string $title;
    private string $content;

    /**
     * @param int $id
     * @param string $title
     * @param string $content
     */
    public function __construct(int $id = 0, string $title = "", string $content = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

}