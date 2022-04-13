<?php 

    require './Person.php';

    //class instance create 
    $classInstance = new  Person('Priya',1234,'Seventh');

    print_r($classInstance->makeCircle(3));

?>