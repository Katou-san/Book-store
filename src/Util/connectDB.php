<?php

        const servername = "localhost";
        const username = "root";
        const password = "";  
        const dbname = "databasephp";
        try {
          $pdo = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
         ;
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }

    
?>