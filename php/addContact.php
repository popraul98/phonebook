<?php
session_start();
require_once "connectToDb.php";
require_once "ContactToAdd.php";
require_once "Contact.php";

$id_user = $_SESSION['id_user'];

$new_contact = new Contact($_POST['input-name'], $_POST['input-number']);
$new_contact->setIdUser($id_user);
$contact_to_add = new ContactToAdd($id_user, $conn, $new_contact);
try {
    $contact_to_add->run();
    header('location:phonebook.php');
} catch (Exception $e) {
    echo "[#ERR]Error: " . $e->getMessage();
}

mysqli_close($conn);