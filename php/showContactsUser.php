<?php
require_once "connectToDb.php";

$id_user = $_POST['id-user'];
$current_page = $_POST['page'];
$sql = "SELECT COUNT(*) id_contact FROM contacts WHERE id_user=$id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$number_of_contacts = $data['id_contact'];

$rows_per_page = 6;
$number_of_pages = ceil($number_of_contacts / $rows_per_page);

$pagination_and_table = '<div class="paginare ">Page:';
$interval = 1;

if ($current_page == $number_of_pages && $number_of_pages > 2) {
    $pagination_and_table = $pagination_and_table . '<button id="1_' . $id_user . '" onclick="PB.showContactsUser(this)">1</button>...';
}


for ($i = ($current_page - $interval); $i < ($current_page + $interval) + 1; $i++) {
    if ($i > 0 && $i <= $number_of_pages) {
        if ($current_page != $i) {
            $pagination_and_table = $pagination_and_table . '<button id="' . $i . '_' . $id_user . '" onclick="PB.showContactsUser(this)">' . $i . '</button>';
        } else {
            $pagination_and_table = $pagination_and_table . '<button style="background-color:#ffffff; color:#000000;">' . $i . '</button>';
        }
    }
}
$pagination_and_table .= "</div>";

$sql = "SELECT user_name FROM users WHERE id_user=$id_user";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$pagination_and_table .= '<h3>User: ' . $row['user_name'] . '</h3>
       <table>
       <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>';

$offset = ($current_page - 1) * $rows_per_page;

$sql = "SELECT id_contact ,name_contact, number_contact FROM contacts WHERE id_user = $id_user  LIMIT " . $offset . "," . $rows_per_page . "  ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $pagination_and_table = $pagination_and_table . '<tr id="con_' . $row['id_contact'] . '">
             <td id="cona_' . $row['id_contact'] . '">' . $row['name_contact'] . '</td>
             <td id="cono_' . $row['id_contact'] . '">' . $row['number_contact'] . '</td>
             <td><button type="button" id = "btn_' . $row['id_contact'] . '" onclick="PB.delete(this)"><i class="fas fa-trash-alt"></i></button>
             <button type="button" id="btnUpdate_' . $row['id_contact'] . '"  onclick ="changeContact(this)"><i class="fas fa-user-edit"></i></button>
             </td></tr>';
}
$pagination_and_table .= "</table>";
$pagination_and_table.= '<p class="current-page">Page ' . $current_page . ' of ' . $number_of_pages . '</p>';
if (mysqli_query($conn, $sql)) {
    echo $pagination_and_table;
}