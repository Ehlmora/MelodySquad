<?php

class DifficultyModel {

	private int $id;
	private string $level;

    /**
     * @param int $id
     * @param string $level
     */
    public function __construct(int $id, string $level)
    {
        $this->id = $id;
        $this->level = $level;
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
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

}
?>