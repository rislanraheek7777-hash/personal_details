<?php
include "database.php";
?>
<?php
if (isset($_GET['update']) && $_GET['update'] == "success") {
    echo "Details Updated";
} elseif (isset($_GET['update']) && $_GET['update'] == "fail") {
    echo "Details Update Failed";
}
if (isset($_GET['delete']) && $_GET['delete'] == "success") {
    echo "Details Deleted";
} elseif (isset($_GET['delete']) && $_GET['delete'] == "fail") {
    echo "Details Delete Failed";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>About</th>
        <th>Date & Time</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $select_sql = "SELECT * FROM details";
    $result = mysqli_query($conn, $select_sql);

    $fetched_details = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($fetched_details as $details) {
    ?>
        <tr>
            <td><?php echo $details['name'] ?></td>
            <td><?php echo $details['phone'] ?></td>
            <td><?php echo $details['about'] ?></td>
            <td><?php echo $details['date'] ?></td>
            <td><img src="image/<?php echo $details['image'] ?>" alt="No Image" height="100px" ; width="100px"></td>
            <td><a href="edit.php?edit_id=<?php echo $details['id'] ?>">Edit</a></td>
            <td><a href="delete.php?delete_id=<?php echo $details['id'] ?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>