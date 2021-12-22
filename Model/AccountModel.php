<?php

class AccountModel {

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $birthDate;
    private string $email;
    private string $createdAt;
    private string $lastConnection;
    private string $profilePictureURL;
    private RoleModel $role;

    /**
     * @param int $id
     * @param string $firstname
     * @param string $lastname
     * @param string $birthDate
     * @param string $email
     * @param string $createdAt
     * @param string $lastConnection
     * @param string $profilePictureURL
     * @param RoleModel $role
     */
    public function __construct(int $id, string $firstname, string $lastname, string $birthDate, string $email, string $createdAt, string $lastConnection, string $profilePictureURL, RoleModel $role)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->createdAt = $createdAt;
        $this->lastConnection = $lastConnection;
        $this->profilePictureURL = $profilePictureURL;
        $this->role = $role;
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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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
    public function getLastConnection(): string
    {
        return $this->lastConnection;
    }

    /**
     * @param string $lastConnection
     */
    public function setLastConnection(string $lastConnection): void
    {
        $this->lastConnection = $lastConnection;
    }

    /**
     * @return string
     */
    public function getProfilePictureURL(): string
    {
        return $this->profilePictureURL;
    }

    /**
     * @param string $profilePictureURL
     */
    public function setProfilePictureURL(string $profilePictureURL): void
    {
        $this->profilePictureURL = $profilePictureURL;
    }

    /**
     * @return RoleModel
     */
    public function getRole(): RoleModel
    {
        return $this->role;
    }

    /**
     * @param RoleModel $role
     */
    public function setRole(RoleModel $role): void
    {
        $this->role = $role;
    }

}