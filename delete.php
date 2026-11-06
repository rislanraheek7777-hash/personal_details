<<<<<<< HEAD
<?php
include "database.php";
?>

<?php
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM details WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: view.php?delete=success");
    } else {
        header("Location: view.php?delete=fail");
    }
}
=======
<?php
include "database.php";
?>

<?php
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM details WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: view.php?delete=success");
    } else {
        header("Location: view.php?delete=fail");
    }
}
>>>>>>> e8ca31bd904f54e799efe47bf4e5c399a14c6b82
?>