<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px solid black">
        <h1>Employee Table</h1>
        <button type="button"><a href="views/add.php">Add</a></button>
        <tr>
            <th>ID</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Country</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
            while ($row = $data->fetch_assoc()) {

            ?>
                <td><?php echo $row["emp_id"]; ?></td>
                <td><?php echo $row["firstName"]; ?></td>
                <td><?php echo $row["lastName"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["phonenumber"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["hobbies"]; ?></td>
                <td><?php echo $row["country"]; ?></td>
                <td><img src="uploads/<?php echo $row["image"]; ?>" alt="" width="50px" hight="50px"></td>
                <td>
                    <a href="updateForm.php?id=<?php echo $row["emp_id"]; ?>">Edit</a>
                   <a href="index.php?action=delete&id=<?php echo $row['emp_id'] ?>">Delete</a>
                    </td>

        </tr>
    <?php
            }
    ?>
    </table>
</body>

</html>