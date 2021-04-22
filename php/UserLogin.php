<?php

class UserLogin
{
    /**
     * @var User
     */
    private $user;
    private $isLoggedIn = false;
    private $db;
    private $isLoggedAsAdmin = false;

    function __construct(User $user, $db)
    {
        $this->user = $user;
        $this->db = $db;
    }

    function run()
    {
        $sql = "SELECT id_user, user_password, admin
                FROM users 
                WHERE user_name='{$this->user->getUsername()}' 
                AND user_password='{$this->user->getPassword()}'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $this->isLoggedIn = true;
            $row = mysqli_fetch_assoc($result);
            $this->user->setId($row["id_user"]);
            $this->user->setAdmin($row["admin"]);
            if ($this->user->getAdmin() == 1 ) {
                $this->setIsLoggedAsAdmin(true);
            }
        }
    }

    public function authenticatedSuccessfully()
    {
        return $this->isLoggedIn;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return bool
     */
    public function getIsLoggedAsAdmin()
    {
        return $this->isLoggedAsAdmin;
    }

    /**
     * @param bool $isLoggedAsAdmin
     */
    public function setIsLoggedAsAdmin($isLoggedAsAdmin)
    {
        $this->isLoggedAsAdmin = $isLoggedAsAdmin;
    }

}