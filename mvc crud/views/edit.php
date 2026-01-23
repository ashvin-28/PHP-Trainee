<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        
       while($row=$data->fetch_assoc()){
          $hobbyArr=explode(",",$row["hobbies"]);
    ?>
    <form action="index.php?action=update" method="POST" enctype="multipart/form-data" autocomplete="off">
    
        <input type="hidden" name="id" value="<?= $row['emp_id'] ?>">
        <label for="">First Name: </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($row["firstName"]); ?>">
        <br>
        <label for="">Last Name: </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($row["lastName"]); ?>">
        <br>
        <label for=""> Email: </label>
        <input type="email" name="email" autocomplete="off" value="<?php echo htmlspecialchars($row["email"]); ?>">

        <br>
        <label for=""> Password: </label>
        <input type="password" name="password" autocomplete="off">
        <input type="hidden" name="update_password" autocomplete="off" value="<?php echo $row['password'];?>">

        <br>
        <label for=""> Confirm Password: </label>
        <input type="password" name="confirmPassword" autocomplete="new-password">

        <br>
        <label for=""> Profile Image: </label>
        <input type="file" name="image">
       <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
        <br>
        <label for=""> Address: </label>
        <textarea name="address" id=""><?php echo htmlspecialchars($row["address"]); ?></textarea>

        <br>
        <label for=""> Phone Number: </label>
        <input type="number" name="phoneNumber" id="" value="<?php echo $row["phonenumber"]; ?>">
        <br>


        <label for=""> Gender: </label>
        <input type="radio" name="gender" value="Male" <?php if( $row['gender']=='Male') echo 'checked';?>>Male
        <input type="radio" name="gender" value="Female" <?php if( $row['gender']=='Female') echo 'checked';?>>Female

        <br>
        <label for=""> Hobbies: </label>
        <input type="checkbox" name="hobbies[]" value="Playing" <?php if( in_array("Playing",$hobbyArr)) echo 'checked';?>>Playing
        <input type="checkbox" name="hobbies[]" value="Reading" <?php if( in_array("Reading",$hobbyArr)) echo 'checked';?>>Reading

        <br>
        <label for="">Country: </label>
        <select name="countryName">
            <option value="Select Country" <?php if ($row['country'] == 'Select Country') echo 'selected'; ?>>Select Country</option>
            <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
            <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
            <option value="Australia" <?php if ($row['country'] == 'Australia') echo 'selected'; ?>>Australia</option>
        </select>

        <br>
        <input type="submit" name="submit" value="Update">

    </form>
    <?php
       }
       ?>

</body>

</html>