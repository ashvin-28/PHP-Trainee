<?php
include "connection.php";
?>
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
            $sql="select * from employee";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                
             ?>
            <td><?php echo $row["emp_id"];?></td>
            <td><?php echo $row["firstName"];?></td>
            <td><?php echo $row["lastName"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["address"];?></td>
            <td><?php echo $row["phonenumber"];?></td>
            <td><?php echo $row["gender"];?></td>
            <td><?php  echo $row["hobbies"];?></td>
            <td><?php echo $row["country"];?></td>
            <td><img src="<?php echo $row["image"];?>" alt="" width="50px" hight="50px" ></td>
            <td>
                <a href="updateForm.php?id=<?php echo $row["emp_id"]; ?>">Edit</a>
                <a href="deleteData.php?id=<?php echo $row["emp_id"]; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
            
        </tr>
        <?php
            }
            ?>
    </table>
</body>
</html>