<?php 


        $dbHost = 'localhost';
        $dbUsername = 'ks2lrdkn_alex2';
        $dbPassword = 'progettoregione';
        $dbName     = 'ks2lrdkn_ale';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
        
   else{
        echo "ok";
    }




?>