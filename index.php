<?php
if (isset($_GET["status"]) && ($_GET["status"]) == "success") {
    echo "Details Inserted";
} elseif (isset($_GET["status"]) && ($_GET["status"]) == "fail") {
    echo "Details Insert Failed";
}
if (isset($_GET["image"]) && ($_GET["image"]) == "fail") {
    echo "Image Upload Failed";
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
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="full name">Full Name: </label>
        <input type="text" placeholder="Full Name" name="name"><br><br>
        <label for="phone num"> Phone Number: </label>
        <input type="tel" placeholder="Phone Number" name="phone_number"><br><br>
        <label for="image">Image: </label>
        <input type="file" name="image"><br><br>
        <label for="about">About: </label>
        <textarea name="about" id=""></textarea><br><br>
        <label for="date">Date: </label>
        <input type="datetime-local" name="date"><br><br>
        <input type="submit" value="submit" name="details">
    </form><br><br>
    <button><a href="view.php">details</a></button>
</body>

</html>