<?php
require_once "connectToDb.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('location:../loginIndex.php');
}
$loginID = $_SESSION['id_user'];

$sql = "SELECT id_contact ,name_contact, number_contact FROM contacts WHERE id_user = $loginID";
$result = mysqli_query($conn, $sql);

$last_id = mysqli_insert_id($conn);
$v = $last_id;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php
$MAIN_PAGE = "phonebook";
require_once "headerPage.php";
?>
?>
<body>
<div class="container">
    <h3>Welcome <?php echo $_SESSION['username']; ?> </h3>
    <a href="logout.php">
        <button type="button">Log Out</button>
    </a>

    <button type="button" onclick="openForm()">Add Phone Contact</button>
    <div class="form-popup" id="myForm">
        <form action="addContact.php" class="form-container" method="post">
            <h3>Complete fields</h3>
            <input type="text" placeholder="Enter Name" name="input-name" id="new_input_name" required>
            <input type="text" placeholder="Enter Number" name="input-number" id="new_input_number" required>
            <button id="btnAdd" type="submit">Add</button>
            <button id="btnUpD" type="button" onclick="PB.update()">Update</button>
            <button type="button" onclick="closeForm()">Close</button>
        </form>
    </div>
    <p id="txtHint"></p>

    <table id="table">

        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr id="con_' . $row['id_contact'] . '">'
                . '<td id="cona_' . $row['id_contact'] . '">' . $row['name_contact'] . '</td>'
                . '<td id="cono_' . $row['id_contact'] . '">' . $row['number_contact'] . '</td>'
                . '<td> '
                . '<button type="button" id = "btn_' . $row['id_contact'] . '" onclick="PB.delete(this)"><i class="fas fa-trash-alt"></i></button>'
                . '<button type="button" id="btnUpdate_' . $row['id_contact'] . '"  onclick ="changeContact(this)"><i class="fas fa-user-edit"></i></button></td></tr>';
            $last_id = $row['id_contact'];
        }
        ?>
    </table>
</div>
<script>
    var last_id = "<?php echo $last_id; ?>";
    last_id = parseInt(last_id) + 1;
</script>
<script src="../js/ajaxRequest.js"></script>
<script src="../js/contactsActions.js"></script>
</body>
</html>