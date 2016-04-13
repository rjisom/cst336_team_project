<?php

/*
    CST 336 - Internet Programming
    Team Project
    @uthors: Alfredo Cortez, Richard Isom
    "includes/database.php"
    
    This program is used as a reference for interacting with a MySQL database

*/

    function getDatabaseConnection(){ 
        $servername = getenv('IP');
        $dbPort = 3306;
        $database = "TeamProject";
        $username = getenv('C9_USER');
        $password = "";
        $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    return $dbConn;
    }
    
    function getDataBySQL($connection, $sql) {
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    
    return $stmt;
    }
?>