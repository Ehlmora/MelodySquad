<?php

class QuizModel extends ChapterModel {

    private array $questions;

    /**
     * @param array $questions
     */
    public function __construct(array $questions) {

        parent::__construct();
        $this->questions = $questions;
    }

    /**
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * @param array $questions
     */
    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

}