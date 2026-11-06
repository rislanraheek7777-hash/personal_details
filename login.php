<?php
session_start();
include "database.php";
?>
<?php
if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
    echo "Signup successful! Please log in.";
}
?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if (password_verify($password, $stored_password)) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" placeholder="Username" name="username"><br><br>
        <label for="password">Password: </label>
        <input type="password" placeholder="Password" name="password"><br><br>
        <input type="submit" value="Login" name="login">
    </form><br>
    <label for="signup">Don't have an account? </label>
    <button><a href="singup.php" style="text-decoration: none;">Sign Up</a></button>
</body>

</html>