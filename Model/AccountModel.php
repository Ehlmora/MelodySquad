<?php

class AccountModel {

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $username;
    private string $birthDate;
    private string $mail;
    private string $password;
    private string $createdAt;
    private string $lastConnection;
    private string $profilePictureURL;
    private RoleModel $role;

    /**
     * @param int $id
     * @param string $firstname
     * @param string $lastname
     * @param string $username
     * @param string $birthDate
     * @param string $mail
     * @param string $password
     * @param string $createdAt
     * @param string $lastConnection
     * @param string $profilePictureURL
     * @param RoleModel $role
     */
    public function __construct(int $id, string $firstname, string $lastname, string $username, string $birthDate, string $mail, string $password, string $createdAt, string $lastConnection, string $profilePictureURL, RoleModel $role)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->birthDate = $birthDate;
        $this->mail = $mail;
        $this->password = $password;
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
     * @return AccountModel
     */
    public function setId(int $id): AccountModel
    {
        $this->id = $id;
        return $this;
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
     * @return AccountModel
     */
    public function setFirstname(string $firstname): AccountModel
    {
        $this->firstname = $firstname;
        return $this;
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
     * @return AccountModel
     */
    public function setLastname(string $lastname): AccountModel
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return AccountModel
     */
    public function setUsername(string $username): AccountModel
    {
        $this->username = $username;
        return $this;
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
     * @return AccountModel
     */
    public function setBirthDate(string $birthDate): AccountModel
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return AccountModel
     */
    public function setMail(string $mail): AccountModel
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return AccountModel
     */
    public function setPassword(string $password): AccountModel
    {
        $this->password = $password;
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
     * @return AccountModel
     */
    public function setCreatedAt(string $createdAt): AccountModel
    {
        $this->createdAt = $createdAt;
        return $this;
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
     * @return AccountModel
     */
    public function setLastConnection(string $lastConnection): AccountModel
    {
        $this->lastConnection = $lastConnection;
        return $this;
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
     * @return AccountModel
     */
    public function setProfilePictureURL(string $profilePictureURL): AccountModel
    {
        $this->profilePictureURL = $profilePictureURL;
        return $this;
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
     * @return AccountModel
     */
    public function setRole(RoleModel $role): AccountModel
    {
        $this->role = $role;
        return $this;
    }

}