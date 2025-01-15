<?php
    $host = "localhost"; 
    $dbname = "e2203810";
    $username = "root";
    $password = "";
    
    // Connexion à la base de données
    $conn = new mysqli($host, $username, $password, $dbname);

    // Vérifier si la connexion est réussie
    if ($conn->connect_error) {
        die("Échec de connexion à la base de données : " . $conn->connect_error);
    }
?>