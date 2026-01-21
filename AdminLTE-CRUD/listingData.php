<?php
     session_start();
        if(!isset($_SESSION["email"])){
            header("Location:loginPage.php");
        }
    include "connection.php";
    include "header.php";
    include "sidebar.php";
    ?>
      <div class="app-wrapper">
          <div class="card ">
              <div class="card-header m-3">
              <h3 class="card-title">Employee Table</h3>
          </div>
                 
      <form class="navbar-form" role="search" action="listingData.php" method="POST">
          <div class="input-group">
              <input type="text" name="searchInput" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                  <button name="searchButton" type="submit" class="btn btn-default">
                      <i class="bi bi-search"></i>
                  </button>
                
              </span>
          </div>
      </form>


      <!-- /.card-header -->
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
            <tr data-id="1">
              <?php
              if (isset($_POST["searchButton"])) {
                $searchInput = $_POST["searchInput"];
                $sql = "select * from employee where firstName like '$searchInput%'";
              } else {

                $sql = "select * from employee";
              }
              $result = mysqli_query($conn, $sql);
              $row_count=1;

              $numRows = mysqli_num_rows($result);
              if ($numRows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <td class="row-data" data-name="emp_id"><?php echo $row_count++; ?></td>
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
                    <a href="updateFormData.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-info btn-sm mb-3">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a href="deleteData.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                      <i class="fas fa-trash">
                      </i>
                      Delete
                    </a>
                  </td>

            </tr>
        <?php
                }
              } else {
                echo "No data found";
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
  include "footer.php";
  ?>


 