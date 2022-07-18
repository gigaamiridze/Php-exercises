<?php
    #1
    $str = "My dog don\'t like the postman";
    print stripslashes($str);
    print "</br>";

    #2
    print strncmp("Hello", "Hello", 5);
    print "</br>";

    #3
    print max(array(2, 13, 22, 20, 8));
    print "</br>";
    print max(8, 13);

    #4
    print rand();
    print "</br>";
    print rand(20, 77);
    print "</br>";

    #5
    $cars = ["Nisan", "Mercedes", "BMW", "Toyota", "Honda", "Honda"];
    print_r(array_chunk($cars,2));
    print "</br>";

    #6
    $arr1 = ["purple", "pink"];
    $arr2 = ["yellow", "blue"];
    print_r(array_merge($arr1, $arr2));
?>