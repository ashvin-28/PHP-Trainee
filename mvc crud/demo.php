1. FOLDER STRUCTURE (VERY IMPORTANT)
Create this inside htdocs:
mvc_oops_crud/
│
├── config/
│   └── Database.php
│
├── models/
│   └── User.php
│
├── controllers/
│   └── UserController.php
│
├── views/
│   ├── add.php
│   ├── edit.php
│   └── list.php
│
├── uploads/
│
└── index.php
 
 
🔷 2. DATABASE & TABLE
Database name
mvc_oops_crud
 
Table
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 email VARCHAR(100),
 password VARCHAR(255),
 gender VARCHAR(10),
 skills VARCHAR(255),
 city VARCHAR(50),
 image VARCHAR(255)
);
 
 
🔷 3. DATABASE CONNECTION (OOPS)
📁 config/Database.php
<?php
class Database {
    protected $conn;
 
    public function __construct() {
        $this->conn = new mysqli("localhost","root","","mvc_oops_crud");
 
        if ($this->conn->connect_error) {
            die("Database connection failed");
        }
    }
}
 
 
🔷 4. MODEL (ALL DATABASE OPERATIONS)
📁 models/User.php
<?php
require_once "config/Database.php";
 
class User extends Database {
 
    public function insert($data) {
        return $this->conn->query(
            "INSERT INTO users 
            (name,email,password,gender,skills,city,image)
            VALUES
            ('{$data['name']}','{$data['email']}','{$data['password']}',
             '{$data['gender']}','{$data['skills']}','{$data['city']}','{$data['image']}')"
        );
    }
 
    public function getAll() {
        return $this->conn->query("SELECT * FROM users");
    }
 
    public function getById($id) {
        return $this->conn->query("SELECT * FROM users WHERE id=$id");
    }
 
    public function update($data) {
        return $this->conn->query(
            "UPDATE users SET
            name='{$data['name']}',
            email='{$data['email']}',
            gender='{$data['gender']}',
            skills='{$data['skills']}',
            city='{$data['city']}',
            image='{$data['image']}'
            WHERE id={$data['id']}"
        );
    }
 
    public function updatePassword($id,$password) {
        return $this->conn->query(
            "UPDATE users SET password='$password' WHERE id=$id"
        );
    }
 
    public function delete($id) {
        return $this->conn->query("DELETE FROM users WHERE id=$id");
    }
}
 
 
🔷 5. CONTROLLER (VALIDATION + LOGIC)
📁 controllers/UserController.php
<?php
require_once "models/User.php";
 
class UserController {
 
    public function store() {
 
        // VALIDATION
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
            die("All required fields must be filled");
        }
 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            die("Invalid email format");
        }
 
        if(empty($_POST['gender'])){
            die("Gender required");
        }
 
        if(empty($_POST['skills'])){
            die("Select at least one skill");
        }
 
        // PASSWORD HASH
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
        // CHECKBOX
        $skills = implode(",", $_POST['skills']);
 
        // IMAGE UPLOAD
        $image = time().$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);
 
        $data = [
            "name"=>$_POST['name'],
            "email"=>$_POST['email'],
            "password"=>$password,
            "gender"=>$_POST['gender'],
            "skills"=>$skills,
            "city"=>$_POST['city'],
            "image"=>$image
        ];
 
        (new User())->insert($data);
        header("Location:index.php");
    }
 
    public function update() {
 
        $user = new User();
 
        $image = $_POST['old_image'];
 
        if($_FILES['image']['name']){
            $image = time().$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);
        }
 
        $data = [
            "id"=>$_POST['id'],
            "name"=>$_POST['name'],
            "email"=>$_POST['email'],
            "gender"=>$_POST['gender'],
            "skills"=>implode(",",$_POST['skills']),
            "city"=>$_POST['city'],
            "image"=>$image
        ];
 
        $user->update($data);
 
        // PASSWORD UPDATE OPTIONAL
        if(!empty($_POST['password'])){
            $user->updatePassword(
                $_POST['id'],
                password_hash($_POST['password'], PASSWORD_DEFAULT)
            );
        }
 
        header("Location:index.php");
    }
}
 
 
🔷 6. ADD VIEW (ALL FIELDS)
📁 views/add.php
<form method="POST" enctype="multipart/form-data" action="index.php?action=store">
 
Name: <input type="text" name="name"><br><br>
Email: <input type="email" name="email"><br><br>
Password: <input type="password" name="password"><br><br>
 
Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female<br><br>
 
Skills:
<input type="checkbox" name="skills[]" value="PHP">PHP
<input type="checkbox" name="skills[]" value="JS">JS<br><br>
 
City:
<select name="city">
<option>Ahmedabad</option>
<option>Surat</option>
</select><br><br>
 
Image:
<input type="file" name="image"><br><br>
 
<button>Save</button>
</form>
 
 
🔷 7. EDIT VIEW (SMART UPDATE)
📁 views/edit.php
<form method="POST" enctype="multipart/form-data" action="index.php?action=update">
 
<input type="hidden" name="id" value="<?= $data['id'] ?>">
<input type="hidden" name="old_image" value="<?= $data['image'] ?>">
 
Name: <input name="name" value="<?= $data['name'] ?>"><br><br>
Email: <input name="email" value="<?= $data['email'] ?>"><br><br>
 
Password:
<input type="password" name="password">
<small>(leave blank to keep old)</small><br><br>
 
<button>Update</button>
</form>
 
 
🔷 8. ROUTER (index.php)
📁 index.php
<?php
require_once "controllers/UserController.php";
 
$action = $_GET['action'] ?? '';
$controller = new UserController();
 
if($action == "store") $controller->store();
if($action == "update") $controller->update();
 
$data = (new User())->getAll();
include "views/list.php";
 
 
🔷 9. LIST VIEW
📁 views/list.php
<a href="views/add.php">Add User</a><br><br>
 
<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Action</th>
</tr>
 
<?php while($row=$data->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td>
<a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a> |
<a href="index.php?action=delete&id=<?= $row['id'] ?>">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
 
 
🔥 IMPORTANT INTERVIEW POINTS
✔ MVC separation
✔ Password hashing
✔ Validation server-side
✔ Optional password update
✔ Image safe update
✔ Checkbox handling
 