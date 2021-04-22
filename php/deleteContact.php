<?php
require_once "connectToDb.php";
require_once "Contact.php";
require_once "ContactToDelete.php";

$id_contact = $_POST['id-contact'];
$contact = new Contact();
$contact->setId($id_contact);

$contact_to_delete = new ContactToDelete($contact, $conn);

try {
    $contact_to_delete->run();
    header('location:phonebook.php');
} catch (Exception $e) {
    echo "[#ERR]Error: " . $e->getMessage();
}

mysqli_close($conn);