<?php 
    $serverName =  "Admin-PC";
    $connectionInfo = ["Database" => "headphones" ,
                    "CharacterSet" => "UTF-8" ];

    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if (!$conn) { 
        echo "Fail to connect to database. </br>";
        die(print_r(sqlsrv_errors(), true));
    }
?>