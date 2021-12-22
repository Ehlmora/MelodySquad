<?php

class RoleModel {

    private int $id;
    private string $name;
    private array $permissions;

    /**
     * @param int $id
     * @param string $name
     * @param array $permissions
     */
    public function __construct(int $id, string $name, array $permissions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->permissions = $permissions;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     */
    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

}