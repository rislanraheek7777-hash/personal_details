<?php
include "database.php";
?>

<?php
if (!empty($_POST['update_details'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['phone_number'];
    $about = $_POST['about'];
    $old_image = $_POST['old_image'];
    $date = $_POST['updated_date'];

    if ($_FILES['image']['name']) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $folder = "image/" . $image_name;

        move_uploaded_file($image_tmp, $folder);
    } else {
        $image_name = $old_image;
    }

    $update_sql = "UPDATE details SET name='$name', phone='$number', image='$image_name', about='$about', date='$date' WHERE id='$id'";
    $result = mysqli_query($conn, $update_sql);

    if (isset($result) == true) {
        header("Location: view.php?update=success");
    } else {
        header("Location: view.php?update=fail");
    }
}
?>