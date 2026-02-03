<?php
include '../header.php';
include "../sidebar.php";
?>
<div class="app-wrapper">
  <div class="card ">
    <div class="card-header m-3">
      <h3 class="card-title">Employee Table</h3>
    </div>

    <?php
    if (isset($_SESSION["addMessage"])) {
    ?>
      <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <strong><?php echo $_SESSION["addMessage"] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION["addMessage"]);
    }
    if (isset($_SESSION["updateMessage"])) {
    ?>
      <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <strong><?php echo $_SESSION["updateMessage"] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      unset($_SESSION["updateMessage"]);
      ?>

    <?php
    }
    ?>

    <form class="navbar-form" role="search" action="index.php?action=search" method="POST">
      <div class="input-group">
        <input type="text" name="searchInput" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button name="searchButton" type="submit" class="btn btn-default">
            <i class="bi bi-search"></i>
          </button>

        </span>
      </div>
    </form>


    <div class="card-body  table-responsive">
      <table id="example1" class="table table-sm display responsive table-bordered table-striped ">
        <thead>
          <tr>
            <th>#</th>
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
        </thead>
        <tbody>
          <?php
          $rows = 1;
          $numrows = $data->num_rows;
          if ($numrows > 0) {
            while ($row = $data->fetch_assoc()) {
          ?>
              <tr data-id="1">
                <td class="row-data" data-name="emp_id"><?php echo $rows++; ?></td>
                <td class="row-data" data-name="firstName"><?php echo $row["firstName"]; ?></td>
                <td class="row-data" data-name="lastName"><?php echo $row["lastName"]; ?></td>
                <td class="row-data" data-name="email"><?php echo $row["email"]; ?></td>
                <td class="row-data" data-name="address"><?php echo $row["address"]; ?></td>
                <td class="row-data" data-name="phonenumber"><?php echo $row["phonenumber"]; ?></td>
                <td class="row-data" data-name="gender"><?php echo $row["gender"]; ?></td>
                <td class="row-data" data-name="hobbies"><?php echo $row["hobbies"]; ?></td>
                <td class="row-data" data-name="country"><?php echo $row["country"]; ?></td>
                <td class="row-data" data-name="name"><img src="<?php echo $row["image"]; ?>" alt="" width="50px" hight="50px"></td>
                <td>
                  <a href="views/edit.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-info btn-sm mb-3">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a href="views/delete.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>


              </tr>
          <?php
            }
          } else {
            echo "no";
          }

          ?>
          <!-- Add more rows here -->
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>
<?php
include "../footer.php";
?>