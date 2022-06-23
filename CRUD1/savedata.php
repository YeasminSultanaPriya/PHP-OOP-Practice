
<?php
// save data to database
    $em_id = $_POST['id'];
    $em_name = $_POST['name'];
    $em_address = $_POST['address'];
    $em_phone = $_POST['phone'];
    $em_salary = $_POST['salary'];

$conn = mysqli_connect("localhost","root","","crud!") or die("connection failed");  

$sql = "INSERT INTO employee(name,address,phone,salary) VALUES ('{$em_name}','{$em_address}','{$em_phone}','{em_salary}') ";

$result = mysqli_query($conn, $sql) or die("Query unsuccessful");

 //back to home page after add data
//header("Location: http://localhost/CRUD1/create.php");
//closs connection
mysqli_close($conn);
?>