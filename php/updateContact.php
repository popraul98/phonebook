<?php
require_once "connectToDb.php";
require_once "Contact.php";
require_once "ContactToUpdate.php";

$id_contact = $_POST['id-contact'];
$name = $_POST['name-updated'];
$number = $_POST['number-updated'];

$update_contact = new Contact($name, $number, $id_contact);
$contact_to_update = new ContactToUpdate($conn, $update_contact);
$contact_to_update->run();

if ($contact_to_update->contactUpdatedSuccessfully()) {
    echo "ok";
//    header('location:phonebook.php');
} else {
    echo "[#ERR]Error: " . $sql . "<br>" . mysqli_error($conn);
}