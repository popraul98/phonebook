<?php
require_once "connectToDb.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('location:../loginIndex.php');
}
$loginID = $_SESSION['id_user'];

$sql = "SELECT id_user ,user_name FROM users WHERE admin != '1' ";
$result = mysqli_query($conn, $sql);

$last_id = mysqli_insert_id($conn);
$v = $last_id;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php
$MAIN_PAGE = "adminbook";
require_once "headerPage.php";
?>
<body>
<div class="container">
    <h3 class="welcome-msg">Welcome "<?php echo $_SESSION['username']; ?>", logged as admin </h3>
    <div class="button-logout">
        <a href="logout.php">
            <button type="button">Log Out</button>
        </a>
    </div>
    <p id="txtHint"></p>
    <!--        <button type="button" onclick="openForm()">Add Phone Contact</button>-->
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
    <div class="users-list">
        <h3>Users</h3>
        <ul>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li id="user_' . $row['id_user'] . '">'
                    . '<button type="submit" id ="btn_' . $row['id_user'] . '" title="Delete User" onclick="PB.deleteUser(this)"><i class="fas fa-trash-alt"></i></button>'
                    . '<button type="button" id="btnUpdate_' . $row['id_user'] . '"  onclick ="changeContact(this)"><i class="fas fa-user-edit"></i></button>'
                    . '<button type="button" id="usr_' . $row['id_user'] . '" onclick="PB.showContactsUser(this)">' . $row['user_name'] . '</button>'
                    . '</li>';
                $last_id = $row['id_user'];
            }
            ?>
        </ul>
    </div>
    <div id="table" class="table-contacts">
        <table>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </table>
    </div>
</div>
<script>
    var last_id = "<?php echo $last_id; ?>";
    last_id = parseInt(last_id) + 1;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/ajaxRequest.js"></script>
<script src="../js/contactsActions.js"></script>
<script src="../js/usersActions.js"></script>
</body>
</html>