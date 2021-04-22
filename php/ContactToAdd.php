<?php
require_once "ContactManager.php";

class ContactToAdd
{
    private $contact;
    private $id_user;
    private $db;
    private $contact_added = false;

    function __construct($id_user, $db, Contact $contact)
    {
        $this->contact = $contact;
        $this->id_user = $id_user;
        $this->db = $db;
    }

    public function run()
    {
        $contact_manager = new ContactManager($this->db, $this->contact);
        $contact_manager->insert();
    }

    public function contactAddedSuccessfully()
    {
        return $this->contact_added;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

}