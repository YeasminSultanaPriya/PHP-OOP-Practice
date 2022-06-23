<?php 
     require('config.php');
     //get request all operation 
     $id = (int)trim($_GET['id']);
     //get property declare
     $name = '';
     $salary="";
     $address="";

     //error property declare 
     $nameError ="";
     $addressError="";
     $salaryError="";

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
     //post request all operation
    if(isset($_POST['id']) && !empty($_POST['id']) && is_numeric($_POST['id'])){
        // echo "<pre>";
        //     print_r($_GET);
        //     print_r($userData);
        // echo "</pre>";
        // echo "<pre>";
        //     print_r($_POST);
        // echo "</pre>";
        $uId = $_POST['id'];
        $uName = trim($_POST['name']);
        $uAddress = trim($_POST['address']);
        $uSalary = trim($_POST['salary']);
        
        if(empty($uName)){
            $nameError = " Enter Your Name";
        }
        if(empty($uAddress)){
            $addressError= "Enter Your Address";
        }
        if(empty($uSalary)){
            $salaryError = "Enter Your Salary";
        }elseif(!ctype_digit($uSalary)){
            $salaryError = "Please Enter Valid Salary";
        }

        if(empty($nameError) && empty($addressError) && empty($salaryError)){
            $udpateSql = "UPDATE employee SET  name=?, address=?, salary=? WHERE id=?";
            $prepareSqlStatement = mysqli_prepare($connection,$udpateSql);
            if($prepareSqlStatement){
                mysqli_stmt_bind_param($prepareSqlStatement,'sssi',$uName,$uAddress,$uSalary,$uId);
                if(mysqli_stmt_execute($prepareSqlStatement)){
                    header("location:dashboard.php");
                }else{
                    echo "Data Is Not Updated";
                }
            }
            mysqli_stmt_close($prepareSqlStatement);
        }
        mysqli_close($connection);


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
                    <form action="edit.php?id=<?php echo $id ?>" method="post">
                        <input type="hidden" name="id" class="form-control " value="<?php echo $id ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo !empty($nameError)? 'is-invalid':'' ?> " value="<?php echo $name ?>" >
                            <?php 
                                if(!empty($nameError)):
                            ?>
                                <small class="form-text text-danger"> <?php echo $nameError ?></small>
                            <?php 
                                endif;
                            ?>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo !empty($addressError)? 'is-invalid':'' ?>  " ><?php echo $address ?></textarea>
                            <?php 
                                if(!empty($addressError)):
                            ?>
                                <small class="form-text text-danger"> <?php echo $addressError ?></small>
                            <?php 
                                endif;
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" name="salary" class="form-control <?php echo !empty($salaryError)? 'is-invalid':'' ?> " value="<?php echo $salary ?>" >
                            <?php 
                                if(!empty($salaryError)):
                            ?>
                            <small class="form-text text-danger"> <?php echo $salaryError ?></small>
                            <?php 
                                endif;
                            ?>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update" >
                        <a href="dashboard.php" class="btn btn-secondary ml-2">Cancel</a>
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