
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "database.php";
?>
<?php
if (!empty($_POST['details'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $about = $_POST['about'];
    $date = $_POST['date'];

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $folder = "image/" . $image_name;

    $upload = move_uploaded_file($image_tmp, $folder);

    if ($upload == true) {
        $insert_sql =  "INSERT INTO details (name, phone, image, about, date) VALUES ('$name','$phone','$image_name','$about','$date')";
        $result = mysqli_query($conn, $insert_sql);

        if ($result == true) {
            header("Location: index.php?status=success");
        } else {
            header("Location: index.php?status=fail");
        }
    } else {
        header("Location: index.php?image=fail");
    }
} else (header("Location: index.php"))
?>