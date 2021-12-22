<?php

class AnswerModel {

    private int $id;
    private string $content;

    /**
     * @param int $id
     * @param string $content
     */
    public function __construct(int $id, string $content)
    {
        $this->id = $id;
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