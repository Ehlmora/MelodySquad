<?php

class QuestionModel {

    private int $id;
    private string $question;
    private int $rightAnswer;
    private array $answers;

    /**
     * @param int $id
     * @param string $question
     * @param int $rightAnswer
     * @param array $answers
     */
    public function __construct(int $id, string $question, int $rightAnswer, array $answers)
    {
        $this->id = $id;
        $this->question = $question;
        $this->rightAnswer = $rightAnswer;
        $this->answers = $answers;
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
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return int
     */
    public function getRightAnswer(): int
    {
        return $this->rightAnswer;
    }

    /**
     * @param int $rightAnswer
     */
    public function setRightAnswer(int $rightAnswer): void
    {
        $this->rightAnswer = $rightAnswer;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /**
     * @param array $answers
     */
    public function setAnswers(array $answers): void
    {
        $this->answers = $answers;
    }

}