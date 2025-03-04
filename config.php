<?php
$dbname="projet";
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=projet', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur lors de la connexion");
    }
?>