<?php
session_start();
include "database.php";
?>
<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $check_sql = "SELECT * FROM signup WHERE username = '$username'";
        $result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Username already exists.";
        } else {
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO signup (username, password) VALUES ('$username', '$encrypted_password')";
            if (mysqli_query($conn, $insert_sql)) {
                header("Location: login.php?signup=success");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Passwords do not match.";
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
    <h1>Sign Up</h1>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" placeholder="Username" name="username"><br><br>
        <label for="password">Password: </label>
        <input type="password" placeholder="Password" name="password"><br><br>
        <label>Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="cpassword"><br><br>
        <input type="submit" value="submit" name="signup">
    </form><br>
    <label for="signup">Already have an account? </label>
    <button><a href="login.php" style="text-decoration: none;">Login</a></button>
</body>

</html>