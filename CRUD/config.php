<?php 
//Define Connection information 
define('CONNECTION_HOST','127.0.0.1');
define('DATABASE_NAME','crud_op');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD','password');

//connection with mysql 
$connection = mysqli_connect(CONNECTION_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);

if($connection == FALSE){
    die("Eroor , COnnection is not established" . mysqli_connect_error());
}


?>