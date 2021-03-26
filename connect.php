<?php

    $host       =   "localhost";
    $username   =   "1731676";
    $password   =   "n123456";
    $db_name    =   "db1731676";


    $con        =   mysqli_connect($host,$username,$password,$db_name);

    if($con){
        echo "Connected";
    }else{
        echo "Error Connection";
    }