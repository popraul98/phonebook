<?php


class User
{
    private $username = "";
    private $email = "";
    private $password = "";
    private $id = "";
    private $admin = 0;

    function __construct($username, $password, $email = "", $id = "")
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    public function isAdmin(){
        return $this->admin == 1;
    }

    /**
     * @param int $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

}