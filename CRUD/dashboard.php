<?php 
    require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }

    </style>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees List</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
                </div>
            </div>        
        </div>
        <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Salary</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM employee";
                    if($employeeList = mysqli_query($connection,$query)){
                        if(mysqli_num_rows($employeeList)>0){
                            foreach($employeeList as $key=>$item){

                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['id'] ?></th>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['address'] ?></td>
                                <td><?php echo $item['salary'] ?></td>
                                <td>
                                    <a  href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-sm bg-info" > <i class="fa-solid fa-pen-to-square icon-style"></i></a>
                                     <a class="btn  btn-sm bg-danger icon-style" href="#">  <i class="fa-solid fa-trash"></i> </a> 
                                </td>
                            </tr>  
                        <?php
                            }
                        }else{
                        ?>
                            <tr>
                                <th colspan="5">Database Record Is empty</th>
                            </tr>  
                           
                        <?php
                        }
                    }
                    mysqli_close($connection);
                ?>
                             
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>