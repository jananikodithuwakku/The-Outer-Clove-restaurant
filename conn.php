<?php

       $hostName ="localhost";
       $dbuser = "Customer";
       $dbPassword ="Restaurant20";
       $dbName = "outer_clove_restaurant";

       $conn =mysqli_connect($hostName,$dbuser,$dbPassword,$dbName);

       if(!$conn){
        die("Something want wrong;");
       }
?>