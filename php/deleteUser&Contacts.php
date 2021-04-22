<?php
require_once "connectToDb.php";
require_once "Contact.php";
require_once "ContactToDelete.php";

$id_user = $_POST['id-user'];
$sql = "SELECT id_contact FROM contacts WHERE id_user = $id_user";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $contact = new Contact();
    $contact->setId($row['id_contact']);
    $contact_to_delete = new ContactToDelete($contact, $conn);
    $contact_to_delete->run();
}

$sql = "DELETE FROM users WHERE id_user = $id_user";

try {
    mysqli_query($conn, $sql);
    echo "ok";
} catch (Exception $e) {

}

mysqli_close($conn);