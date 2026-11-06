<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "database.php";
?>
<?php
if (isset($_GET["edit_id"])) {
    $id = $_GET['edit_id'];

    $select_sql = "SELECT * FROM details WHERE id=$id";
    $result = mysqli_query($conn, $select_sql);
    $fetched_result = mysqli_fetch_assoc($result);
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
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $fetched_result['id'] ?>">
        <label for="full name">Full Name: </label>
        <input type="text" placeholder="Full Name" name="name" value="<?php echo $fetched_result['name'] ?>"><br><br>

        <label for="phone num"> Phone Number: </label>
        <input type="tel" placeholder="Phone Number" name="phone_number" value="<?php echo $fetched_result['phone'] ?>"><br><br>

        <label for="c_image">Current Image:</label>
        <img src="image/<?php echo $fetched_result['image'] ?>" alt="no image" height="100px" width="100px"><br><br>

        <label for="image">New Image: </label>
        <input type="file" name="image"><br><br>
        <input type="hidden" name="old_image" value="<?php echo $fetched_result['image'] ?>">

        <label for="about">About: </label>
        <input type="text" name="about" value="<?php echo $fetched_result['about'] ?>"><br><br>

        <label for="date">Date: </label>
        <input type="datetime-local" name="updated_date" value="<?php echo $fetched_result['date'] ?>"><br><br>

        <input type="submit" value="submit" name="update_details">
    </form>
</body>

</html>