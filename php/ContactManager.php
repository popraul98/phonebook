<?php
require_once "MySqlException.php";

class ContactManager
{
    /**
     * @var Contact
     */
    private $contact;
    private $db;

    public function __construct($db, Contact $contact)
    {
        $this->contact = $contact;
        $this->db = $db;
    }

    public function insert()
    {
        $sql = "INSERT INTO contacts ( id_user,name_contact, number_contact)
        VALUES ( '{$this->contact->getIdUser()}','{$this->contact->getName()}','{$this->contact->getNumber()}')";
        if (!mysqli_query($this->db, $sql)) {
            throw MySqlException::wrongInsert();
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM contacts
               WHERE id_contact={$this->contact->getId()}";
        if (!mysqli_query($this->db, $sql)) {
            throw MySqlException::wrongDelete($this->contact->getId());
        }
    }

    public function update()
    {
        $sql = "UPDATE contacts
                SET name_contact = '{$this->contact->getName()}' , number_contact = '{$this->contact->getNumber()}'
                WHERE id_contact = {$this->contact->getId()}";
        if (mysqli_query($this->db, $sql)) {
            return true;
        }
        return false;
    }

}