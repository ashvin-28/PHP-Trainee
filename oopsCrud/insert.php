<?php
include ("./header.php");
include ("./sidebar.php");
?>
<form name="insertrecord" method="post" action="/PHP-Trainee/oopsCrud/insertRecord.php">
    <div class="row">
        <div class="col-md-4"><b>First Name</b>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Last Name</b>
            <input type="text" name="lastname" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"><b>Email id</b>
            <input type="email" name="emailid" class="form-control" required>
        </div>
        <div class="col-md-4"><b>Contactno</b>
            <input type="text" name="contactno" class="form-control" maxlength="10" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"><b>Address</b>
            <textarea class="form-control" name="address" required></textarea>
        </div>
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-md-8">
            <input type="submit" name="insert" value="Submit">
        </div>
    </div>
</form>
<?php include ("./footer.php");