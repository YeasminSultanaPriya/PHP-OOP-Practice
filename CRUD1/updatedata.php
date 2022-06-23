<?php
 require('config.php');
?>
<?php
    $em_id = $_GET['id'];
    $em_name = $_POST['name'];
    $em_address = $_POST['address'];
    $em_phone = $_POST['phone'];
    $em_salary = $_POST['salary'];

    $sql = "UPDATE employee SET name = '{$em_name}', address = '{$em_address}', phone = '{$em_phone}', salary = '{$em_salary}'  ";
    $query = mysqli_query($conn,$sql) or die("Query unsuccessful");
    ?>
<div id="main-content">
    <h2>Edit Record</h2>
    
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

        <?php
        $em_id = $_POST['id'];
        $sql1 = "SELECT * FROM employee WHERE id = {$em_id}";
        $query1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($query1)>0){
            while($row = mysqli_fetch_assoc($query1)){

          
        ?>
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="id"  value="<?php echo $row['id'] ?>" />
            <input type="text" name="name" value="<?php echo $row['name'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $row['address'] ?>" />
        </div>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $row['phone'] ?>" />
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" name="salary" value="<?php echo $row['salary'] ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>

    <?php
      }
    }
    ?>
</div>
</div>
</body>
</html>
