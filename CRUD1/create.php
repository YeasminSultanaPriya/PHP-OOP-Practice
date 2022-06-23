
<?php
 require('config.php');
 require('savedata.php');
 
?>
<!doctype html>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = ("SELECT * FROM employee");
                            $query = mysqli_query($conn,$sql) or die("Query unsuccessful");
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_assoc($query)){
                               
                            ?>
                            <tbody>
                            <tr>
                                <th scope="row"><?php echo $row['id'] ?></th>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['salary'] ?></td>
                                <td>
                                    <a class="btn btn-sm bg-info" href="updatedata.php"> <i class="fa-solid fa-pencil"></i></a>
                                    <a class="btn  btn-sm bg-danger" href="#"> <i class="fa-solid fa-trash"></i> </a> 
                                </td>
                            </tr>  
                            <?php
                                 
                                }
                            }
                            ?>
                            </tbody>
                            
                        </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>


  </body>
</html>




