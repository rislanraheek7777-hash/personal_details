<?php
include "database.php";
?>
<table>
    <tr>
        <td>Name</td>
        <td>Number</td>
        <td>About</td>
        <td>Date & Time</td>
        <td>Image</td>
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
        </tr>
    <?php } ?>
</table>