<?php
require_once "connectToDb.php";

$id_user = $_POST['id-user'];
$rows_per_page = 6;

//if (isset($_GET['page']) && is_numeric($_GET['page'])) {
//    $current_page = (int)$_GET['p'];
//} else {
//    $current_page = 1;
//}

//for ($i = ($current_page - $interval); $i < ($current_page + $interval) + 1; $i++) {
//    if ($i > 0 && $i <= $number_of_pages) {
//        if ($current_page != $i) {
//            $paginare = $paginare . '<button id="page_ '.$i.'" onclick="PB.showTableContacts(this)">' . $i . '</button>';
//        } else {
//            $paginare = $paginare . '<button style="background-color:#ffffff; color:#000000;">' . $i . '</button>';
//        }
//    }
//}