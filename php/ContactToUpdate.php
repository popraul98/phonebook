<?php
require_once "ContactManager.php";

class ContactToUpdate
{
    private $contact_updated = false;
    private $db;
    /**
     * @var Contact
     */
    private $contact;

    public function __construct($db, Contact $contact)
    {
        $this->db = $db;
        $this->contact = $contact;
    }

    public function run()
    {
        $contact_manager = new ContactManager($this->db, $this->contact);
        if ($contact_manager->update()) {
            $this->contact_updated = true;
        }
    }

    public function contactUpdatedSuccessfully()
    {
        return $this->contact_updated;
    }
}