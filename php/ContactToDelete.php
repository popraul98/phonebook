<?php
require_once "ContactManager.php";

class ContactToDelete
{
    private $db;
    private $contact_deleted = false;
    private $contact;

    public function __construct(Contact $contact, $db)
    {
        $this->contact = $contact;
        $this->db = $db;
    }

    public function run()
    {
        $contact_manager = new ContactManager($this->db, $this->contact);
        $contact_manager->delete();
    }

    public function contactDeletedSuccessfully()
    {
        return $this->contact_deleted;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return bool
     */
    public function isContactDeleted()
    {
        return $this->contact_deleted;
    }

    /**
     * @param bool $contact_deleted
     */
    public function setContactDeleted($contact_deleted)
    {
        $this->contact_deleted = $contact_deleted;
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