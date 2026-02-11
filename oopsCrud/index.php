<?php
include "function.php";
include ("./header.php");
include ("./sidebar.php");
?>
<table id="mytable" class="table table-bordred table-striped">
    <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Posting Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
 $fetchdata=new DB_con();
  $sql=$fetchdata->fetchdata();
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
        <tr>
            <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo htmlentities($row['FirstName']);?></td>
            <td><?php echo htmlentities($row['LastName']);?></td>
            <td><?php echo htmlentities($row['EmailId']);?></td>
            <td><?php echo htmlentities($row['ContactNumber']);?></td>
            <td><?php echo htmlentities($row['Address']);?></td>
            <td><?php echo htmlentities($row['PostingDate']);?></td>
            <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button
                        class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
            </td>
            <td><a href="delete.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs"
                        onClick="return confirm('Do you really want to delete');"><span
                            class="glyphicon glyphicon-trash"></span></button></a></td>
        </tr>
        <?php
// for serial number increment
$cnt++;
} ?>
    </tbody>
</table>
<?php
include ('./footer.php');