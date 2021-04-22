<?php
session_start();
require_once "connectToDb.php";
require_once "User.php";
require_once "UserLogin.php";

$user = new User($_POST['username-login'], $_POST['password-login']);
$userLogin = new UserLogin($user, $conn);

$userLogin->run();
if ($userLogin->authenticatedSuccessfully()) {
    $user = $userLogin->getUser();
    $_SESSION['username'] = $user->getUsername();
    $_SESSION['id_user'] = $user->getId();
    if ($userLogin->getIsLoggedAsAdmin()) {
        header('location:adminbook.php');
        return;
    }
    header('location:phonebook.php');
} else {
    $_SESSION['error'] = "Authentication failed";
    header('location:../loginIndex.php');
}