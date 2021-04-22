<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/css-index.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300i&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Log In</title>
</head>
<body>
<div class="container">
    <form action="php/login.php" method="post">
        <h3>Log In</h3>
        <div class="container-username">
            <i class="far fa-user"></i>
            <input type="text" placeholder="Username" name="username-login" required>
        </div>

        <div class="container-password">
            <i class="fas fa-unlock-alt"></i>
            <input type="password" placeholder="Password" name="password-login" required>
        </div>

        <button class="container-submit" type="submit" ><i class="fas fa-sign-in-alt"></i> Login</button>
        <p class="status-login">
            <?php
            if (isset($_SESSION['error'])) {
               echo $_SESSION['error'];
            }
            ?>
        </p>
    </form>
    <hr>
    <a href="registerIndex.html">
        <button class="container-submit"><i class="fas fa-user-plus"></i> Register</button>
    </a>
</div>
<script src="js/ajaxRequest.js"></script>
<script src="js/loginAccountAjax.js"></script>
</body>
</html>