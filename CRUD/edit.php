<?php 
     require('config.php');
     $id = (int)trim($_GET['id']);
     $name = '';
     $salary="";
     $address="";
     $isExist = false;
     if(isset($id) && !empty($id) && is_numeric($id)){
        $editSql = "SELECT * FROM employee WHERE id=?";
        //sql Prepare 
        $sqlQueryPrepare = mysqli_prepare($connection,$editSql);
        if($sqlQueryPrepare){
            //bind parameter with sql 
            mysqli_stmt_bind_param($sqlQueryPrepare,'i',$bindUserId);
            //bind pram value with variable 
            $bindUserId = $id;
            if(mysqli_stmt_execute($sqlQueryPrepare)){
                $result = mysqli_stmt_get_result($sqlQueryPrepare);
                if(mysqli_num_rows($result) == 1){
                    $userData = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $name = $userData['name'];
                    $address = $userData['address'];
                    $salary = $userData['salary'];
                    $isExist = true ;
                }
            }

        }
     }
     
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <?php if($isExist){ ?>
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="edit.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control " value="<?php echo $name ?>">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control "><?php echo $address ?></textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary ?>">
                            <span class="invalid-feedback"></span>
                        </div>
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
                <?php }else{ ?>
                    <h4 class="text-danger text-center">User Not Found</h4>
                <?php }?>
            </div>        
        </div>
    </div>
</body>
</html>